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

if (! defined( 'ABSPATH' )) 
{
	exit;
}

define('BRICKS_ROOT', plugin_dir_path( __FILE__ ));
define('BRICKS_ASSETS', BRICKS_ROOT . 'assets');
define('BRICKS_CSS', BRICKS_ASSETS . 'css');
define('BRICKS_JS', BRICKS_ASSETS . 'js');

require_once(trailingslashit( dirname( __FILE__ )) . 'lib/autoloader.php');

function initialize() {

    if ( is_admin() ) 
    {
        $bricks = new Bricks();

        register_activation_hook( __FILE__, array( $bricks, 'activate'));
        register_activation_hook( __FILE__, array( $bricks, 'deactivate'));
    }
}

initialize();