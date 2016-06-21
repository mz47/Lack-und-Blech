<?php
session_start();
include("../modules/mysql.php");
$mysqli = new mysqli(mysql::$HOST, mysql::$USERNAME, mysql::$PASSWORD, mysql::$DATABASE);
$query = $mysqli->prepare("DELETE FROM users WHERE id = ?");
$query->bind_param('i', $_POST['id']);
$results = $query->execute();

$query = $mysqli->prepare("DELETE FROM dates WHERE userid = ?");
$query->bind_param('i', $_GET['id']);
$results = $query->execute();

if($results) {
    header("Location: ../index.php?do=success&ref=delete-user");
}
else {
    header("Location: ../index.php?do=error&ref=delete-user");
}
?>