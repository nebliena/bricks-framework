<?php
/*
 * @package           Bricks Framework
 *
 * @wordpress-plugin
 * Plugin Name:       Bricks Framework
 * Plugin URI:        https://bricks.ayunaribowo.com/
 * Description:       Bricks Framework
 * Version:           1.0.0
 * Author:            Ayun Aribowo
 * Author URI:        https://ayunaribowo.com/
 * License:           GPL
 * Text Domain:       bricks-f
 * Domain Path:       /languages
 */

namespace Bricks;

if ( ! defined( 'ABSPATH' ) ) 
	return;

define( 'BRICKS_ROOT', plugin_dir_path( __FILE__ ) );

function initialize() {

    if ( is_admin() ) 
    {
        include_once 'lib/autoloader.php';
    }
}

initialize();