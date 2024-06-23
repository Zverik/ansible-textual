<?php
header("Content-Type: text/html; charset=utf-8");
$t = localtime();
$regok = $t[5] == 113 || ($t[4] == 0 && $t[5] == 114);

if( isset($_POST['name']) && $regok ) {
	$name = trim($_POST['name']);
	$osmname = trim($_POST['osmname']);
	$email = trim($_POST['email']);
	$title = isset($_POST['title']) ? trim($_POST['title']) : '';
	$duration = isset($_POST['duration']) ? $_POST['duration'] : 0;
	$remind = isset($_POST['remind']);
	
	$expire = time()+60*60*24*60;
	setcookie('name', $name, $expire);
	setcookie('osmname', $osmname, $expire);
	setcookie('email', $email, $expire);
	setcookie('title', $title, $expire);
	setcookie('duration', $duration, $expire);
	setcookie('remind', $remind ? 1 : 0, $expire);

	$handle = fopen('ommm16.csv', 'a');
	if( $handle !== FALSE ) {
		fwrite($handle, date('j.m').";$name;$osmname;$email;$title;$duration;".($remind?'remind':'nomail')."\n");
		fclose($handle);
	}

	$message = "Новый участник микроконференции 1 февраля 2014: $name ($osmname)\n";
	if( strlen($email) > 0 )
		$message .= "E-mail: $email\n";
	if( strlen($title) )
		$message .= "Хочет сделать доклад \"$title\" на $duration минут.\n";
	if( $remind )
		$message .= "Просит напомнить о докладе за две недели до конференции.\n";
	$message .= "\nЭто был бот, приятной недели!\n";

	$from_user = "=?UTF-8?B?".base64_encode('Бот ОМММ')."?=";
	$subject = "=?UTF-8?B?".base64_encode("ОМММ: $name")."?=";

	$headers = "From: $from_user <shtosm@textual.ru>\r\nMIME-Version: 1.0\r\nContent-type: text/plain; charset=\"UTF-8\"\r\n"; 
	mail('ilya@textual.ru', $subject, $message, $headers);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="refresh" content="2; url=http://ommm.osmz.ru">
<title>ОМММ: Конференция про OpenStreetMap в Москве 1 февраля</title>
<style>
body {
	font-size: 18pt;
	font-family: "PT Sans", "Helvetica", "Arial", sans-serif;
	margin-top: 200px;
	text-align: center;
}
h1 {
	font-size: 26pt;
	font-weight: bold;
	text-align: center;
}
</style>
</head>
<body>
<h1>Спасибо за регистрацию!</h1>
<p>Чтобы поправить данные, просто отошлите форму ещё раз.</p>
<p><a href="/">Вернуться</a></p>
</body>
</html>
<?php
}

?>
