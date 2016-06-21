<div id="modal-new-user" class="modal" role="dialog">
  <div class="modal-dialog">
    <form action="functions/new-user.php" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Neuer Nutzer</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control" id="name" name="name" placeholder="Firma" required>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="contact" name="contact" placeholder="Ansprechpartner" required>
          </div>
          <div class="form-group">
            <input type="email" class="form-control" id="email" name="email" placeholder="Email-Adresse" required>
          </div>
          <div class="form-group">
            <input type="email" class="form-control" id="email2" name="email2" placeholder="Email-Adresse wiederholen" required>
          </div>
          <div class="form-group">
            <div class="radio">
              <label><input type="radio" name="role" value="0" checked>Kunde</label>
            </div>
            <div class="radio">
              <label><input type="radio" name="role" value="1">Verwaltung</label>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Schließen</button>
            <button type="submit" class="btn btn-primary">Hinzufügen</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>