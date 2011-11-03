<?php

namespace themebrowser;

/**
 * Model for themes.
 */
class Theme extends \Model {
	var $table = 'themebrowser_theme';

	/**
	 * Get the most recently published posts.
	 */
	function latest ($limit = 10, $offset = 0) {
		return Theme::query ()->order ('ts desc')->fetch_orig ($limit, $offset);
	}
}

?>