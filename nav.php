<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav" aria-expanded="false">
          <span class="sr-only">Menu</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      <a class="navbar-brand" href="?do=start"><img src="images/slogan_lb.png" class="brand-logo"></a>
    </div>
    <div class="collapse navbar-collapse" id="#nav">
      <ul class="nav navbar-nav">
        <?php
          if(isset($_SESSION['role']) && $_SESSION['role'] == 1) {
            echo "<li><a href='index.php?do=all-dates'><i class='fa fa-calendar'></i> Übersicht</a></li>";
            echo "<li><a href='#' data-toggle='modal' data-target='#modal-new-user'><i class='fa fa-user-plus'></i> Nutzer hinzufügen</a></li>";
            echo "<li><a href='index.php?do=all-users'><i class='fa fa-user-times'></i> Nutzer entfernen</a></li>";
          }
        ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php
          if(isset($_SESSION['auth'])) {
            echo "<li class='navbar-text'><strong>" . $_SESSION['name'] . "</strong></li>";
            echo "<span class='navbar-text hidden' id='userid'>" . $_SESSION['id'] . "</span>";
            echo "<li><a href='functions/logout.php'><i class='fa fa-sign-out'></i> Abmelden</a></li>";
          }
        ?>
      </ul>
    </div>
  </div>
</nav>