<div id="modal-delete-user" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body text-center">
        <h4>
          Ausgewählten Nutzer löschen?
        </h4>
      </div>
      <div class="modal-footer">
        <form action="delete-user.php" method="post">
          <input type="hidden" name="id" value="<?php if(isset($_GET['id'])) { echo $_GET['id']; } ?>" />
          <button type="submit" class="btn btn-default">Ja</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Nein</button>
        </form>
      </div>
    </div>
  </div>
</div>