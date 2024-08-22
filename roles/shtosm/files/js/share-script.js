var addthis = false

var addthis_config = {
  data_track_clickback: true,
  ui_click: true,
  ui_cobrand: 'SHTOSM',
  ui_language: "en",
  services_expanded: 'facebook',
}

var headEl = document.getElementsByTagName("head")[0]
var e = document.createElement ('script')
e.type = "text/javascript"
e.src = 'http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4eb93cb316cd8e2d'
e.async = true
headEl.appendChild (e)

$ (function () {
  var el = document.getElementById ('share-element')
  url = el.getAttribute ('share:url')
  el.innerHTML = (
    '<div style="width: 100%; position: absolute;">' +
    '<div class="addthis_toolbox addthis_default_style"' + 
      'addthis:url="' + url + '">' + 
    '<a class="addthis_button_facebook_like" fb:like:layout="button_count" fb:like:locale="en_US"></a>' + 
    '<a class="addthis_button_tweet"></a>' + 
    '<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>' + 
    '<a class="addthis_button_compact"></a>' +
    '</div>' +
    '</div>'
  )

  if (addthis) addthis.init ()

})
