<div class="content">
  <div class="login">
    <img src="images/logo_lb.png" class="responsive-image login-logo">
    <?php
      if(isset($_GET['msg']) && $_GET['msg'] == "err") {
        echo "<div class='alert alert-danger' role='alert'>PIN nicht gefunden. Bitte wiederholen.</div>";
      }
    ?>
    <div class="panel panel-default">
      <div class="panel-body">
        <form action="functions/login.php" method="post" class="">
          <div class="form-group">
            <input type="text" class="form-control" id="pin" name="pin" placeholder="PIN" required>
          </div>
          <button type="submit" class="btn btn-default pull-right"><i class="fa fa-sign-in"></i> Anmelden</button>
        </form>
      </div>
    </div>
  </div>
</div>
