<?php
	$name = isset($_COOKIE['name']) ? htmlspecialchars($_COOKIE['name']) : '';
	$osmname = isset($_COOKIE['osmname']) ? htmlspecialchars($_COOKIE['osmname']) : '';
	$email = isset($_COOKIE['email']) ? htmlspecialchars($_COOKIE['email']) : '';
	$title = isset($_COOKIE['title']) ? htmlspecialchars($_COOKIE['title']) : '';
	$duration = isset($_COOKIE['duration']) ? $_COOKIE['duration'] : 0;
	$d15Check = $duration <= 15 ? 'checked="checked"' : '';
	$d30Check = $duration > 15 && $duration <= 30 ? 'checked="checked"' : '';
	$d60Check = $duration > 30  ? 'checked="checked"' : '';
	$remind = isset($_COOKIE['remind']) && $_COOKIE['remind'] == '1' ? 'checked="checked"' : '';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>ОМММ: Конференция про OpenStreetMap в Москве 1 февраля</title>
<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.1/leaflet.css" />
<script src="http://cdn.leafletjs.com/leaflet-0.7.1/leaflet.js?2"></script>
<style>
html, body, #fullmap {
	height: 1700px;
	margin: 0;
}
body, #whiteback {
	background-image: url(snow_texture1600.jpg);
}
#logo, #contour {
	position: absolute;
	text-align: center;
	width: 100%;
	top: 40px;
        pointer-events: none;
}
#contour {
	top: 37px;
}
#nextgis {
	position: absolute;
	top: 210px;
        padding-left: 280px;
	text-align: center;
	width: 100%;
        pointer-events: none;
}
.leaflet-container {
	background: none;
}
#whiteback, #content {
	opacity: 0.95;
	position: absolute;
	top: 350px;
	height: 1350px;
	left: 10%;
	width: 80%;
}
#content {
	opacity: 1.0;
	padding: 20px 50px 0;
	box-sizing: border-box;
	-moz-box-sizing: border-box;
	-webkit-box-sizing: border-box;
	font-size: 18pt;
	font-family: "PT Sans", "Helvetica", "Arial", sans-serif;
}
#content input {
	font-size: 16pt;
}
#content .label {
	display: inline-block;
	width: 180px;
	font-weight: bold;
}
h1 {
	font-size: 26pt;
	font-weight: bold;
	text-align: center;
}
#submit {
	margin: 1em;
	text-align: center;
}
#submit input {
	padding: 5px 30px;
	font-size: 24pt;
	background-color: #FFA100;
}
#submit input:disabled {
	background-color: white;
}
ul li {
    margin-bottom: 0.3em;
	font-size: 16pt;
}
</style>
</head>
<body>
<div id="fullmap"></div>
<div id="contour"><img src="ommm2s.png"></div>
<div id="logo"><img src="ommm2.png"></div>
<div id="nextgis"><a href="http://nextgis.ru"><img src="sponsor.png"></a></div>
<div id="whiteback"></div>
<div id="content">
<h1>Конференция про OpenStreetMap<br>Москва, МИИГАиК, 1 февраля, 11:00</h1>
<p>Спустя полтора года после <a href="http://textual.ru/mmm/">МММ</a>, где тепло посидели,
обсудив новости проекта и поговорив о новых технологиях картирования и будущем OSM, мы решили
собраться в похожем формате вновь.
Олимпийская Микроконференция Мапперов в Москве прошла 1 февраля с 11 утра до 19 вечера.
Помещение предоставил <a href="http://www.miigaik.ru/about/">университет геодезии и картографии</a>.</p>

