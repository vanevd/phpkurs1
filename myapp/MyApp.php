<?php
require_once "MySum.php";
require_once "MyTest.php";
require_once "MyError.php";

class MyApp
{
    public function Run()
    {   
        $action = 'MySum';
        if (isset($_REQUEST['action'])) {
            $action = $_REQUEST['action'];
        }
        if ($action == 'MySum') {
            $mypage = new MySum;
        } elseif ($action == 'MyTest') {
            $mypage = new MyTest;
        } else {
            $mypage = new MyError;
        }
        $mypage->Run();

    }
}

