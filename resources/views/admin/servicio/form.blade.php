<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right requerido" for="form-field-1"> Nombre del Servicio</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" minlength="3" maxlength="50" placeholder="Ingrese Nombre del Servicio"  id="nombre" name="nombre" value="{{old('nombre', $servicio->nombre ?? '')}}" required onkeyup="NombreMayus()" autocomplete="off"/>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Objetivo del Servicio</label>
    <div class="col-sm-6">
        <textarea class="form-control" placeholder="Objetivo" id="descripcion" name="descripcion" rows="3" maxlength="250">{{old('descripcion', $servicio->descripcion ?? '')}}</textarea>
    </div>
</div>

<div class="form-group">
    <label for="foto" class="col-lg-3 control-label">Foto</label>
    <div class="col-lg-4">
        <input type="file" name="foto_up" id="foto" data-initial-preview="{{isset($servicio->foto) ? Storage::url("datos/fotos/servicio/$servicio->foto") : "http://www.placehold.it/250x250/EFEFEF/AAAAAA&text=foto+de+usuario"}}" accept="image/*"/>
    </div>
</div>

<script>
    var nombre = document.getElementById('nombre');  //instanciamos el elemento input
        function NombreMayus() {            //función que capitaliza la primera letra
        var palabra = nombre.value;                    //almacenamos el valor del input
        if(!nombre.value) return;                      //Si el valor es nulo o undefined salimos
        var mayuscula = palabra.substring(0,1).toUpperCase(); // almacenamos la mayuscula
        if (palabra.length > 0) {                     //si la palabra tiene más de una letra almacenamos las minúsculas
            var minuscula = palabra.substring(1); 
        }
        nombre.value = mayuscula.concat(minuscula);    //escribimos la palabra con la primera letra mayuscula
    }
</script>