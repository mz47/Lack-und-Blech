<?php
session_start();
include("mysql.php");
include("../functions/color.php");
header('Content-type: application/json');

$mysqli = new mysqli(mysql::$HOST, mysql::$USERNAME, mysql::$PASSWORD, mysql::$DATABASE);
$arr = array();

$query = "SELECT 
          dates.id, 
          dates.userid, 
          dates.start, 
          dates.end, 
          users.name, 
          users.contact, 
          dates.maker, 
          dates.model, 
          dates.notes, 
          dates.timestamp, 
          users.email, 
          dates.statusid,
          status.name 
          FROM dates 
          LEFT JOIN users 
          ON users.id = dates.userid 
          LEFT JOIN status ON status.id = dates.statusid 
          WHERE dates.statusid NOT IN(99, 100)";
$stmt = $mysqli->prepare($query);

$stmt->execute();
$stmt->bind_result($id, $userid, $start, $end, $name, $contact, $maker, $model, $notes, $timestamp, $email, $statusid, $status);
$stmt->store_result();

while($row = $stmt->fetch()) {
  if($_SESSION['id'] != $userid && $_SESSION['role'] != 1) {
    $name = "belegt";
  }
    else {
        $name = $name . "\n\n" . $status;
    }
  $arr[] = array(
            "id"=>$id, 
            "userid"=>$userid, 
            "title"=>$name,
            "start"=>$start, 
            "end"=>$end, 
            "name"=>$name, 
            "contact"=>$contact, 
            "maker"=>$maker, 
            "model"=>$model, 
            "notes"=>$notes, 
            "timestamp"=>$timestamp,
            "email"=>$email,
            "statusid"=>$statusid,
            "status"=>$status,
            "backgroundColor"=>switchColor($statusid)
          );
}

echo json_encode($arr, JSON_PRETTY_PRINT);

$stmt->close();
$mysqli->close();
?>