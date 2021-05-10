document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'dayGrid','interaction','timeGrid', 'list' ],
      //defaultView:'timeGridDay'
      titleFormat: { // will produce something like "Tuesday, September 18, 2018"
        month: 'short',
      },
      header:{
        left:'prev,next,today',
        center:'title',
        right:'dayGridMonth,timeGridWeek,timeGridDay'
      },
      height: 400,
      width:200,
      dateClick:function(info){//cuando hacemos click en un dia del calendario (crear)
        limpiarFormulario();
        $('#fechaC').val(info.dateStr);//recupera la fecha donde se hizo click       
      },
    });
    calendar.setOption('locale','es')
    calendar.render();
     

    
  });

