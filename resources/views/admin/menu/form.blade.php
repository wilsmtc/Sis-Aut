<div class="form-group">
    <label for="nombre" class="col-sm-3 control-label no-padding-right requerido">Nombre del Menú</label>
    <div class="col-lg-5">
    <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre', $data->nombre ?? '')}}" required placeholder="Nombre de Menú" onkeyup="NombreMayus()"/>
    </div>
</div>

<div class="form-group">
    <label for="url" class="col-sm-3 control-label no-padding-right requerido">Url del Menú</label>
    <div class="col-lg-5">
    <input type="text" name="url" id="url" class="form-control" value="{{old('url', $data->url ?? '')}}" required placeholder="Ruta"/>
    </div>
</div>

<div class="form-group">
    <label for="icono" class="col-lg-3 control-label">Icono</label>
    <div class="col-lg-5">
        <select name="icono" id="icono" class="form-control glyphicon">
            <option value="">Seleccione su Opción</option>
            <option value="fa-asterisk" {{old("icono",$data->icono?? "")=="fa-asterisk" ? "selected":""}}>&#x2a; asterisk</option>
            <option value="fa-certificate" {{old("icono",$data->icono?? "")=="fa-certificate" ? "selected":""}}>&#xe124; pulpo</option>
            <option value="fa-ok" {{old("icono",$data->icono?? "")=="fa-ok" ? "selected":""}}>&#xe013; ok</option>
            <option value="fa-plus" {{old("icono",$data->icono?? "")=="fa-plus" ? "selected":""}}>&#x2b; plus</option>
            <option value="fa-pencil" {{old("icono",$data->icono?? "")=="fa-pencil" ? "selected":""}}>&#x270f; pencil</option>
            <option value="fa-search" {{old("icono",$data->icono?? "")=="fa-search" ? "selected":""}}>&#xe003; search</option>
            
            <option value="fa-user" {{old("icono",$data->icono?? "")=="fa-user" ? "selected":""}}>&#xe008; user</option>
            <option value="fa-ban" {{old("icono",$data->icono?? "")=="fa-ban" ? "selected":""}}>&#xe090; stop</option>
            <option value="fa-bell" {{old("icono",$data->icono?? "")=="fa-bell" ? "selected":""}}>&#xe123; campana</option>
            <option value="fa-calendar" {{old("icono",$data->icono?? "")=="fa-calendar" ? "selected":""}}>&#xe109; calendario</option>
            <option value="fa-eye" {{old("icono",$data->icono?? "")=="fa-eye" ? "selected":""}}>&#xe105; ver</option>
            <option value="fa-folder" {{old("icono",$data->icono?? "")=="fa-folder" ? "selected":""}}>&#xe117; carpeta</option>
            <option value="fa-align-justify" {{old("icono",$data->icono?? "")=="fa-align-justify" ? "selected":""}}>&#xe055; lista</option>
            <option value="fa-list" {{old("icono",$data->icono?? "")=="fa-list" ? "selected":""}}>&#xe056; listas</option>
            <option value="fa-th" {{old("icono",$data->icono?? "")=="fa-th" ? "selected":""}}>&#xe011; list</option>
            <option value="fa-play-circle" {{old("icono",$data->icono?? "")=="fa-play-circle" ? "selected":""}}>&#xe029; play</option>
            <option value="fa-backward" {{old("icono",$data->icono?? "")=="fa-backward" ? "selected":""}}>&#xe071; retro</option>
            <option value="fa-forward" {{old("icono",$data->icono?? "")=="fa-forward" ? "selected":""}}>&#xe075; adelante</option>
            <option value="fa-tag" {{old("icono",$data->icono?? "")=="fa-tag" ? "selected":""}}>&#xe041; etiqueta</option>
            <option value="fa-tint" {{old("icono",$data->icono?? "")=="fa-tint" ? "selected":""}}>&#xe064; gota</option>
        </select>
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