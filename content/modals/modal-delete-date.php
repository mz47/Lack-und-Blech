<div id="modal-delete-date" class="modal" role="dialog">
  <div class="modal-dialog modal-margin ">
    <div class="modal-content">
      <div class="modal-body text-center">
        <h4>
          Ausgewählten Termin löschen?
        </h4>
      </div>
      <div class="modal-footer">
        <form action="functions/delete-date.php" method="post">
          <input type="hidden" name="id" value="<?php if(isset($_GET['id'])) { echo $_GET['id']; } ?>" />
          <button type="submit" class="btn btn-default">Ja</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Nein</button>
        </form>
      </div>
    </div>
  </div>
</div>