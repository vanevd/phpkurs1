<?php
namespace Core;

class App
{
    private $db;
    private $template;
    
    public function init()
    {
        $this->db = new \mysqli('127.0.0.1', 'root', '', 'test-php');

        $loader = new \Twig_Loader_Filesystem('./templates');
        $this->template = new \Twig_Environment($loader);
    }   
    
    public function getDb()
    {
        return $this->db;
    }
    
    public function getTemplate()
    {
        return $this->template;
    }        
    
}
