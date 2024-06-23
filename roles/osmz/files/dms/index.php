<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ДМС для Mail.Ru от ВТБ Страхования</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<style>
body {
    font-family: sans-serif;
    font-size: 16px;
    line-height: 1.2;
    max-width: 500px;
    margin: 1em auto;
    padding: 0 0.5em;
}

h1 {
    font-size: 24px;
}

.tel a {
    color: inherit;
}

.map {
    font-weight: bold;
}

.map a { color: darkblue; }
</style>
</head>
<body>
<h1>ДМС от ВТБ-Страхование</h1>
<p class="tel">Экстренная помощь в России: <a href="tel:0544">0544</a> (бесплатно с мобильных Билайна, Мегафона, МТС, Теле2),
<a href="tel:+78001004440">+7 800 100-44-40</a> (бесплатно), <a href="tel:+74956444440">+7 495 644-44-40</a>.</p>
<p class="tel">Экстренная помощь за границей: <a href="tel:+74957750999">+7 495 775-09-99</a>,
<a href="tel:+74957750993">+7 495 775-09-93</a> (компания Global Voyager Assistance Cyprus LTD).</p>
<p>При обращении сообщите фамилию, имя, отчество, номер полиса <?=isset($_GET['number']) ? htmlspecialchars($_GET['number']) : '(запишите его!)' ?>.</p>

<p class="map"><a href="map.html">Интерактивная карта поликлиник в Москве</a></p>
<p class="map"><a href="dms-2017.kmz">Скачать KML с ними</a> для <a href="https://maps.me/download/">MAPS.ME</a></p>

<p>Ваш вариант страхования № 3 (Staff). Страховые случаи&nbsp;— развитие состояний:</p>
<ul>
    <li>острого заболевания и/или состояния;</li>
    <li>обострения хронического заболевания;</li>
    <li>травм, включая ожоги и отморожения;</li>
    <li>отравлений;</li>
    <li>заболеваний зубов и ротовой полости (кариес и его осложнения – пульпит и периодонтит, заболевания пародонта, травмы челюстно-лицевой области).</li>
</ul>
</body>
</html>
