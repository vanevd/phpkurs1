<?php
namespace Models;

class BaseModel
{
    protected $app;
    
    public function __construct($app)
    {        
        $this->app = $app;
    }    
    
    public function getDb()
    {
        return $this->app->getDb();
    } 
    
}