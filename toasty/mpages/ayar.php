<?php
date_default_timezone_set('Europe/Istanbul');
$baseurl = "http://localhost";
$panelAdi = "";

$dataHost = "localhost";
$dataName = "wsglobal";
$dataUser = "root";
$dataPassword = "";

try {
	$db = new PDO("mysql:host=$dataHost;dbname=$dataName;charset=utf8", "$dataUser", "$dataPassword");
} catch (PDOException $e) {
    print $e->getMessage();
}

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include "fonksiyon.php";
ob_start();
?>