<p>Доклады конференции:</p>
<ul>
<li>Александр Петров, «Карта Краснохолма. Как это было» (<a href="http://www.youtube.com/watch?v=0_s7sgHY2V8&list=PLkvzAel8ISD1CxZtsR3Ji5docUkWO8XVy">видео</a>, <a href="http://forum.openstreetmap.org/viewtopic.php?id=23984">форум</a>)</li>
<li>Максим Дубинин, «OpenStreetMap и краудсорсинговые тематические проекты — модель взаимодействия» (<a href="http://www.youtube.com/watch?v=oGyPqPd2rK0&list=PLkvzAel8ISD1CxZtsR3Ji5docUkWO8XVy">видео</a>, <a href="pres/md.pdf">слайды</a>)</li>
<li>Кирилл Бондаренко, «Подходы к адресному поиску. Номинатим и навигаторы» (<a href="http://www.youtube.com/watch?v=6oFGAbjNtHc&list=PLkvzAel8ISD1CxZtsR3Ji5docUkWO8XVy">видео</a>, <a href="pres/zkir-ppt.pdf">слайды</a>)</li>
<li>Артём Светлов, «osmot — рендер маршрутов общественного транспорта» (<a href="http://www.youtube.com/watch?v=OYbLCjH3F3s&list=PLkvzAel8ISD1CxZtsR3Ji5docUkWO8XVy">видео</a>, <a href="pres/trolleway.pdf">слайды</a>)</li>
<li>Евгений Зелинский, «Техника маппинга крупных природных массивов» (<a href="http://www.youtube.com/watch?v=GsHJyN8TlpY&list=PLkvzAel8ISD1CxZtsR3Ji5docUkWO8XVy">видео</a>, <a href="pres/hind.pdf">слайды</a>)</li>
<li>Константин Мошков, «OSM в практике велосипедной жизни» (<a href="http://www.youtube.com/watch?v=M5FDpGk32Ck&list=PLkvzAel8ISD1CxZtsR3Ji5docUkWO8XVy">видео</a>, <a href="pres/gam.zip">слайды</a>)</li>
<li>Сотрудники МИИГАиК про учебный процесс с последующей дискуссией (<a href="http://www.youtube.com/watch?v=TVpjPDxrR3g&list=PLkvzAel8ISD1CxZtsR3Ji5docUkWO8XVy">видео</a>)</li>
<li>Владимир Елистратов, «В 3D через OSM и Blender» (<a href="http://www.youtube.com/watch?v=_r-Z5sID0iw&list=PLkvzAel8ISD1CxZtsR3Ji5docUkWO8XVy">видео</a>, <a href="pres/elistratov.pdf">слайды</a>)</li>
<li>Илья Зверев, «OSM проваливает (помимо прочего) социалку» (<a href="http://www.youtube.com/watch?v=2a7qp-K2Cg4&list=PLkvzAel8ISD1CxZtsR3Ji5docUkWO8XVy">видео</a>, <a href="pres/zverik.pdf">слайды</a>)</li>
<li>Евгений Зелинский, «Расширение для Хрома «POI: The Gathering» (<a href="http://www.youtube.com/watch?v=9gmWJJjV-es&list=PLkvzAel8ISD1CxZtsR3Ji5docUkWO8XVy">видео</a>)</li>
</ul>
<p>«Короткие» доклады:</p>
<ul>
<li>Дорофей Пролесковский, «Адреса и их поиск» (<a href="http://www.youtube.com/watch?v=uSm1JAHFxhA&list=PLkvzAel8ISD1CxZtsR3Ji5docUkWO8XVy">видео</a>, <a href="pres/komzpa.pdf">слайды</a>)</li>
<li>Александр Зейналов, «Единая сетевая разметка» (<a href="http://www.youtube.com/watch?v=9XtjZK2VfwU&list=PLkvzAel8ISD1CxZtsR3Ji5docUkWO8XVy">видео</a>)</li>
<li>Пётр Степанов про использование OSM смоленскими организациями</li>
<li>Илья Зверев, «MapBBCode» (<a href="http://www.youtube.com/watch?v=J2MFeOdxXY8&list=PLkvzAel8ISD1CxZtsR3Ji5docUkWO8XVy">видео</a>)</li>
<li>Кирилл Бондаренко, «Ещё два слова про валидатор» (<a href="http://www.youtube.com/watch?v=Rf5757um8oM&list=PLkvzAel8ISD1CxZtsR3Ji5docUkWO8XVy">видео</a>)</li>
<li>Дмитрий Маракасов, «Каталог POI» (<a href="http://www.youtube.com/watch?v=OQuvYnA3atk&list=PLkvzAel8ISD1CxZtsR3Ji5docUkWO8XVy">видео</a>)</li>
<li>Павел Златовратский, «osmupdate.py» (<a href="http://www.youtube.com/watch?v=YaVDrP1YaIE&list=PLkvzAel8ISD1CxZtsR3Ji5docUkWO8XVy">видео</a>)</li>
<li>Евгений Зелинский, «Bookmarklet» (<a href="http://www.youtube.com/watch?v=rG41O0xVNhE&list=PLkvzAel8ISD1CxZtsR3Ji5docUkWO8XVy">видео</a>)</li>
</ul>
<p>Организатор — <a href="mailto:zverik@textual.ru">Илья Зверев</a>, спонсор — <a href="http://nextgis.ru/">компания NextGIS</a>.</p>
</div>
<script>
L.DomEvent.on(window, 'load', function() {
	var map = L.map('fullmap', { keyboard: false, zoomControl: false, attributionControl: false, scrollWheelZoom: false, doubleClickZoom: false, boxZoom: false, minZoom: 15, maxZoom: 16 });
	map.setView([55.7561,37.662], 16);
	//L.tileLayer('http://www.mapbox.com/v3/zverik.ommm/{z}/{x}/{y}.png').addTo(map); // unreliable, sadly
	L.tileLayer('ommm-tiles/{z}/{x}/{y}.png').addTo(map);
	//L.polyline([[55.76033,37.662],[55.76219,37.66345],[55.76309,37.66046],[55.76323,37.66052],[55.76349,37.66142]], { color: '#ffa100', weight: 5, opacity: 0.8 }).bindPopup('Выход из станции метро «Курская» на Нижний Сусальный переулок, затем прямо и налево 600 метров пешком. Войдёте через КПП и идите прямо, между общежитием и новым учебным корпусом. Вам нужен павильон: он слева сразу за общежитием, до карты России, нарисованной на асфальте.').addTo(map);

	function panmap() {
		var wb = document.getElementById('whiteback');
		wb.style.backgroundPosition = '-' + wb.offsetLeft + 'px -350px';
	}
	L.DomEvent.on(window, 'resize', panmap);
	panmap();

	function check() {
		var on = true;
		if( document.getElementById('name').value == '' ) on = false;
		if( document.getElementById('email').value == '' ) on = false;
		if( document.getElementById('title').value != '' && !document.getElementById('d15').checked && !document.getElementById('d30').checked ) on = false;
		document.getElementById('subbtn').disabled = !on;
	}
	check();

	var listen = ['name', 'title', 'email', 'd30', 'd15'];
	for( var i = 0; i < listen.length; i++ ) {
		var el = document.getElementById(listen[i]);
		if( el.type == 'text' ) {
			L.DomEvent.on(el, 'change', check)
				.on(el, 'keyup', check)
				.on(el, 'paste', check);
		} else { // radio/checkbox
			L.DomEvent.on(el, 'click', check);
		}
	}
});
</script>
</body>
</html>
