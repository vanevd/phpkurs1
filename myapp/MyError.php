<?php

class MyError
{
    public function Run ()
    {
        $loader = new Twig_Loader_Filesystem('./templates');

        $twig = new Twig_Environment($loader);
        $data = [];
        echo $twig->render('MyError.html', $data);               
    }
}