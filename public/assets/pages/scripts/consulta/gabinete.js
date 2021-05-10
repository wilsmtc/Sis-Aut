var $Guardar_G = document.getElementById("Guardar_G")
var $Actualizar_G = document.getElementById("Actualizar_G")
var $Imprimir_G = document.getElementById("Imprimir_G")
var $gabinete=""
$Guardar_G.addEventListener("click", (event)=>{
    var data = {
        
        consulta_id:$('#consulta_id').val(),
        estudio_g: $('#estudio_g').val(),
        indicacion_g: $('#indicacion_g').val(),
        _token: $('input[name=_token]').val()
    };

    ajaxRequest4('/admin/gabinete', data, 'POST');
})

function ajaxRequest4 (url, data, metodo) {
    $.ajax({
        url: url,
        type: metodo,
        data: data,
        success: function (respuesta) {
            if (respuesta.mensaje == "ok") {
                SIS.notificaciones('Estudio de Gabinete guardado correctamente', 'Clinica Santa Teresa', 'success');
                $gabinete= respuesta.gabinete; //tiene el id con el q se creo la gabinete
                $Actualizar_G.style.display='block';
                $Guardar_G.style.display='none';
                $Imprimir_G.style.display='block';
            } else {
                if(respuesta.mensaje == "actualizar"){
                    SIS.notificaciones('Estudio de Gabinete Actualizado correctamente', 'Clinica Santa Teresa', 'info');
                    $gabinete= respuesta.gabinete; //tiene el id con el q se creo la gabinete
                    $Actualizar_G.style.display='block';
                    $Guardar_G.style.display='none';
                    $Imprimir_G.style.display='block';
                }
                else{
                    SIS.notificaciones('Debe llenar el tipo de estudio', 'Clinica Santa Teresa', 'error');
                }
                
            }
        }

    });
}
$Actualizar_G.addEventListener("click", (event)=>{
    //console.log($consulta);
    var data = {
        gabinete_id:$gabinete,
        consulta_id:$('#consulta_id').val(),
        estudio_g: $('#estudio_g').val(),
        indicacion_g: $('#indicacion_g').val(),
        _token: $('input[name=_token]').val()
    };

    ajaxRequest4('/admin/gabinete/actualizar', data, 'put');
})

