<?php 
session_start();
include("../modules/mysql.php");
require_once("../modules/date.php");

$mysqli = new mysqli(mysql::$HOST, mysql::$USERNAME, mysql::$PASSWORD, mysql::$DATABASE);
$query = $mysqli->prepare("UPDATE dates SET statusid = ? WHERE id = ?");
$query->bind_param('ii', $_POST['status'], $_POST['id']);
$query->execute();

$d = mysql::getDate($_POST['id']);
$d->sendEmail_Status();

header("Location: ../index.php?do=success&ref=update-status");
?>