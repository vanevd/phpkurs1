<?php

class BasePage
{
    
    protected $template;
    protected $dir = 'templates';
    protected $twig;

    public function __construct($template)
    {
        $this->template = $template;
        $this->init();
    }

    public function init ()
    {
        $loader = new Twig_Loader_Filesystem('./'.$this->dir);

        $this->twig = new Twig_Environment($loader);
    }

    public function render($data)
    {
        echo $this->twig->render($this->template, $data);               
    }
}