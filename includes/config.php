<?php
ob_start(); // Turns on output buffering. it waits till all php is loaded and then start to display. as before html css php is executed
session_start(); //means to check if user is loged in or not

date_default_timezone_set('Asia/Kolkata');

try {
    $con = new PDO("mysql:dbname=reeceflix;host=localhost", "root", "");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); //accesiong  static propery errmode on pdo object setting error
}
catch (PDOException $e) {
    exit("Connection failed: " . $e->getMessage());
}
?>