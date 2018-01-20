<?php
namespace Models;

class BaseModel
{
    protected $provider;
    
    public function setProvider($provider)
    {
        $this->provider = $provider;
    }

}

