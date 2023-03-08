<?php

$sname= "localhost";
$unmae= "root";
$Passwordword = "";

$db_name = "turo";

$conn = mysqli_connect($sname, $unmae, $Passwordword, $db_name);

if (!$conn) {
	echo "Connection failed!";
}