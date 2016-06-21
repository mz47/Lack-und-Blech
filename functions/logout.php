<?php
  session_start();
  session_unset("auth");
  session_unset("id");
  session_unset("name");
  session_unset("role");
  header("Location: ../index.php");
?>