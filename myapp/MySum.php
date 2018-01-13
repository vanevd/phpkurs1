<?php

class MySum
{
    public function Run ()
    {
        $loader = new Twig_Loader_Filesystem('./templates');

        $twig = new Twig_Environment($loader);
        $data = [];
        $data['method'] = $_SERVER['REQUEST_METHOD'];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $sum = 0;
            if (isset($_REQUEST['field'])) {
                $field = $_REQUEST['field'];

                $fields = [];               
                $n = 1; 
                foreach ($field as $item) {
                    $sum += $item;
                    $fields[] = ['number' => $n, 'value' => $item];
                    $n++;
                }
                $data['fields'] = $fields;
            }
            $data['sum'] = $sum;

            $data['name'] = strlen($_REQUEST['name'])>0?$_REQUEST['name']:'n/a';
                
        }
        echo $twig->render('MySum.html', $data);               
    }
}