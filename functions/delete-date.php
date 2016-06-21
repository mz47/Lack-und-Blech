<?php 
    session_start();
    include("../modules/mysql.php");
    $mysqli = new mysqli($HOST, $USERNAME, $PASSWORD, $DATABASE);
    $query = $mysqli->prepare("UPDATE dates SET statusid = 100 WHERE id = ?");
    $query->bind_param('i', $_GET['id']);
    $query->execute();

    header("Location: ../index.php?do=success&ref=delete-date");
?>