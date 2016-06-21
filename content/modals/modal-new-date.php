<div id="modal-new-date" class="modal" role="dialog">
  <div class="modal-dialog">
    <form action="functions/new-date.php" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Neuer Termin</h4>
        </div>
        <div class="modal-body">
          <div class="panel panel-default">
            <div class="panel-heading">
              Termin
            </div>
            <div class="panel-body">
              <div class="form-group">
                <input type="text" class="form-control" id="startFormat" placeholder="Datum" disabled>
                <input type="hidden" id="start" name="start">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="endFormat" placeholder="Datum" disabled>
                <input type="hidden" id="end" name="end">
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              Fahrzeug
            </div>
            <div class="panel-body">
              <div class="form-group">
                <input type="text" class="form-control" id="maker" name="maker" placeholder="Hersteller" required>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="modell" name="model" placeholder="Modell" required>
              </div>
              <div class="form-group">
                <textarea class="form-control" rows="4" name="notes" placeholder="Bemerkung (optional)"></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Schließen</button>
          <button type="submit" class="btn btn-primary">Hinzufügen</button>
        </div>
      </div>
    </form>
  </div>
</div>