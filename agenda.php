<?php include_once 'header.php'; ?>

<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='fullcalendar/fullcalendar.min.css' rel='stylesheet' />
<link href='fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='fullcalendar/lib/moment.min.js'></script>
<script src='fullcalendar/fullcalendar.min.js'></script>
<script src='fullcalendar/locale/pt-br.js'></script>
<script>

  $(document).ready(function() {

    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
      },
      locale: 'pt-br',
      dayClick: function(date, jsEvent, view) {

        console.log(date.format());
        $.ajax({
          url: 'admin/engine/getAllAgenda.php',
          type: 'GET',
          dataType: 'json',
          data: {data: date.format()  },
          success: function(res){
            // console.log(res);
            $(".agendas").html('');
            if (res.length > 0) {
              for (var i = 0; i <= res.length; i++) {
                // console.log(res[i].titulo);
                // console.log(res[i].data);
                $(".agendas").append(''+
                '<div class="panel panel-primary">'+
                '  <div class="panel-heading" style="padding: 10px;">'+
                '    <small>Data: '+res[i].data+'</small>'+
                '  </div>'+
                '  <div class="panel-body" style="padding: 10px;">'+
                '    <h3 style="margin:0;">'+res[i].titulo+'</h3>'+
                '  </div>'+
                '</div>');
              }
            }else{
              $(".agendas").html('<div class="alert alert-danger">Nada foi encontrado!</div>');
            }

          },
          error: function(err){
            console.log(err)
          }
        });
        

        // alert('Clicked on: ' + date.format());

        // alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);

        // alert('Current view: ' + view.name);

        // change the day's background color just for fun
        // $(this).css('background-color', 'red');

      },
      editable: false,
      navLinks: true, // can click day/week names to navigate views
      eventLimit: true, // allow "more" link when too many events
      events: {
        url: 'admin/engine/getAllAgenda.php',
        error: function() {
          // $('#script-warning').show();
        }
      },
      loading: function(bool) {
        $('#loading').toggle(bool);
      }
    });

  });

</script>
<style>
.fc-bg tr {
    cursor: pointer;
}
  #script-warning {
    display: none;
    background: #eee;
    border-bottom: 1px solid #ddd;
    padding: 0 10px;
    line-height: 40px;
    text-align: center;
    font-weight: bold;
    font-size: 12px;
    color: red;
  }

  #loading {
    display: none;
    position: absolute;
    top: 10px;
    right: 10px;
  }

  #calendar {
    max-width: 900px;
    margin: 40px auto;
    padding: 0 10px;
  }

</style>
</head>
<body>

  <div id='loading'>Carregando...</div>
  <div class="container">
    
    <div class="row">
      
      <div class="col-xs-12 col-md-9 form-group">
      
        <div id='calendar'></div>  

      </div>
      <div class="col-xs-12 col-md-3 form-group">
        <div><h1>Agenda</h1><hr></div>

        <div class="agendas">


        </div>

      </div>

    </div>

  </div>
  

</body>
</html>


<?php include_once 'footer.php'; ?>