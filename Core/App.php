<?php
namespace Core;

class App
{
    private $db;
    private $template;
    
    public function initDb($host, $user, $password, $db_name)
    {
        $this->db = new \mysqli($host, $user, $password, $db_name);
    }   
    
    public function initTemplate($dir)
    {
        $loader = new \Twig_Loader_Filesystem($dir);
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
