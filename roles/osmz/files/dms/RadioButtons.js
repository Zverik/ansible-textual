L.RadioButtons = L.Control.extend({
    includes: (L.Evented.prototype || L.Mixin.Events),

    initialize: function (buttons, options) {
        this._buttons = buttons;
        L.Control.prototype.initialize.call(this, options);
    },

    onAdd: function (map) {
        this._map = map;
        this._links = [];
        this._selected = -1;

        var container = L.DomUtil.create('div', 'leaflet-bar');
        for( var i = 0; i < this._buttons.length; i++ ) {
            var button = this._buttons[i],
                link = L.DomUtil.create('a', '', container);
            this._links.push(link);
            link._buttonIndex = i;
            link.href = '#';
            link.style.padding = '0 4px';
            link.style.width = 'auto';
            link.style.minWidth = '20px';
            link.innerHTML = button;
            this._updateStyle(i, false);

            var stop = L.DomEvent.stopPropagation;
            L.DomEvent
                .on(link, 'click', stop)
                .on(link, 'mousedown', stop)
                .on(link, 'dblclick', stop)
                .on(link, 'click', L.DomEvent.preventDefault)
                .on(link, 'click', this.clicked, this);
        }
        this.setSelected(0);

        return container;
    },

    _updateStyle: function (n, selected) {
        this._links[n].style.backgroundColor = selected ? '#ffc' : 'white';
        // this._links[n].style.fontWeight = selected ? 'bold' : 'normal';
    },

    setSelected: function (n) {
        if (n < 0 || n > this._links.length)
            return;
        if (n == this._selected && this._links.length > 1)
            return;
        if (this._links.length > 1) {
            if (this._selected >= 0)
                this._updateStyle(this._selected, false);
            this._updateStyle(n, true);
        }
        this._selected = n;
        this.fire('clicked', { idx: n });
    },

    clicked: function (e) {
        var link = (window.event && window.event.srcElement) || e.target || e.srcElement;
        while( link && 'tagName' in link && link.tagName !== 'A' && !('_buttonIndex' in link ) )
            link = link.parentNode;
        if( '_buttonIndex' in link )
            this.setSelected(link._buttonIndex);
    }
});

L.radioButtons = function (buttons, options) {
    return new L.RadioButtons(buttons, options);
};
