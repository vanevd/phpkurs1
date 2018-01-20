<?php
namespace Providers;

class BaseProvider
{
    protected $mysqli;
    
    public function __construct($mysqli)
    {
        $this->mysqli = $mysqli;
    }

}

