var f=new Date();
var a=f.getFullYear();
var m=f.getMonth()+1;
var d=f.getDate();
    m=(m<10)?"0"+m:m;
    d=(d<10)?"0"+d:d;
var fechaactual=a+"-"+m+"-"+d;
    $('#fecha_ini').flatpickr({
        dateFormat: "Y-m-d",
        minDate: fechaactual
    });
    $('#fecha_fin').flatpickr({
        dateFormat: "Y-m-d",
        minDate: fechaactual

    });
    $('#fecha_ini').change(function(){
        if ($('#fecha_ini').val()!="") {
            $('#fecha_fin').flatpickr({
                dateFormat: "Y-m-d",
                minDate: $('#fecha_ini').val(),
            });
        }   
    });
$('#btn_varios').click(function(){ //cuando damos click en boton editar
    $('#intervalo3').val("30");
    $('#hora_inicio3').val("08:00");
    $('#hora_fin3').val("22:00");
    $('#fecha_ini').val("");
    $('#fecha_fin').val("");
    $div_intervalo.style.display='none';
    $div_hora_inicio.style.display='none';
    $div_hora_fin.style.display='none';
    $div_fecha_ini.style.display='none';
    $div_fecha_fin.style.display='none';
    $('#agenda_varios').modal();//abre el modal con el id #agenda 
});

var $div_intervalo=document.getElementById("div_intervalo3");
var $div_hora_inicio=document.getElementById("div_hora_inicio3");
var $div_hora_fin=document.getElementById("div_hora_fin3");
var $btn_agendar=document.getElementById("btn_agendar3");
var $btn_editar=document.getElementById("btn_editar3");
var $btn_eliminar=document.getElementById("btn_eliminar3");
var $div_hora_fin2=document.getElementById("div_hora_fin3");
var $div_fecha_ini=document.getElementById("div_fecha_ini3");
var $div_fecha_fin=document.getElementById("div_fecha_fin3");
var hora_min="";
$('#btn_agendar3').click(function(){ //cuando damos click en boton crear
    if($('#intervalo3').val()==""||$('#hora_inicio3').val()==""||$('#hora_fin3').val()==""||$('#fecha_ini').val()==""||$('#fecha_fin').val()==""){
        SIS.notificaciones('Es necesario llenar todos los campos', 'Clinica Santa Teresa', 'error');
        if($('#intervalo3').val()==""){
            $('#intervalo3').focus();
            $div_intervalo.style.display='block';
        }
        else $div_intervalo.style.display='none';
        if($('#hora_inicio3').val()==""){
            $('#hora_inicio3').focus();
            $div_hora_inicio.style.display='block';
        }
        else $div_hora_inicio.style.display='none';        
        if($('#hora_fin3').val()==""){
            $('#hora_fin3').focus();
            $div_hora_fin.style.display='block';
        }
        else $div_hora_fin.style.display='none';
        if ($('#fecha_ini').val()=="") {           
            $div_fecha_ini.style.display='block';
        }
        else{
            $div_fecha_ini.style.display='none';
        } 
        if($('#fecha_fin').val()==""){           
            $div_fecha_fin.style.display='block';
        }
        else{
            $div_fecha_fin.style.display='none';
        }
    }
    else{
      $div_intervalo.style.display='none';
      $div_hora_inicio.style.display='none';
      $div_hora_fin.style.display='none';
      $div_fecha_ini.style.display='none';
      $div_fecha_fin.style.display='none';
      var $date_ini=fechaactual+" "+$('#hora_inicio3').val();
      var x=new Date($date_ini);
      var x_minutos=x.getMinutes();
      var x_horas=x.getHours();
      var $date_fin=fechaactual+" "+$('#hora_fin3').val();
      var y=new Date($date_fin);
      var y_minutos=y.getMinutes();
      var y_horas=y.getHours();
      if((x_minutos==0||x_minutos==30)&&(y_minutos==0||y_minutos==30)){
        if((x_horas>=7&&y_horas<=22)&&(x_horas<y_horas)){
            var data = {
                fecha_ini: $('#fecha_ini').val(),
                fecha_fin: $('#fecha_fin').val(),
                title: 'Día Hábil',
                color:"green",
                textColor:"white",
                hora_ini: fechaactual+" "+$('#hora_inicio3').val(),
                hora_fin: fechaactual+" "+$('#hora_fin3').val(),
                intervalo:$('#intervalo3').val(),
                _token: $('input[name=_token]').val()
            };
            ajaxRequest1('/admin/calendario/varios_guardar', data, 'POST');
        }
        else 
        if(x_horas>y_horas)
          SIS.notificaciones('La Hora de inicio debe de ser menor a la hora final', '', 'error');
        else
          SIS.notificaciones('La Hora de inicio debe de ser mayor a : 07:00 \n La Hora Final debe de ser menor a: 22:30', '', 'error');
      }
      else{
        SIS.notificaciones('Hora no valida', 'Clinica Santa Teresa', 'error');
        if(x_minutos!=0&&x_minutos!=30){
          $('#hora_inicio3').focus();
          $div_hora_inicio.style.display='block';
        }
        else $div_hora_inicio.style.display='none';  
        if(y_minutos!=0&&y_minutos!=30){
          $('#hora_fin3').focus();
          $div_hora_fin.style.display='block';
        }
        else $div_hora_fin.style.display='none';  
      } 
    }
    
  });
  function ajaxRequest1 (url, data, metodo) {
    $.ajax({
        url: url,
        type: metodo,
        data: data,
        success: function (respuesta) {
            if (respuesta.mensaje == "ok") {
              $('#agenda_varios').modal('toggle');//en modal se cerrara
              //calendar.refetchEvents();//recarga el calendario
              window.location.href="http://sis/admin/calendario";
              SIS.notificaciones('Día de atencion Habilitado', 'Clinica Santa Teresa', 'success');
                
            }
            else{
              $('#agenda_varios').modal('toggle');//en modal se cerrara
              SIS.notificaciones('No tienes permisos de creación', 'Clinica Santa Teresa', 'error');
            }
        } 
    });
  }

