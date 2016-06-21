<div class="list-group">
<?php

$mysqli = new mysqli(mysql::$HOST, mysql::$USERNAME, mysql::$PASSWORD, mysql::$DATABASE);
$query = "SELECT dates.id, dates.start, dates.end, users.name, status.id, status.name "
  . "FROM dates LEFT JOIN users ON users.id = dates.userid "
  . "LEFT JOIN status ON status.id = dates.statusid "
  . "ORDER BY dates.id DESC";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($id, $start, $end, $user, $sid, $status);
$stmt->store_result();

if($stmt->num_rows == 0) {
  echo "<div class='alert alert-info' role='alert'>Nichts gefunden.</div>";
}
else {
  while($stmt->fetch()) {
    //echo "<a href='index.php?do=details&id=".$id."' class='list-group-item'>";
    echo "<div class='list-group-item list-group-item-".switchStyle($sid)."'>";
    echo date_format(new DateTime($start), 'd.m.Y, h:i');
    echo "-";
    echo date_format(new DateTime($end), 'h:i');
    echo " Uhr";
    echo " - " . $user;
    echo "<span class='pull-right'><b>".$status."</b></span>";
    echo "</div>";
    //echo "</a>"; 
  }
}

$stmt->close();
$mysqli->close();
?>
</div>