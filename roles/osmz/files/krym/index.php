<!DOCTYPE html>
<html>
<head>
<title>Картопроект #крым / #крим</title>
<meta charset="utf-8">
<script type="text/javascript" src="countdown.min.js"></script>
<script type="text/javascript" src="yetii-min.js"></script>
<script type="text/javascript" src="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.js"></script>
<script type="text/javascript" src="leaflet.magnifyingglass.js"></script>
<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.css" />
<link rel="stylesheet" href="leaflet.magnifyingglass.css" />
<link rel="stylesheet" href="style.css" />
</head>
<body>
<h1 style="float:right;">#КРИМ</h1>
<h1>#КРЫМ</h1>
<div id="tab-container">
<ul id="tab-container-nav">
<li><a href="#tab-about">Что это?</a></li>
<li><a href="#tab-about-uk">Що це?</a></li>
<li><a href="#tab-stats">Статистика</a></li>
<li><a href="#tab-map">Карта</a></li>
<li><a href="#tab-pie">Сетка</a></li>
<li><a href="#tab-wdi">Правки</a></li>
<li><a href="#tab-show">Телевизор</a></li>
<li style="float: right;"><div id="clock"></div></li>
</ul>

<div class="tab" id="tab-about">
<h2>Мы рисуем Крым!</h2>
<p>Эпического размаха диванная картовстреча началась 21 марта и продлится до вечера 31-го. Это событие не требует
куда-то ехать и мёрзнуть: просто запустите JOSM, загрузите слабо отрисованный район Крымского полуострова, подключите
снимки и улучшайте карту. Для указания, что вы не мимо проходили, загрузите хотя бы один крымский пакет правок с хэштегом
<tt>#крым</tt> (или <tt>#крим</tt>, если вам привычнее украинский). Спустя час-два вы обнаружите себя в списке участников,
а на странице правок увидите, кто чем занимался в это время.</p>

<p>Установите плагины <a href="http://wiki.openstreetmap.org/wiki/RU:JOSM/Plugins/GeoChat">geochat</a>, чтобы не толкаться
с другими участниками, и <a href="http://wiki.openstreetmap.org/wiki/RU:Imagery_Offset_Database/Quick_Start">imagery_offset_db</a>
для сохранения смещений подложек. В меню снимков вы заметите ортофотокарты 2012 года: качество их невысоко,
но покрытие полное. Обсуждение картопроекта идёт <a href="http://forum.openstreetmap.org/viewtopic.php?id=24759">на форуме</a>,
логин и пароль к нему те же, что в osm.org. Участник Xmypblu сделал
<a href="http://mapcraft.nanodesu.ru/pie/386">сетку в MapCraft</a>, которая может помочь в координации.</p>

<p>Выбирать лучше деревни и города вдали от туристических мест, которые уже неплохо прорисованы. Красноперекопск и Советский
стоят практически нетронутыми, не говоря даже о деревнях, от которых в проекте только когда-то импортированные границы
и пара улиц. Названия нужно помещать в теги <tt>name:ru</tt> и <tt>name:uk</tt>, в <tt>name</tt> заносите либо украинское
название, либо не трогайте. Для адресов там принята
<a href="http://wiki.openstreetmap.org/wiki/RU:Key:addr#.D0.A3.D0.BA.D1.80.D0.B0.D0.B8.D0.BD.D1.81.D0.BA.D0.B0.D1.8F_.D1.81.D1.85.D0.B5.D0.BC.D0.B0_.D0.B0.D0.B4.D1.80.D0.B5.D1.81.D0.B0.D1.86.D0.B8.D0.B8">своя схема</a>,
на отношениях associatedStreet. Источников адресации и названий, к сожалению, у нас нет.</p>

<p>После окончания
картопроекта, если вы не исчезли после первых правок, участник Zverik спросит ваш почтовый адрес: на него отправят сувенир.
Страна проживания не имеет значения, мы рады всем.</p>

<p>Приятного картирования!</p>
</div>

<div class="tab" id="tab-about-uk">
<p>Епічного розмаху диванна картозустріч почалася 21 березня і триватиме до вечора
31го. У рамках цієї події вам не треба кудись їхати і мерзнути: просто запустіть
JOSM, завантажте погано замаплені район Кримського півострова, підключіть знімки
та покращуйте карту. Для індикації, що ви не просто проходили повз, завантажте
хоча б один кримський пакет правок з хештегом <tt>#крим</tt>. Через годину-дві ви зможете знайти себе у списку
учасників,
а на сторінці правок побачите, хто чим займався в цей час.</p>

<p>Встановіть плагіни <a href="http://wiki.openstreetmap.org/wiki/RU:JOSM/Plugins/GeoChat">geochat</a>, щоб уникнути конфліктів з іншими учасниками, та
<a href="http://wiki.openstreetmap.org/wiki/RU:Imagery_Offset_Database/Quick_Start">imagery_offset_db</a> для збереження зсувів підкладок. У меню знімків можна знайти
ортофотокарти 2012 року: якість їх невисока, але покриття повне. Обговорення
проекту йде на форумі, логін і пароль такі самі, як і на osm.org.</p>

