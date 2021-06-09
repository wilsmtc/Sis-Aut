$(document).ready(function(){
    SIS.validacionGeneral('form-general'); //form general porq con ese id lo creamos al form   
});
var $div_internacion = document.getElementById("div_internacion")
$('#cama').change(function(){
    if ($('#cama').val()=="") {
        $div_internacion.style.display='none';
        $('#motivo_i').prop('required', false);
    } else {
        $div_internacion.style.display='block';
        $('#motivo_i').prop('required', true);
    }   
});

