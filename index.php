<?php
session_start();
include("modules/mysql.php");
include("functions/color.php");

$include = "start.php";
if(isset($_GET['do'])) {
  switch($_GET['do']) {
    case "start": $include = "start.php";
      break;
    case "details": $include = "details.php";
      break;
		case "all-dates": $include = "all-dates.php";
      break;
		case "all-users": $include = "all-users.php";
      break;
    default: $include = "start.php";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8' />
	<title>Lack &amp; Blech - Verwaltung</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel='stylesheet' href='js/cupertino/jquery-ui.min.css' />
	<link href='css/fullcalendar.css' rel='stylesheet' />
	<link href='css/fullcalendar.print.css' rel='stylesheet' media='print' />
	<link href="css/style.css" rel="stylesheet">
	<script src='js/moment.min.js'></script>
	<script src='js/jquery.min.js'></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src='js/fullcalendar.min.js'></script>
	<script src='js/de.js'></script>
	<script src="js/script.js"></script>
</head>
<body>
	<?php
      if(isset($_SESSION['auth'])) {
        include("nav.php"); 
      }
  	?>
	<div class="container">
		<?php
      if(isset($_SESSION['auth'])) {
				if(isset($_GET['do']) && $_GET['do'] == "success") {
					echo "<div class='alert alert-success' role='alert'>";
					switch($_GET['ref']) {
						case "delete-user": echo "Nutzer wurde erfolgreich gelöscht."; break;
						case "delete-date": echo "Termin wurde erfolgreich gelöscht."; break;
						case "new-date": echo "Termin wurde erfolgreich gespeichert."; break;
						case "new-user": echo "Nutzer wurde erfolgreich gespeichert."; break;
						case "update-status": echo "Status wurde erfolgreich aktualisiert."; break;
						case "cancel-date": echo "Termin wurde erfolgreich gecancelt."; break;
					}
					echo "</div>";
				}
				
				if(isset($_GET['do']) && $_GET['do'] == "error") {
					echo "<div class='alert alert-danger' role='alert'>";
					switch($_GET['ref']) {
						case "delete-date": echo "Fehler beim Löschen des Termins."; break;
						case "delete-user": echo "Fehler beim Löschen des Nutzers."; break;
						case "new-date": echo "Fehler beim Speichern des Termins."; break;
						case "new-date-past": echo "Anlage von Terminen in der Vergangenheit ist nicht möglich."; break;
						case "new-user": echo "Fehler beim Speichern des Nutzers. Email-Adressen stimmen nicht überein."; break;
						case "update-status": echo "Fehler beim Aktualisieren des Status."; break;
					}
					echo "</div>";
				}
				
        include("content/" . $include); 
      }
    else {
      include("content/login.php"); 
    }
    ?>
	</div>
	<?php
		include("content/modals/modal-new-date.php");
		include("content/modals/modal-date-details.php");
		include("content/modals/modal-delete-date.php");
		include("content/modals/modal-new-user.php");
	?>
</body>
</html>