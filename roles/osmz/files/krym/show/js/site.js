var osmStream = require('osm-stream'),
    reqwest = require('reqwest'),
    moment = require('moment'),
    _ = require('underscore');

var bboxString = ["44.3", "32.44", "46.25", "36.65"];
var ignore = ['bot-mode'];
var BING_KEY = 'Arzdiw4nlOJzRwOz__qailc8NiR31Tt51dN2D7cm57NrnceZnCpgOkmJhNpGoppU';

var map = L.map('map', {
    zoomControl: false,
    dragging: false,
    scrollWheelZoom: false,
    doubleClickZoom: false,
    boxZoom: false
}).setView([44.61, 33.53], 14);

var overview_map = L.map('overview_map', {
    zoomControl: false,
    dragging: false,
    touchZoom: false,
    scrollWheelZoom: false,
    doubleClickZoom: false,
    boxZoom: false
}).setView([44.61, 33.53], 8);

var bing = new L.BingLayer(BING_KEY, 'Aerial').addTo(map);

var osm = new L.TileLayer('http://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    minZoom: 5,
    maxZoom: 9,
    attribution: '<a href="http://openstreetmap.org/copyright">Карта &copy; OpenStreetMap</a>'
}).addTo(overview_map);

var lineGroup = L.featureGroup().addTo(map);

var changeset_info = document.getElementById('changeset_info');
var changeset_tmpl = _.template(document.getElementById('changeset-template').innerHTML);
var queue = [];

// Remove Leaflet shoutouts
map.attributionControl.setPrefix('');
overview_map.attributionControl.setPrefix('');

var bbox = new L.LatLngBounds(
        new L.LatLng(+bboxString[0], +bboxString[1]),
        new L.LatLng(+bboxString[2], +bboxString[3]));

changeset_info.innerHTML = '<div class="loading">ждём правок...</div>';

var lastLocation = L.latLng(0, 0);

function farFromLast(c) {
    try {
        return lastLocation.distanceTo(c) > 1000;
    } finally {
        lastLocation = c;
    }
}

var lastLocation = L.latLng(0, 0);

function farFromLast(c) {
    try {
        return lastLocation.distanceTo(c) > 1000;
    } finally {
        lastLocation = c;
    }
}

function showLocation(ll) {
    var nominatim_tmpl = 'http://nominatim.openstreetmap.org/reverse?format=json' +
        '&lat={lat}&lon={lon}&zoom=14&accept-language=ru';
    reqwest({
        url: nominatim_tmpl.replace('{lat}', ll.lat).replace('{lon}', ll.lng),
        crossOrigin: true,
        type: 'json'
    }, function(resp) {
        var addr = '';
        if (resp.address ) {
            // country (if not Russia), state, county/state_district, hamlet/village/town/city
            if (resp.address.hamlet) addr += '' + resp.address.hamlet + ', ';
            else if (resp.address.village) addr += '' + resp.address.village + ', ';
            else if (resp.address.town) addr += '' + resp.address.town + ', ';
            else if (resp.address.city) addr += '' + resp.address.city + ', ';
            if (resp.address.county && resp.address.county !== resp.address.town && resp.address.county !== resp.address.city)
                addr += '' + resp.address.county + ', ';
            else if (resp.address.state_district) addr += '' + resp.address.state_district + ', ';
            if (resp.address.state) addr += '' + resp.address.state + ', ';
            if (resp.address.country_code !== 'ru') addr += '' + resp.address.country;
            if (addr.substring(addr.length - 2) === ', ') addr = addr.substring(0, addr.length - 2);
        } else
            addr = '' + resp.display_name + '';
        document.getElementById('reverse-location').innerHTML = addr;
    });
}

function showComment(id) {
    var changeset_url_tmpl = 'http://www.openstreetmap.org/api/0.6/changeset/{id}';
    reqwest({
        url: changeset_url_tmpl
            .replace('{id}', id),
        crossOrigin: true,
        type: 'xml'
    }, function(resp) {
        var tags = resp.getElementsByTagName('tag');
        var comment = '',
            editor = '';
        for (var i = 0; i < tags.length; i++) {
            if (tags[i].getAttribute('k') == 'comment') {
                comment = tags[i].getAttribute('v').substring(0, 60);
            }
            if (tags[i].getAttribute('k') == 'created_by') {
                editor = tags[i].getAttribute('v').substring(0, 50);
            }
        }
        document.getElementById('comment').innerHTML = comment + ' в ' + editor;
    });
}

