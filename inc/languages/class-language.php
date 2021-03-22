<?php
namespace Bricks\Languages;

class BricksI18n
{
	public function bricksTextdomain() {

		load_plugin_textdomain(
			'bricks-f',
			false,
			BRICKS_ROOT . '/languages/'
		);

	}
}