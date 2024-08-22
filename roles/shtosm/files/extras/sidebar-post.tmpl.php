<div class="sidebar-element">
<h2>Рекомендую</h2>

<ul class="links-list">
  <li><a href="https://josm.ru/">JOSM.ru</a></li>
  <li><a href="https://www.weeklyosm.eu/ru/">WeeklyOSM</a></li>
  <li><a href="https://forum.openstreetmap.org/viewforum.php?id=21">Русский форум</a></li>
  <li><a href="https://openstreetmap.ru/">OpenStreetMap.ru</a></li>
  <li><a href="https://t.me/ruosm">Группа в Telegram</a></li>
  <li><a href="https://vk.com/openstreetmap">Группа во вконтакте</a></li>
  <li><a href="https://blogs.openstreetmap.org/">Лента всех блогов OSM</a></li>
</ul>
</div>

<!--div class="sidebar-element">
<h2>Новости OSMF</h2>
<ul id="osmf-blog" class="links-list"></ul>
<div><a href="https://blog.openstreetmap.org/?lang=ru">Все новости</a></div>
</div>
<script>
var months = ['янв', 'фев', 'мар', 'апр', 'мая', 'июня', 'июля', 'авг', 'сен', 'окт' ,'ноя', 'дек'];
$.get('/user/extras/osmf-blog.rss', function(data) {
  $(data).find('item').slice(0,3).each(function() {
    var el = $(this);
    var date = new Date(el.find('pubDate').text());
    var title = '<a href="' + el.find('link').text() + '">' + el.find('title').text() + '</a>';
    $('#osmf-blog').append('<li>' + date.getDate() + ' ' + months[date.getMonth()] + ': ' + title + '</li>');
  });
});
</script-->

<div class="sidebar-element">
<h2>Другие каналы</h2>
<div><a href="https://t.me/shtosm">Телеграм</a></div>
<div><a href="http://twitter.shtosm.ru">Архив твитера</a></div>
</div>
<div class="sidebar-element">
<a class="twitter-timeline" data-dnt="true" href="https://twitter.com/shtosm" data-link-color="#004276" data-chrome="nofooter noheader noborders noscrollbar transparent" data-tweet-limit="3" lang="ru" data-widget-id="339415035942141952">Tweets by @shtosm</a>
<!--script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script-->
</div>
