<?php 
    session_start();
    include("../modules/mysql.php");

    $mysqli = new mysqli(mysql::$HOST, mysql::$USERNAME, mysql::$PASSWORD, mysql::$DATABASE);

    $query = $mysqli->prepare("UPDATE dates SET statusid = 99 WHERE id = ?");
    $query->bind_param('i', $_GET['id']);
    $query->execute();

    $d = mysql::getDate($_GET['id']);
    if($d != null) {
        $d->sendEmail_Cancelled();
    }
    header("Location: ../index.php?do=success&ref=cancel-date");
?>