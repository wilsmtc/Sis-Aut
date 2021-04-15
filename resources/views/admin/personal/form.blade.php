<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right requerido" for="form-field-1"> Nombre </label>
    <div class="col-sm-6">
        <input type="text" class="form-control" minlength="4" maxlength="50" placeholder="Ingrese Nombre"  id="nombre" name="nombre" value="{{old('nombre', $personal->nombre ?? '')}}" required onkeyup="NombreMayus()"/>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right requerido" for="form-field-1"> Apellido </label>
    <div class="col-sm-6">
        <input type="text" class="form-control" minlength="3" maxlength="50" placeholder="Ingrese Apellido"  id="apellido" name="apellido" value="{{old('apellido', $personal->apellido ?? '')}}" required onkeyup="ApellidoMayus()"/>
    </div>
</div>
<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right requerido" for="form-field-1">Número de Carnet</label>
	<div class="col-sm-6">
		<input type="text" name="ci" id="ci" class="form-control" value="{{old('ci', $personal->ci ?? '')}}" required minlength="7"  placeholder="12345678"/>		
	</div>
</div>

<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Número de Celular</label>
	<div class="col-sm-6">
		<input type="text" name="celular" id="celular" class="form-control" value="{{old('celular', $personal->celular ?? '')}}" minlength="5" placeholder="12345678"/>		
	</div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Dirección </label>
    <div class="col-sm-6">
        <input type="text" class="form-control" minlength="4" maxlength="60" placeholder="Ingrese su Dirección"  id="direccion" name="direccion" value="{{old('nombre', $personal->direccion ?? '')}}"/>
    </div>
</div>
<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right requerido" for="form-field-1">Fecha de ingreso</label>
	<div class="col-sm-6">
		<input type="date" min="1960-01-01" name="fecha_ing" id="fecha_ing" class="form-control" value="{{old('fecha_ing', $personal->fecha_ing ?? '')}}" required placeholder="Fecha de Ingreso"/>		
	</div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right requerido" for="form-field-1">Cargo</label>
    <div class="col-lg-6">
        <select name="cargo_id" id="cargo_id" class="form-control" required >
            <option value="">Seleccione su Cargo</option>
            @foreach($cargo as $id => $nombre)
                <option
                value="{{$id}}"{{old("cargo_id",$personal->cargo->id ?? "")==$id ? "selected":""}}>{{$nombre}}
                </option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right requerido" for="form-field-1">Unidad a la que Pertenece</label>
    <div class="col-lg-6">
        <select name="unidad_id" id="unidad_id" class="form-control" required >
            <option value="">Seleccione la Unidad</option>
            @foreach($unidad as $id => $nombre)
                <option
                value="{{$id}}"{{old("unidad_id",$personal->unidad->id ?? "")==$id ? "selected":""}}>{{$nombre}}
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right requerido" for="form-field-1">Genero</label>
	<div class="col-sm-6">
		<input type="radio" name="genero" id="genero" value="Hombre"{{old("genero",$personal->genero?? "")=="Hombre" ? "checked":""}}/>			
		<label for="hombre">Hombre</label>
		&nbsp; &nbsp; &nbsp; &nbsp;
		<input type="radio"  name="genero" id="genero" value="Mujer"{{old("genero",$personal->genero?? "")=="Mujer" ? "checked":""}}/>
		<label for="mujer">Mujer</label>						
	</div>
</div>

<div class="col-lg-12">     
        <label class="col-lg-1 control-label no-padding-right">Foto</label>
        <div class="col-lg-4">       
            <input type="file" name="foto_up" id="foto" data-initial-preview="{{isset($personal->foto) ? Storage::url("datos/fotos/personal/$personal->foto") : "http://www.placehold.it/250x250/EFEFEF/AAAAAA&text=foto+de+usuario"}}" accept="image/*"/>
        </div>
        <label class="col-lg-1 control-label no-padding-right">Curriculum</label>
        <div class="col-lg-4">           
            <input type="file" name="documento_up" id="documento" data-initial-preview="{{isset($personal->curriculum) ? Storage::url("datos/documentos/personal/$personal->curriculum") : "http://www.placehold.it/250x250/EFEFEF/AAAAAA&text=documento+personal"}}" accept=".pdf"/>
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
</script>
<script>
    var apellido = document.getElementById('apellido');  //instanciamos el elemento input
        function ApellidoMayus() {            //función que capitaliza la primera letra
        var palabra = apellido.value;                    //almacenamos el valor del input
        if(!apellido.value) return;                      //Si el valor es nulo o undefined salimos
        var mayuscula = palabra.substring(0,1).toUpperCase(); // almacenamos la mayuscula
        if (palabra.length > 0) {                     //si la palabra tiene más de una letra almacenamos las minúsculas
            var minuscula = palabra.substring(1);
        }
        apellido.value = mayuscula.concat(minuscula);    //escribimos la palabra con la primera letra mayuscula
    }
</script>