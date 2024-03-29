<?php

// thumbs: 210x150
// screens: 1050x750

require_once ('apps/filemanager/lib/Functions.php');

$o = new StdClass;

$o->limit = 10;
$o->num = isset ($_GET['num']) ? $_GET['num'] : 0;
$o->offset = $o->num * $o->limit;

$t = new themebrowser\Theme;
$o->themes = $t->latest ($o->limit, $o->offset);

$o->count = $t->query ()->count ();
$o->last = $o->offset + count ($o->themes);
$o->more = ($o->count > $o->last) ? true : false;
$o->next = $o->num + 2;

if (count ($o->themes) == 0) {
	echo '<p>' . i18n_get ('No themes available') . '</p>';
}

$page->add_script ('<script src="/apps/filemanager/js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>');
$page->add_script ('<link rel="stylesheet" href="/apps/filemanager/js/fancybox/jquery.fancybox-1.3.4.css" />');

echo $tpl->render ('themebrowser/index', $o);

?>