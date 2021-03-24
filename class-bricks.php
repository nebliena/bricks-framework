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

//path
define('BRICKS_ROOT', plugin_dir_url( __FILE__ ));
define('BRICKS_ROOT_PATH', plugin_dir_path( __FILE__ ));

define('BRICKS_ASSETS', trailingslashit(BRICKS_ROOT . 'assets'));
define('BRICKS_ASSETS_PATH', trailingslashit(BRICKS_ROOT_PATH . 'assets'));

define('BRICKS_CSS', trailingslashit(BRICKS_ASSETS . 'dist/css'));
define('BRICKS_CSS_PATH', trailingslashit(BRICKS_ASSETS_PATH . 'dist/css'));

define('BRICKS_JS', trailingslashit(BRICKS_ASSETS . 'src'));
define('BRICKS_JS_PATH', trailingslashit(BRICKS_ASSETS_PATH . 'src'));

require_once(trailingslashit( dirname( __FILE__ )) . 'lib' . DIRECTORY_SEPARATOR . 'autoloader.php');

function initialize() {

    if ( is_admin() ) 
    {
        $bricks = new Bricks;

        register_activation_hook( __FILE__, array( $bricks, 'activate'));
        register_activation_hook( __FILE__, array( $bricks, 'deactivate'));
        $bricks->run();
    }
}

initialize();