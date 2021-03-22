<?php
namespace Bricks\Cores;

class Meta 
{
    public $version;
    public $textdomain;
    public $slug;

    public function __construct() 
    {
        $this->version      = '1.0.0';
        $this->textdomain   = 'bricks-f';
        $this->slug         = 'bricks-f';
    }
}