<?php
$username = "admin";
$password = 1;
$database = "database";

$con = new PDO("mysql:host=localhost;dbname=$database", $username, $password);
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>