<p>Вибирати краще села і міста подалі від туристичних місць, які вже
добре замаплені.
Красноперекопськ і Радянський практично не відмальовані, не кажучи вже про села,
від яких у проекті є тільки колись імпортовані межі і декілька вулиць. Назви
потрібно вписуватьи в теги <tt>name:ru</tt> та <tt>name:uk</tt>, в <tt>name</tt> заносьте або українську
назву або нічого. Для адрес прийнята
<a href="http://wiki.openstreetmap.org/wiki/RU:Key:addr#.D0.A3.D0.BA.D1.80.D0.B0.D0.B8.D0.BD.D1.81.D0.BA.D0.B0.D1.8F_.D1.81.D1.85.D0.B5.D0.BC.D0.B0_.D0.B0.D0.B4.D1.80.D0.B5.D1.81.D0.B0.D1.86.D0.B8.D0.B8">схема</a> на відносинах associatedStreet. Джерел адресації і назв у нас,
на жаль, немає.</p>

<p>Після закінчення проекту, якщо ви не зникли після перших
правок, Zverik запитає вашу поштову адресу: на нього відправлять сувенір. Країна
проживання не має значення, ми раді всім.</p>

<p>Приємного картування!</p>
</div>

<div class="tab" id="tab-stats">
<h2>Длины и площади</h2>
<?php
$stat_titles = array('Грунтовки', 'Тропы', 'Автодороги', 'Железные дороги', 'Водные пути', 'ЛЭП', 'Возделываемые поля', 'Леса, луга и болота', 'Землепользование', 'Здания', 'Опоры ЛЭП');
$stat_measure = array('км', 'км', 'км', 'км', 'км', 'км', 'км²', 'км²', 'км²', 'шт.', 'шт.');
$data_skip = 1;
$stats = @file('krym-stats.csv');
if( $stats !== false && count($stats) >= 2 ) {
	$header = explode('|', trim($stats[0]));
	echo '<table cellspacing="1" cellpadding="0" border="0">';
	for( $si = 1; $si < count($stats); $si++ ) {
		$data = explode('|', trim($stats[$si]));
		$cdata = count($data);
		if( $cdata > $data_skip+2 && $data[$cdata-1] / $data[$data_skip+1] >= 1.1 ) {
			echo '<tr><td style="padding-right: 1em;" valign="top">'.$stat_titles[$si-1].'</td><td style="font-size: 8pt; padding-top: 4px;">';
			$scale = 100 / $data[$data_skip+1];
			for( $p = $data_skip+1; $p < $cdata; $p++ ) {
				$datec = substr($header[$p],4,2).'.'.substr($header[$p],2,2);
				$color = $p <= $data_skip + 1 || $p > 13 ? 'lightblue' : 'blue';
				echo '<div title="'.$datec.': '.round($data[$p]).($p == $data_skip+1 ? '' : ' (+'.round($data[$p]-$data[$p-1]).')').'" style="background: '.$color.'; width: '.max(1, round($p == $data_skip + 1 ? 100 : ($data[$p]-$data[$p-1])*$scale)).'px; height: 6px; margin-right: 1px; display: inline-block;"></div>';
			}
			echo '</td><td style="padding-left: 1em;" valign="top">'.round($data[$cdata-1]).' '.$stat_measure[$si-1].' (+'.round($data[$cdata-1] - $data[$data_skip+1]).' / '.round(100 * $data[$cdata-1] / $data[$data_skip+1]).'%)</td></tr>';
		}
	}
	$date1 = $header[$data_skip+1];
	$date2 = $header[count($header)-1];
	echo '<tr><td></td><td>';
	echo '<div style="font-size: 8pt; color: #888;"><div style="float: left;">'.substr($date1,4,2).'.'.substr($date1,2,2).'</div><div style="float: right;">'.substr($date2,4,2).'.'.substr($date2,2,2).'</div></div>';
	echo '</td><td></td></tr>';
	echo '</table>';
}
?>
<h2>Участники картопроекта</h2>
<?php
$user_cache = 'users.json';
/* Mapping event has ended
if( !file_exists($user_cache) || filesize($user_cache) < 10 || time() - filemtime($user_cache) > 3600 ) {
	$str = @file_get_contents('http://zverik.osm.rambler.ru/whodidit/krym/scripts/users.php');
	if( strlen($str) > 0 ) {
		@file_put_contents($user_cache, $str);
	}
}*/
$cached_users = @file_get_contents($user_cache);
if( $cached_users !== false ) {
	$users = json_decode($cached_users);
	if( is_array($users) ) {
		echo '<table border="0" cellpadding="0" cellspacing="0" id="user-table">';
		$ucount = count($users);
		$columns = 4;
		$colheight = ceil($ucount / $columns);
		$remainder = $ucount % $columns;
		if( $remainder == 0 ) $remainder = $columns;
		for( $row = 0; $row < $colheight; $row++ ) {
			echo '<tr>';
			for( $col = 0; $col < $columns; $col++ ) {
				$p = $col * ($colheight - 1) + $row + min($col, $remainder);
				if( $p < $ucount && ($row < $colheight - 1 || $col < $remainder) )
					echo '<td>'.$users[$p].'</td>';
				else
					echo '<td></td>';
			}
			echo '</tr>';
		}
		echo '</table>';
		echo '<p>Всего '.$ucount.' человек'.($ucount%10 >= 2 && $ucount%10 <= 4 ? 'а' : '').'.</p>';
	}
}
?>
</div>

