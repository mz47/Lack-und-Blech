<div id="modal-date-details" class="modal" role="dialog">
  <div class="modal-dialog">
    <form class="form-horizontal" action="functions/update-date.php" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Details</h4>
        </div>
        <div class="modal-body">
          
          <div class="panel panel-default">
            <div class="panel-heading">
              Termin
            </div>
            <div class="panel-body">
              <div class="col-sm-4">
                <span class="inline-label">Nummer</span>
              </div>
              <div class="col-sm-8">
                <span id="id"></span>
              </div>
              <div class="col-sm-4">
                <span class="inline-label">Datum</span>
              </div>
              <div class="col-sm-8">
                <span id="date"></span>
              </div>
              <div class="col-sm-4">
                <span class="inline-label">Zeitraum</span>
              </div>
              <div class="col-sm-8">
                <span id="start"></span> - <span id="end"></span>
              </div>
              <div class="col-sm-4">
                <span class="inline-label">Hinzugefügt</span>
              </div>
              <div class="col-sm-8">
                <span id="timestamp"></span>
              </div>
            </div>
          </div>
          
          <div class="panel panel-default">
            <div class="panel-heading">
              Kunde
            </div>
            <div class="panel-body">
              <div class="col-sm-4">
                <span class="inline-label">Name</span>
              </div>
              <div class="col-sm-8">
                <span id="name"></span>
              </div>
              <div class="col-sm-4">
                <span class="inline-label">Ansprechpartner</span>
              </div>
              <div class="col-sm-8">
                <span id="contact"></span>
              </div>
              <div class="col-sm-4">
                <span class="inline-label">Email</span>
              </div>
              <div class="col-sm-8">
                <span id="email"></span>
              </div>
            </div>
          </div>
          
          <div class="panel panel-default">
            <div class="panel-heading">
              Fahrzeug
            </div>
            <div class="panel-body">
              <div class="col-sm-4">
                <span class="inline-label">Hersteller</span>
              </div>
              <div class="col-sm-8">
                <span id="maker"></span>
              </div>
              <div class="col-sm-4">
                <span class="inline-label">Modell</span>
              </div>
              <div class="col-sm-8">
                <span id="model"></span>
              </div>
              <div class="col-sm-4">
                <span class="inline-label">Bemerkung</span>
              </div>
              <div class="col-sm-8">
                <span id="notes"></span>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="col-sm-4">
                <span class="inline-label">Status</span>
              </div>
              <div class="col-sm-8">
                <select class="form-control" <?php if($_SESSION['role'] != 1) { echo "disabled"; } ?> id="status" name="status"></select>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" id="id" name="id">
            <button type='button' id='cancel' class='btn btn-danger'>Canceln</button>
            <?php 
              if($_SESSION['role'] == 1) { 
                echo "<button type='submit' class='btn btn-primary'>Speichern</button>";
              } 
            ?>
          <button type="button" class="btn btn-default" data-dismiss="modal">Schließen</button>
        </div>
      </div>
    </form>
  </div>
</div>