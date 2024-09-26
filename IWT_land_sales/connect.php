<?php
$server = 'localhost';
$sUsername = 'root';
$sPassword = '';
$DBname = 'land_sale';

$connect = mysqli_connect($server, $sUsername, $sPassword, $DBname);

if ($connect == false) {
    die("Error: can not connect to database " . mysqli_connect_error());
}
?>