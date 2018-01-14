<?php
require_once "BasePage.php";

class MyTest extends BasePage
{
    public function Run ()
    {
        $data = [];
        echo $this->render($data);               
    }
}