<div class="tab" id="tab-map">
<div id="map"></div>
<p>Под курсором показывается состояние карты на утро 21 марта. Отмечены места, где хорошо поработали участники картопроекта.</p>
</div>

<div class="tab" id="tab-pie">
<iframe src="http://mapcraft.nanodesu.ru/pie/386" style="width: 100%; height: 600px; border: none;"></iframe>
<p>Для редактирования не обязательно отмечаться на этой сетке, но может быть полезно, если вы редактируете большие площади.</p>
</div>

<div class="tab" id="tab-wdi">
<iframe src="http://zverik.osm.rambler.ru/whodidit/krym/" style="width: 100%; height: 600px; border: none;"></iframe>
</div>

<div class="tab" id="tab-show">
<iframe src="telesplash.html" style="width: 100%; height: 600px; border: none;"></iframe>
</div>
</div>

<script>
var targetDate = new Date('2014-03-31T22:00:00Z');
function d2(n) {
	return n < 10 ? '0' + n : n;
}
function updateTimer() {
	var timespan = countdown(targetDate), s = '';
	if( timespan.days ) {
		s += timespan.days + ' ';
		if( timespan.days > 4 ) s += 'дней';
		else if( timespan.days > 1 ) s += 'дня';
		else s += 'день';
		s += ' и ';
	}
	s += timespan.hours + ':' + d2(timespan.minutes) + ':' + d2(timespan.seconds);
	document.getElementById('clock').innerHTML = s;
}
//updateTimer();
//window.setInterval(updateTimer, 1000);

var map = L.map('map', { minZoom: 9, maxZoom: 15}).setView([45.28, 34.52], 9);
map.setMaxBounds([[44.3, 32.44], [46.25, 36.65]]);
L.tileLayer('http://tile.openstreetmap.org/{z}/{x}/{y}.png?{r}', { r: function() { return Math.floor(Math.random()*1000); }, attribution: 'Map &copy; <a href="http://openstreetmap.org">OpenStreetMap</a>' }).addTo(map);
var historyLayer = L.tileLayer('http://zverik.osm.rambler.ru/mbtiles/w/krym/{z}/{x}/{y}.png', { minZoom: 8, maxZoom: 15});
var usersLayer = L.layerGroup();
var glass = L.magnifyingGlass({ zoomOffset: 0, radius: 220, layers: [historyLayer, usersLayer] });
map.addLayer(glass);
var mar21 = L.DomUtil.create('div');
mar21.appendChild(document.createTextNode('21 марта'));
mar21.style.position = 'relative';
mar21.style.bottom = '20px';
mar21.style.textAlign = 'center';
mar21.style.fontSize = '8pt';
mar21.style.color = '#888';
glass._wrapperElt.appendChild(mar21);

// users from share.mapbbcode
function ajax( url, callback, context ) {
	var http;
	if (window.XMLHttpRequest) {
		http = new window.XMLHttpRequest();
	}
	if( window.XDomainRequest && (!http || !('withCredentials' in http)) ) {
		// older IE that does not support CORS
		http = new window.XDomainRequest();
	}
	if( !http )
		return;

	function respond() {
		var st = http.status;
		callback.call(context,
			(!st && http.responseText) || (st >= 200 && st < 300) ? false : (st || 499),
			http.responseText);
	}

	if( 'onload' in http )
		http.onload = http.onerror = respond;
	else
		http.onreadystatechange = function() { if( http.readyState == 4 ) respond(); };

	try {
		http.open('GET', url, true);
		http.send(null);
	} catch( err ) {
		// most likely a security error
		callback.call(context, 399);
	}
}

var gjOptions = {
	pointToLayer: function(feature, latlng) {
		return L.marker(latlng, { icon: L.divIcon({ className: 'user-icon', html: feature.properties.title}) });
	}
};
var users;
function updateUsers() {
	if( users && map.hasLayer(users) )
		map.removeLayer(users);
	usersLayer.clearLayers();
	ajax('http://share.mapbbcode.org/rcmvy?format=geojson', function(error, data) {
		if( error ) return;
		var points = JSON.parse(data);
		users = L.geoJson(points, gjOptions);
		map.addLayer(users);
		usersLayer.addLayer(L.geoJson(points, gjOptions));
	});
}
updateUsers();

function tabChanged(num) {
	if( num == 4 ) {
		map.invalidateSize();
	}
}
window.setTimeout(function() {
	var tabber = new Yetii({ id: 'tab-container', callback: tabChanged, persist: true });
}, 1000);
</script>
</body>
</html>