$('#btn_editar3').click(function(){ //cuando damos click en boton editar
    if($('#intervalo3').val()==""||$('#hora_inicio3').val()==""||$('#hora_fin3').val()==""||$('#fecha_ini').val()==""||$('#fecha_fin').val()==""){
        SIS.notificaciones('Es necesario llenar todos los campos', 'Clinica Santa Teresa', 'error');
        if($('#intervalo3').val()==""){
            $('#intervalo3').focus();
            $div_intervalo.style.display='block';
        }
        else $div_intervalo.style.display='none';
        if($('#hora_inicio3').val()==""){
            $('#hora_inicio3').focus();
            $div_hora_inicio.style.display='block';
        }
        else $div_hora_inicio.style.display='none';        
        if($('#hora_fin3').val()==""){
            $('#hora_fin3').focus();
            $div_hora_fin.style.display='block';
        }
        else $div_hora_fin.style.display='none';
        if ($('#fecha_ini').val()=="") {           
            $div_fecha_ini.style.display='block';
        }
        else{
            $div_fecha_ini.style.display='none';
        } 
        if($('#fecha_fin').val()==""){           
            $div_fecha_fin.style.display='block';
        }
        else{
            $div_fecha_fin.style.display='none';
        }
    }
    else{
      $div_intervalo.style.display='none';
      $div_hora_inicio.style.display='none';
      $div_hora_fin.style.display='none';
      $div_fecha_ini.style.display='none';
      $div_fecha_fin.style.display='none';
      var $date_ini=fechaactual+" "+$('#hora_inicio3').val();
      var x=new Date($date_ini);
      var x_minutos=x.getMinutes();
      var x_horas=x.getHours();
      var $date_fin=fechaactual+" "+$('#hora_fin3').val();
      var y=new Date($date_fin);
      var y_minutos=y.getMinutes();
      var y_horas=y.getHours();
      if((x_minutos==0||x_minutos==30)&&(y_minutos==0||y_minutos==30)){
        if((x_horas>=7&&y_horas<=22)&&(x_horas<y_horas)){
            var data = {
                fecha_ini: $('#fecha_ini').val(),
                fecha_fin: $('#fecha_fin').val(),
                title: 'Día Hábil',
                color:"green",
                textColor:"white",
                hora_ini: fechaactual+" "+$('#hora_inicio3').val(),
                hora_fin: fechaactual+" "+$('#hora_fin3').val(),
                intervalo:$('#intervalo3').val(),
                _token: $('input[name=_token]').val()
            };
            ajaxRequest2('/admin/calendario/varios_editar', data, 'PUT');
        }
        else 
        if(x_horas>y_horas)
          SIS.notificaciones('La Hora de inicio debe de ser menor a la hora final', '', 'error');
        else
          SIS.notificaciones('La Hora de inicio debe de ser mayor a : 07:00 \n La Hora Final debe de ser menor a: 22:30', '', 'error');
      }
      else{
        SIS.notificaciones('Hora no valida', 'Clinica Santa Teresa', 'error');
        if(x_minutos!=0&&x_minutos!=30){
          $('#hora_inicio3').focus();
          $div_hora_inicio.style.display='block';
        }
        else $div_hora_inicio.style.display='none';  
        if(y_minutos!=0&&y_minutos!=30){
          $('#hora_fin3').focus();
          $div_hora_fin.style.display='block';
        }
        else $div_hora_fin.style.display='none';  
      } 
    }
    
  });
  function ajaxRequest2 (url, data, metodo) {
    $.ajax({
        url: url,
        type: metodo,
        data: data,
        success: function (respuesta) {
            if (respuesta.mensaje == "ok") {
              $('#agenda_varios').modal('toggle');//en modal se cerrara
              //calendar.refetchEvents();//recarga el calendario
              window.location.href="http://sis/admin/calendario";
              SIS.notificaciones('Día de atencion Habilitado', 'Clinica Santa Teresa', 'success');
                
            }
            else{
              $('#agenda_varios').modal('toggle');//en modal se cerrara
              SIS.notificaciones('No tienes permisos de creación', 'Clinica Santa Teresa', 'error');
            }
        } 
    });
  }