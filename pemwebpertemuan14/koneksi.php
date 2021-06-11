<?php
$host       ="localhost";
$username   ="root";
$password   ="";
$db         ="kuliah";

$koneksi = mysqli_connect($host, $username, $password, $db);
if(!$koneksi){
    die("koneksi gagal".mysqli_connect_error());
}
