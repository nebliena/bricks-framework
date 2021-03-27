<?php
namespace Bricks\Cores;

use Bricks\Cores\Block;
use Bricks\Cores\Meta;

class Enqueuer 
{
    private $version;
    private $slug;
    private $js_deps;

    public function __construct()
    {
        $meta           = new Meta;
        $this->version  = $meta->version;
        $this->slug     = $meta->slug;

        $block          = new Block;
        $this->js_deps  = $block->jsDependencies();

    }

    public function enqueueStyles() 
    {
        $handle     = $this->slug . '-style';
        $src        = BRICKS_CSS . 'bricks-f.css';
        $deps       = array();
        $version    = $this->version;

        wp_enqueue_style($handle, $deps, $version, 'all');
    }

    public function enqueueScripts() 
    {
        $handle     = $this->slug . '-script';
        $src        = BRICKS_JS . 'bricks-f.js';
        $deps       = $this->js_deps;
        $version    = $this->version;

        wp_enqueue_script($handle, $src, $deps, $version, false);
    }
}