<?php
namespace Bricks\Languages;

class Language
{
	public function bricksTextdomain() {

		load_plugin_textdomain(
			'bricks-f',
			false,
			BRICKS_ROOT . '/languages/'
		);

	}
}