<?php

var_dump($_GET);
var_dump($_POST);
var_dump($_REQUEST);
var_dump($_SERVER);

echo "Name: " . $_REQUEST['name'] . "<br>";
echo "Address: " . $_REQUEST['address'] . "<br>";
echo "Phone: " . $_REQUEST['phone'] . "<br>";
echo "Email: ". $_REQUEST['email'] . "<br>";

