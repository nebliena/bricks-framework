<?php
namespace Bricks\Languages;

class Strings
{
    private $string;

    public function __construct($interface, $key) 
    {
        $this->string = $this->getString($interface,$key);
    }

    private function getPubStrings()
    {
        $strings = array(
            'key' => 'value'
        );

        return $strings['key'];
    }

    private function getAdminStrings()
    {
        $strings = array(
            'key' => 'value'
        );

        return $strings['key'];
    }

    private function getString($interface, $key)
    {
        if($interface == 'admin') 
        {
            return $this->getAdminStrings($key);
        }

        return $this->getPubStrings($key);
    }
}