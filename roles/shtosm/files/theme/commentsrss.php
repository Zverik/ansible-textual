<?
	$limit = 20;
	$blogauthor = 'Илья «Zverik»';
	$db = mysql_connect('localhost', 'whatosm', '3G8A8p6HvsuyQP4U') or die('Could not connect: '.mysql_error());
	mysql_select_db('shtosm') or die('Database fail');
	mysql_set_charset('utf8',$db);
	$query1 = "select Stamp, NoteID, AuthorName, Text from e2Comments where IsVisible=1 order by Stamp desc limit $limit";
	$query2 = "select ReplyStamp, NoteID, Reply from e2Comments where IsVisible=1 and IsReplyVisible=1 order by ReplyStamp desc limit $limit";
	$items = array();
	$noteids = array();
	$result = mysql_query($query1) or die('Query1 failed: '.mysql_error());
	while( $line = mysql_fetch_row($result) ) {
		$items[$line[0]] = array('noteid' => $line[1], 'author' => $line[2], 'text' => $line[3]);
		$noteids[] = $line[1];
	}
	mysql_free_result($result);
	$result = mysql_query($query2) or die('Query1 failed: '.mysql_error());
	while( $line = mysql_fetch_row($result) ) {
		$items[$line[0]] = array('noteid' => $line[1], 'author' => $blogauthor, 'text' => $line[2]);
		$noteids[] = $line[1];
	}
	mysql_free_result($result);
	$query3 = 'select ID, Title, Stamp from e2Notes where ID in ('.implode(',', $noteids).')';
	$result = mysql_query($query3);
	$tmpitems = $items;
	while( $line = mysql_fetch_row($result) ) {
		foreach( $tmpitems as $time => $item ) {
			if( $item['noteid'] == $line[0] ) {
				$item['notetitle'] = $line[1];
				$item['url'] = makeurl($line[2]);
				$items[$time] = $item;
			}
		}
	}
	mysql_free_result($result);
	krsort($items);
	mysql_close($db);
	print('<?xml version="1.0" encoding="utf-8"?><rss version="2.0"><channel><title>ШТОСМ — комментарии</title><link>https://shtosm.ru/</link><description></description><language>ru</language><generator>commentsrss.php</generator>');
	$tlimit = $limit;
	foreach( $items as $time => $item ) {
		$item['text'] = preg_replace('/\(\((http.[^ ]+)\s+(.+?)\)\)/', '<a href="\1">\2</a>', htmlspecialchars($item['text']));
		$item['text'] = str_replace("\n", '<br/>', $item['text']);
?><item><title><?=htmlspecialchars($item['author']).' к заметке «'.htmlspecialchars($item['notetitle']).'»' ?></title><link><?=htmlspecialchars($item['url']) ?></link><description><?=htmlspecialchars($item['text']) ?></description><pubDate><?=isodate($time) ?></pubDate></item><?
		if( --$tlimit == 0 ) break;
	}

	function makeurl( $stamp ) {
		return strftime('https://shtosm.ru/%Y/%m/%d/', $stamp);
	}

	function isodate( $stamp ) {
		return strftime('%a, %d %b %Y %H:%M:%S %z', $stamp);
	}
	print('</channel></rss>');
?>
