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
        //var_dump(BRICKS_CSS);die();
        wp_enqueue_style( 
            $this->slug . '-style', 
            BRICKS_CSS . 'bricks-f.css', 
            array(), 
            $this->version, 
            'all' 
        );
    }

    public function enqueueScripts() 
    {
        wp_enqueue_script(
            $this->slug . '-script', 
            BRICKS_JS . 'bricks.js', 
            array(), 
            $this->version, 
            false 
        );
    }
}