<?php
use Bricks\Admins\Admin;
use Bricks\Cores\Activation;
use Bricks\Cores\Block;
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
        $block      = new Block;


        $this->loader->addFilter('block_categories', $block, 'blockCategories');

        //$this->loader->addAction( 'enqueue_block_assets', $enqueuer, 'enqueueStyles' );
		$this->loader->addAction( 'enqueue_block_assets', $enqueuer, 'enqueueScripts' );
    }

    public function run() 
    {
        $this->loader->run();
    }
}