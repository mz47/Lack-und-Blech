<?php
  if(isset($_POST['pin'])) {
    $md5pin = md5($_POST['pin']);
    include("../modules/mysql.php");

    $mysqli = new mysqli(mysql::$HOST, mysql::$USERNAME, mysql::$PASSWORD, mysql::$DATABASE);
    $query = "SELECT id, pin, name, role FROM users WHERE pin = ? LIMIT 1";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $md5pin);
    $stmt->execute();
    $stmt->bind_result($id, $pin, $name, $role);
    $stmt->store_result();
    $stmt->fetch();
    
    $count = $stmt->num_rows;
      
    $stmt->close();
    $mysqli->close();

    if($count > 0) {
      session_start();
      $_SESSION['auth'] = true;
      $_SESSION['id'] = $id;
      $_SESSION['name'] = $name;
      $_SESSION['role'] = $role;
      setcookie("role", md5($role));

      header("Location: ../index.php");
    }
    else {
      header("Location: ../index.php?do=login&msg=err");
    }
  }
  else {
    header("Location: ../index.php?do=login&msg=err");
  }

?>