var runSpeed = 3000;

// The number of changes to show per minute
osmStream.runFn(function(err, data) {
    queue = _.filter(data, function(f) {
        if (!(f.feature && f.feature.type === 'way')) return false;
        var featureBBox = new L.LatLngBounds(
                new L.LatLng(f.feature.bounds[0], f.feature.bounds[1]),
                new L.LatLng(f.feature.bounds[2], f.feature.bounds[3]));
        return (bbox.intersects(featureBBox) &&
            f.feature.linestring &&
            moment(f.meta.timestamp).format("MMM Do YY") === moment().format("MMM Do YY") &&
            ignore.indexOf(f.meta.user) === -1 &&
            f.feature.linestring.length > 4);
    }).sort(function(a, b) {
        return (+new Date(a.meta.tilestamp)) -
            (+new Date(a.meta.tilestamp));
    });
    // if (queue.length > 2000) queue = queue.slice(0, 2000);
});

bing.on('offset', function(data) {
    var offset = data.found && data.distance > 0.1,
        qsize = document.getElementById('queuesize'),
        qsizeHTML = qsize.innerHTML;
    if( offset && qsizeHTML.indexOf('.') < 0 )
        qsize.innerHTML = qsizeHTML + '.';
    else if( !offset && qsizeHTML.indexOf('.') >= 0 )
        qsize.innerHTML = qsizeHTML.substring(0, qsizeHTML.indefOf('.'));
});

function doDrawWay() {
    var qsize = document.getElementById('queuesize'),
        isOffset = qsize.innerHTML.indexOf('.');
    qsize.innerHTML = queue.length + (isOffset ? '.' : '');
    if (queue.length) {
        drawWay(queue.pop(), function() {
            doDrawWay();
        });
    } else {
        window.setTimeout(doDrawWay, runSpeed);
    }
}

function pruneLines() {
    var mb = map.getBounds();
    lineGroup.eachLayer(function(l) {
        if (!mb.intersects(l.getBounds())) {
            lineGroup.removeLayer(l);
        } else {
            l.setStyle({ opacity: 0.5 });
        }
    });
}

function setTagText(change) {
    var showTags = ['building', 'natural', 'leisure', 'waterway',
        'barrier', 'landuse', 'highway', 'power'];
    for (var i = 0; i < showTags.length; i++) {
        if (change.feature.tags[showTags[i]]) {
            change.tagtext = showTags[i] + '=' + change.feature.tags[showTags[i]];
            return change;
        }
    }
    change.tagtext = 'линию';
    return change;
}

function drawWay(change, cb) {
    pruneLines();

    var way = change.feature;

    // Zoom to the area in question
    var bounds = new L.LatLngBounds(
        new L.LatLng(way.bounds[2], way.bounds[3]),
        new L.LatLng(way.bounds[0], way.bounds[1]));

    if (farFromLast(bounds.getCenter())) showLocation(bounds.getCenter());
    showComment(way.changeset);

    var timedate = moment(change.meta.timestamp);
    change.timetext = timedate.fromNow();

    map.fitBounds(bounds);
    overview_map.panTo(bounds.getCenter());
    changeset_info.innerHTML = changeset_tmpl({ change: setTagText(change) });

    var color = { 'create': '#B7FF00', 'modify': '#FF00EA', 'delete': '#FF0000' }[change.type];
    if (change.feature.tags.building || change.feature.tags.area) {
        newLine = L.polygon([], {
            opacity: 1,
            color: color,
            fill: color
        }).addTo(lineGroup);
    } else {
        newLine = L.polyline([], {
            opacity: 1,
            color: color
        }).addTo(lineGroup);
    }
    // This is a bit lower than 3000 because we want the whole way
    // to stay on the screen for a bit before moving on.
    var perPt = runSpeed / (2 * way.linestring.length);

    function drawPt(pt) {
        newLine.addLatLng(pt);
        if (way.linestring.length) {
            window.setTimeout(function() {
                drawPt(way.linestring.pop());
            }, perPt);
        } else {
            window.setTimeout(cb, runSpeed / 2);
        }
    }

    newLine.addLatLng(way.linestring.pop());
    drawPt(way.linestring.pop());
}

doDrawWay();
