<div class="panel-group" id="accordion" role="tablist">
<?php

$mysqli = new mysqli(mysql::$HOST, mysql::$USERNAME, mysql::$PASSWORD, mysql::$DATABASE);
$query = "SELECT id, name, contact, email FROM users";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($id, $name, $contact, $email);
$stmt->store_result();

if($stmt->num_rows == 0) {
  echo "<div class='alert alert-info' role='alert'>Nichts gefunden.</div>";
}
else {
  while($stmt->fetch()) {
?>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="heading-<?php echo $id; ?>">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php echo $id; ?>">
          <?php echo $name; ?>
        </a>
      </h4>
    </div>
    <div id="collapse-<?php echo $id; ?>" class="panel-collapse collapse" role="tabpanel">
      <div class="panel-body">
        <form method="post" action="functions/delete-user.php">
          <input type="hidden" name="id" id="user-id" value="<?php echo $id; ?>">
          <span id="user-contact"><?php echo $contact; ?></span><br>
          <span id="user-email"><?php echo $email; ?></span><br><br>
          <button type="submit" class="btn btn-danger">Nutzer entfernen</button>
        </form>
      </div>
    </div>
  </div>
<?php
  }
}
  $stmt->close();
  $mysqli->close();
?>  
</div>