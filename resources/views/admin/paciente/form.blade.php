<div class="col-xs-12 col-sm-4 center">
    <div>
        <span class="profile-picture">
            <label class="col-lg-5 control-label no-padding-right">Foto del paciente</label>
            <div class="col-lg-12">       
                <input type="file" name="foto_up" id="foto" data-initial-preview="{{isset($paciente->foto) ? Storage::url("datos/fotos/paciente/$paciente->foto") : "http://www.placehold.it/250x250/EFEFEF/AAAAAA&text=foto"}}" accept="image/*"/>
            </div>
        </span>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</div>
<div class="col-xs-12 col-sm-8">
    <div class="">
        <div class="profile-user-info profile-user-info-striped">

            <div class="profile-info-row">
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right requerido" for="form-field-1"> Nombre </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" minlength="2" maxlength="50" placeholder="Ingrese Nombre"  id="nombre" name="nombre" value="{{old('nombre', $paciente->nombre ?? '')}}" required onkeyup="NombreMayus()"/>
                    </div>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right requerido" for="form-field-1"> Apellido Paterno </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" minlength="3" maxlength="20" placeholder="Ingrese Apellido Paterno"  id="apellido_p" name="apellido_p" value="{{old('apellido_p', $paciente->apellido_p ?? '')}}" required onkeyup="Apellido_PMayus()"/>
                    </div>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Apellido Materno</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" minlength="3" maxlength="20" placeholder="Ingrese Apellido Materno"  id="apellido_m" name="apellido_m" value="{{old('apellido_m', $paciente->apellido_m ?? '')}}" onkeyup="Apellido_MMayus()"/>
                    </div>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right requerido" for="form-field-1">Número de Carnet</label>
                    <div class="col-sm-8">
                        <input type="text" name="ci" id="ci" class="form-control" value="{{old('ci', $paciente->ci ?? '')}}" minlength="7"  maxlength="12" placeholder="12345678" required/>
                    </div>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Dirección </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" minlength="4" maxlength="60" placeholder="Ingrese su Dirección"  id="direccion" name="direccion" value="{{old('direccion', $paciente->direccion ?? '')}}"/>
                    </div>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Telefono o Celular</label>
                    <div class="col-sm-8">
                        <input type="text" name="celular" id="celular" class="form-control" value="{{old('celular', $paciente->celular ?? '')}}" minlength="5" maxlength="12" placeholder="12345678"/>
                    </div>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right requerido" for="form-field-1">Fecha de Nacimiento</label>
                    <div class="col-sm-8">
                        <input type="date" min="1920-01-01" name="fecha_nac" id="fecha_nac" class="form-control" value="{{old('fecha_nac', $paciente->fecha_nac ?? '')}}" required placeholder="fecha de Nacimiento"/>
                    </div>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right requerido" for="form-field-1">Género</label>
                    <div class="col-sm-8">
                        <input type="radio" name="genero" id="genero" value="Hombre"{{old("genero",$paciente->genero?? "")=="Hombre" ? "checked":""}}/>
                        <label for="hombre">Hombre</label>
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="radio"  name="genero" id="genero" value="Mujer"{{old("genero",$paciente->genero?? "")=="Mujer" ? "checked":""}}/>
                        <label for="mujer">Mujer</label>
                    </div>
                </div>
            </div>
        </div><br>
    </div>
</div>
<script>
    var nombre = document.getElementById('nombre');  //instanciamos el elemento input
        function NombreMayus() {            //función que capitaliza la primera letra
        var palabra = nombre.value;                    //almacenamos el valor del input
        if(!nombre.value) return;                      //Si el valor es nulo o undefined salimos
        var mayuscula = palabra.substring(0,1).toUpperCase(); // almacenamos la mayuscula
        if (palabra.length > 0) {                     //si la palabra tiene más de una letra almacenamos las minúsculas
            //var minuscula = palabra.substring(1).toLowerCase(); // la funcion towerCase() convierte a minusculas
            var minuscula = palabra.substring(1);  
        }
        nombre.value = mayuscula.concat(minuscula);    //escribimos la palabra con la primera letra mayuscula
    }

    var apellido_p = document.getElementById('apellido_p');  //instanciamos el elemento input
        function Apellido_PMayus() {            //función que capitaliza la primera letra
        var palabra = apellido_p.value;                    //almacenamos el valor del input
        if(!apellido_p.value) return;                      //Si el valor es nulo o undefined salimos
        var mayuscula = palabra.substring(0,1).toUpperCase(); // almacenamos la mayuscula
        if (palabra.length > 0) {                     //si la palabra tiene más de una letra almacenamos las minúsculas
            //var minuscula = palabra.substring(1).toLowerCase(); // la funcion towerCase() convierte a minusculas
            var minuscula = palabra.substring(1);  
        }
        apellido_p.value = mayuscula.concat(minuscula);    //escribimos la palabra con la primera letra mayuscula
    }

    var apellido_m = document.getElementById('apellido_m');  //instanciamos el elemento input
        function Apellido_MMayus() {            //función que capitaliza la primera letra
        var palabra = apellido_m.value;                    //almacenamos el valor del input
        if(!apellido_m.value) return;                      //Si el valor es nulo o undefined salimos
        var mayuscula = palabra.substring(0,1).toUpperCase(); // almacenamos la mayuscula
        if (palabra.length > 0) {                     //si la palabra tiene más de una letra almacenamos las minúsculas
            //var minuscula = palabra.substring(1).toLowerCase(); // la funcion towerCase() convierte a minusculas
            var minuscula = palabra.substring(1);  
        }
        apellido_m.value = mayuscula.concat(minuscula);    //escribimos la palabra con la primera letra mayuscula
    }
</script>