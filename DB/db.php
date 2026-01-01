<?php
$host="localhost";
$user="root";
$pass="";
$dbname="WT-R";

$conn = new mysql($host,$User,$pass,$dbname);

if($conn->connect_error)
{
die("connect lost".$conn->connect_error);
}

