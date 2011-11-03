<?php

/**
 * Blog post add form.
 */

$page->layout = 'admin';

if (! User::require_admin ()) {
	$this->redirect ('/admin');
}

$f = new Form ('post', 'themebrowser/add');
$f->verify_csrf = false;
if ($f->submit ()) {
	$_POST['ts'] = gmdate ('Y-m-d H:i:s');
	$t = new themebrowser\Theme ($_POST);
	$t->put ();

	Versions::add ($t);

	if (! $t->error) {
		$this->add_notification (i18n_get ('Theme added.'));

		$this->redirect ($_GET['return']);
	}
	$page->title = 'An Error Occurred';
	echo 'Error Message: ' . $t->error;
} else {
	$t = new StdClass;

	$t->failed = $f->failed;
	$t = $f->merge_values ($t);
	$page->title = i18n_get ('Add Theme');
	echo $tpl->render ('themebrowser/add', $t);
}

?>