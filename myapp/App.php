<?php

class App
{
    private static $mysqli;

    public static function mysql_connect()
    {
        if (!isset(self::$mysqli)) {
            self::$mysqli = new mysqli('localhost', 'testphp', 'testphp', 'testphp');
        }
        return self::$mysqli;
    }
}