<?php
use Bricks\Admins\Admin;
use Bricks\Cores\Activation;
use Bricks\Cores\Enqueuer;
use Bricks\Cores\Loader;
use Bricks\Cores\Meta;
use Bricks\Languages\Language;

class Bricks
{
    private $activation;
    private $deactivation;
    private $version;
    protected $loader;
    protected $meta;

    public function __construct() 
    {
        $action             = new Activation;
        $this->activation   = $action->activation();
        $this->activation   = $action->deactivation();
        $this->version      = '1.0.0';
        $this->loader       = new Loader;
        $this->meta         = new Meta;

        

        $this->setLanguage();
        $this->enqueueHooks();
    }

	private function setLanguage()
    {
		$i18n = new Language;
		$this->loader->addAction( 'plugins_loaded', $i18n, 'bricksTextdomain' );
	}

    private function enqueueHooks()
    {
        $enqueuer   = new Enqueuer;
        //var_dump($this->loader);die();

        $this->loader->addAction( 'wp_head', $enqueuer, 'enqueueStyles' );
		$this->loader->addAction( 'wp_head', $enqueuer, 'enqueueScripts' );
        $this->loader->addAction( 'admin_head', $enqueuer, 'enqueueStyles' );
		$this->loader->addAction( 'admin_head', $enqueuer, 'enqueueScripts' );
    }

    public function run() 
    {
        $this->loader->run();
    }
}