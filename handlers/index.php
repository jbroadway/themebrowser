<?php

// thumbs: 290x213
// screens: 1131x932

require_once ('apps/filemanager/lib/Functions.php');

$o = new StdClass;

$o->limit = 10;
$o->num = (count ($this->params) > 0 && is_numeric ($this->params[0])) ? $this->params[0] - 1 : 0;
$o->offset = $o->num * $o->limit;

$t = new themebrowser\Theme;
$o->themes = $t->latest ($o->limit, $o->offset);

$o->count = $t->query ()->count ();
$o->last = $o->offset + count ($o->themes);
$o->more = ($o->count > $o->last) ? true : false;
$o->next = $o->num + 2;

if (count ($o->themes) == 0) {
	echo '<p>' . i18n_get ('No themes available') . '</p>';
	return;
}

echo $tpl->render ('themebrowser/index', $o);

?>