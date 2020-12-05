<div class="form-group">
    <label for="nombre" class="col-sm-3 control-label no-padding-right">Nombre del Rol</label>
    <div class="col-lg-5">
    <input type="text" name="rol" id="rol" class="form-control" value="{{old('rol', $data->rol ?? '')}}" required placeholder="Nombre de Rol" onkeyup="NombreMayus()"/>
    </div>
</div>

<div class="form-group" style="width:100%; height: 40px;">
    <label class="control-label col-xs-12 col-sm-3">Permisos</label>
    <div class="controls col-xs-12 col-sm-9">
        <div class="col-xs-2">
            <label>              
                <input name="añadir" id="añadir" class="ace ace-switch ace-switch-6" type="checkbox"
                @if (isset($data)&&$data->añadir == 1)
                        checked
                @endif
                > 
                <span class="lbl"></span>
            </label>
        </div>
        <div class="col-xs-2">
            <label>
                <input name="editar" id="editar" class="ace ace-switch ace-switch-6" type="checkbox"
                @if (isset($data)&&$data->editar == 1)
                        checked
                @endif
                > 
                <span class="lbl"></span>
            </label>
        </div>
        <div class="col-xs-2">
            <label>
                <input name="eliminar" id="eliminar" class="ace ace-switch ace-switch-6" type="checkbox"
                @if (isset($data)&&$data->eliminar == 1)
                        checked
                @endif
                > 
                <span class="lbl"></span>
            </label>
        </div>
    </div>
</div>
<div class="form-group" style="width:100%; height: 100px;">
    <div class="col-sm-9">
        <label class="col-sm-5 control-label no-padding-right">Crear</label>
        <label class="col-sm-2 control-label no-padding-right">editar</label>
        <label class="col-sm-2 control-label no-padding-right">Eliminar</label>
    </div>
</div>

<script>
    var nombre = document.getElementById('rol');  //instanciamos el elemento input
        function NombreMayus() {            //función que capitaliza la primera letra              
        var palabra = nombre.value;                    //almacenamos el valor del input 
        if(!nombre.value) return;                      //Si el valor es nulo o undefined salimos  
        var mayuscula = palabra.substring(0,1).toUpperCase(); // almacenamos la mayuscula  
        if (palabra.length > 0) {                     //si la palabra tiene más de una letra almacenamos las minúsculas
            var minuscula = palabra.substring(1).toLowerCase();
        }                                              
        nombre.value = mayuscula.concat(minuscula);    //escribimos la palabra con la primera letra mayuscula
    }
</script>