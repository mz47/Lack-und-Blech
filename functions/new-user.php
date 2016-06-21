<?php
    session_start();
    include("../modules/mysql.php");
    $id = $_SESSION['id'];

    if($_POST['email'] == $_POST['email2']) {
        $pin = substr(md5(uniqid()), 0, 8);
        $md5pin = md5($pin);

        $mysqli = new mysqli(mysql::$HOST, mysql::$USERNAME, mysql::$PASSWORD, mysql::$DATABASE);
        $query = $mysqli->prepare("INSERT INTO users (pin, name, contact, email, role) VALUES(?, ?, ?, ?, ?)");
        $query->bind_param('ssssi', $md5pin, $_POST['name'], $_POST['contact'], $_POST['email'], $_POST['role']);
        $results = $query->execute();
        $mysqli->close();

        $to = "mpnw47@gmail.com";
        $subject = "Verwaltung - Nutzer angelegt";
        $message = "Der Nutzer ".$_POST['name']." wurde erfolgreich angelegt.\r\n\r\nDie PIN lautet: ".$pin."\r\n\r\nDiese bitte gut aufbewahren.";
        $headers = "From: Lack&Blech <info@lackundblech.de>";
        mail($to, $subject, $message, $headers);

        header("Location: ../index.php?do=success&ref=new-user");
    }
    else {
        header("Location: ../index.php?do=error&ref=new-user");
    }
?>