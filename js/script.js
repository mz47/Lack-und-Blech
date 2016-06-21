$(document).ready(function() {
  renderCalendar();

  function renderCalendar() {
    $('#calendar').fullCalendar({
      eventClick: function(calEvent, jsEvent, view) {
        if (calEvent.userid == $(".navbar-right #userid").text() || $(".navbar-right #userid").text() == 3) { //TODO
          $("#modal-date-details #id").text(calEvent.id);
          $("#modal-date-details #date").text(moment(calEvent.start).format("DD.MM.YYYY"));
          $("#modal-date-details #start").text(moment(calEvent.start).format("HH:mm"));
          $("#modal-date-details #end").text(moment(calEvent.end).format("HH:mm"));
          $("#modal-date-details #timestamp").text(moment(calEvent.timestamp).format("DD.MM.YYYY, HH:mm"));
          $("#modal-date-details #name").text(calEvent.name);
          $("#modal-date-details #contact").text(calEvent.contact);
          $("#modal-date-details #maker").text(calEvent.maker);
          $("#modal-date-details #model").text(calEvent.model);
          $("#modal-date-details #notes").text(calEvent.notes);
          $("#modal-date-details #id").val(calEvent.id);
          fillSelect(calEvent.statusid);
          $('#modal-date-details').modal('show');
        }
      },
      defaultView: 'agendaWeek',
      header: {
        left: 'prev,next today',
        center: '',
        right: ''
      },
      columnFormat: 'dddd, DD.MM.YY',
      selectable: true,
      select: function(start, end) {
        end = moment(start).add(2, 'h');
        $("#modal-new-date #startFormat").val(moment(start).format("DD.MM.YYYY, HH:mm"));
        $("#modal-new-date #endFormat").val(moment(end).format("DD.MM.YYYY, HH:mm"));
        $("#modal-new-date #start").val(moment(start).format("YYYY-MM-DD HH:mm:ss"));
        $("#modal-new-date #end").val(moment(end).format("YYYY-MM-DD HH:mm:ss"));
        $('#modal-new-date').modal('show');
        $('#calendar').fullCalendar('unselect');
      },
      allDaySlot: false,
      weekends: false,
      slotDuration: '00:30:00',
      minTime: '08:00:00',
      maxTime: '19:00:00',
      defaultDate: moment(),
      lang: 'de',
      buttonIcons: false,
      weekNumbers: true,
      height: "auto",
      editable: false,
      eventLimit: true,
      events: {
        url: 'modules/json-events.php'
      }
    });
  }

  function fillSelect(index) {
    var options = "";
    var selected = "";
    $("#status").html("");

    $.getJSON("modules/json-status.php", function(data) {
      for (var i = 0; i < data.length; i++) {
        if (data[i].id == index) {
          selected = "selected";
        }
        options += "<option value='" + data[i].id + "'" + selected + ">" + data[i].name + "</option>";
        selected = "";
      }
      $("#status").append(options);
    })
  }

  $("#modal-date-details button#delete").click(deleteDate);
  $("#modal-date-details button#cancel").click(cancelDate);
  $("button#delete-user").click(deleteUser);

  $('.fc-next-button').click(function() {
    //$('.fc-next-button').prop("disabled", true);
  });
  
  $('.fc-prev-button').click(function() {
    //$('.fc-next-button').prop("disabled", false);
  });
  
  $('.fc-today-button').click(function() {
    //$('.fc-next-button').prop("disabled", false);
  });
});

function deleteDate() {
  var id = document.getElementById("id").value;
  window.location.href = "functions/delete-date.php?id=" + id;
}

function cancelDate() {
  var id = document.getElementById("id").value;
  window.location.href = "functions/cancel-date.php?id=" + id;
}

function deleteUser() {
  var id = document.getElementById("user-id").value;
  alert("id: " + id);
  //window.location.href = "functions/delete-user.php?id=" + id;
}