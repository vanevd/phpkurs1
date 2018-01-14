<?php
require_once "BasePage.php";

class MyError extends BasePage
{
    public function Run ()
    {
        $data = [];
        echo $this->render($data);               
    }
}