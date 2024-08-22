<?# рисуем ссылку на текущий месяц или год или всё #?>
<? if (_AT($content['hrefs']['everything'])): ?>
<p>Все заметки &rarr;</p>
<? elseif (array_key_exists ('year-months', $content)): ?>
<p><a href="<?=$content['hrefs']['everything'] ?>">Все заметки</a></p>
<? elseif (array_key_exists ('month-days', $content) && array_key_exists ('year', $content)): ?>
<p><a href="<?=$content['base-href'].$content['year'] ?>/">Всё за год</a></p>
<? elseif (array_key_exists ('notes', $content) && count($content['notes']) > 0): $note1 = reset($content['notes']); ?>
<p><a href="<?=$content['base-href']._DT('Y/m', $note1['time']) ?>/">Всё за месяц</a></p>
<? else: ?>
<p><a href="<?=$content['base-href'].date('Y/m') ?>/">Всё за месяц</a></p>
<? endif ?>
