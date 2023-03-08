<?php
session_start();
$tmp = $_SESSION['CurrentPage'];
$tmp_previous = $_SESSION['Previous'];
$tmp_previous_link = $_SESSION['PreviousLink'];
$tmp_restaurant = $_SESSION["DatabaseName"];


$tmp_count = $_SESSION['count'];
$tmp_history = $_SESSION['history'];

session_destroy();
session_start();
$_SESSION['CurrentPage'] = $tmp;
$_SESSION['Previous'] = $tmp_previous;
$_SESSION["PreviousLink"] = $tmp_previous_link;
$_SESSION["DatabaseName"] = $tmp_restaurant;
$_SESSION['history'] = $tmp_history;

$_SESSION['count'] = $tmp_count;

header("Location: login.php");

exit();