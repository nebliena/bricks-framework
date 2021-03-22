<?php
use Bricks\Admins\Admin;
use Bricks\Cores\Activation;
use Bricks\Cores\Loader;
use Bricks\Cores\Meta;
use Bricks\Languages\BricksI18n;

class Bricks
{
    private $activation;
    private $deactivation;
    private $version;
    protected $enqueuer;
    protected $loader;
    protected $meta;

    public function __construct() 
    {
        $action             = new Activation;
        $this->activation   = $this->activation();
        $this->activation   = $this->deactivation();
        $this->version      = '1.0.0';
        $this->loader       = new Loader;
        $this->meta         = new Meta;
    }

	private function setLanguage() 
    {
		$i18n = new BricksI18n();
		$this->loader->addAction( 'plugins_loaded', $i18n, 'bricksTextdomain' );
	}

    private function enqueueHooks()
    {
        $enqueuer   = new Enqueuer;

        $this->loader->addAction( 'wp_enqueue_scripts', $this->enqueuer, 'enqueueStyles' );
		$this->loader->addAction( 'wp_enqueue_scripts', $this->enqueuer, 'enqueueScripts' );
    }
}