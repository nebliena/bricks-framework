<?php
namespace Bricks\Cores;

use Bricks\Cores\Meta;

class Enqueuer 
{
    private $version;
    private $slug;

    public function __construct()
    {
        $meta           = new Meta;
        $this->version  = $meta->version;
        $this->slug     = $meta->slug;
    }

    public function enqueueStyles() 
    {
        wp_enqueue_style( 
            $this->slug, 
            BRICKS_CSS . 'bricks-f.css', 
            array(), 
            $this->version, 
            'all' );
    }

    public function enqueueScripts() 
    {
        wp_enqueue_script(
            $this->slug, 
            BRICKS_JS . 'bricks-f.js', 
            array(), 
            $this->version, 
            false );
    }
}