<?php
  header('Content-type: application/json');
  include("mysql.php");

  $mysqli = new mysqli(mysql::$HOST, mysql::$USERNAME, mysql::$PASSWORD, mysql::$DATABASE);
  $arr = array();
  $query = "SELECT id, name FROM status WHERE id NOT IN(99, 100)";
  $stmt = $mysqli->prepare($query);

  $stmt->execute();
  $stmt->bind_result($id, $name);
  $stmt->store_result();

  while($row = $stmt->fetch()) {
    $arr[] = array("id"=>$id, "name"=>$name);
  }

  $stmt->close();
  $mysqli->close();

  echo json_encode($arr, JSON_PRETTY_PRINT);
?>
