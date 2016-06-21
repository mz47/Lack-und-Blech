<?php
    session_start();
    include("../modules/mysql.php");
    require_once("../modules/date.php");
    require_once("../modules/user.php");

    $d = new date($_POST['start'], $_POST['end'], $_SESSION['id'], $_POST['maker'], $_POST['model'], $_POST['notes']);

    $datetime = new DateTime($_POST['start']);
    $now = new DateTime("now");
    if($datetime < $now) {
        header("Location: ../index.php?do=error&ref=new-date-past");
    }
    else {
        /*$mysqli = new mysqli($HOST, $USERNAME, $PASSWORD, $DATABASE);
        $query = $mysqli->prepare("INSERT INTO dates (userid, start, end, maker, model, notes) VALUES(?, ?, ?, ?, ?, ?)");
        $query->bind_param('isssss', $_SESSION['id'], $_POST['start'], $_POST['end'], $_POST['maker'], $_POST['model'], $_POST['notes']);
        $results = $query->execute();
        $mysqli->close();*/
        mysql::addDate($d);
        $d->sendEmail_Added();
        header("Location: ../index.php?do=success&ref=new-date");
    }
?>