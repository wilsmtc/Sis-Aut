@php
    $aux = new \DateTime();
    $aux=$aux->format('Y-m-d');
@endphp
<input type="hidden" id="fecha" name="fecha" value="{{$aux}}">
<div class="col-xs-12 col-sm-6 center">
    <div class="form-group">
        <label class="col-sm-4 control-label no-padding-right requerido" for="form-field-1"> Nombre </label>
        <div class="col-sm-7">
            <input type="text" class="form-control" minlength="3" maxlength="50" placeholder="Ingrese Nombre"  id="nombre" name="nombre" value="{{old('nombre', $data->nombre ?? '')}}" required onkeyup="NombreMayus()"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label no-padding-right requerido" for="form-field-1"> Apellido </label>
        <div class="col-sm-7">
            <input type="text" class="form-control" minlength="2" maxlength="50" placeholder="Ingrese Apellido"  id="apellido" name="apellido" value="{{old('apellido', $data->apellido ?? '')}}" required onkeyup="ApellidoMayus()"/>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-4 control-label no-padding-right requerido" for="form-field-1">Fecha de Nacimiento</label>
        <div class="col-sm-7">
            <input type="date" min="1920-01-01" name="fecha_nac" id="fecha_nac" class="form-control" value="{{old('fecha_nac', $data->fecha_nac ?? '')}}" required placeholder="fecha de Nacimiento"/>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Dr. o lugar previo </label>
        <div class="col-sm-7">
            <input type="text" class="form-control" minlength="3" maxlength="50" placeholder="Dr o el lugar en el que fue atendido"  id="previo" name="previo" value="{{old('previo', $data->previo ?? '')}}" onkeyup="PrevioMayus()"/>
        </div>
    </div>
</div> 
<div class="col-xs-12 col-sm-6 center"> 
    <div class="">
        <div id="user-profile-2" class="user-profile">
        <div class="tabbable">
            <ul class="nav nav-tabs padding-18">
            <li class="active">
                <a data-toggle="tab" href="#curacion">
                <i class="red fa fa-plus-circle"></i>
                Curaciones
                </a>
            </li>

            <li>
                <a data-toggle="tab" href="#inyectable">
                <i class="blue ace-icon fa fa-info-circle bigger-120"></i>
                Inyectables
                </a>
            </li>

            <li>
                <a data-toggle="tab" href="#suero">
                <i class="green ace-icon fa fa-flask bigger-120"></i>
                Sueros
                </a>
            </li>
            </ul>

            <div class="tab-content no-border padding-24">
            <div id="curacion" class="tab-pane in active">
                <div class="col-lg-12 center">
                    <div class="col-sm-12">
                        <label class="blue"><b>Detalles</b></label> <br>
                        <div class="form-group center">
                            <textarea class="form-control" placeholder="Ingrese los indicacion " id="detalles_c" name="detalles_c" rows="4" maxlength="500">{{old('detalles_c', $data->detalles_c ?? '')}}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div id="inyectable" class="tab-pane">
                <div class="form-group">
                    <label for="atencion" class="col-lg-4 control-label">Tipo de Inyectable</label>
                    <div class="col-lg-6">
                        <select name="tipo_i" id="tipo_i" class="form-control">
                            <option value="">Seleccione su Opción</option>
                            <option value="intramuscular" {{old("tipo_i",$data->tipo_i?? "")=="intramuscular" ? "selected":""}}>Intramuscular</option>
                            <option value="intravenosa" {{old("tipo_i",$data->tipo_i?? "")=="intravenosa" ? "selected":""}}>Intravenosa</option>
                            <option value="intradermica" {{old("tipo_i",$data->tipo_i?? "")=="intradermica" ? "selected":""}}>Intradermica</option>
                            <option value="subcutanea" {{old("tipo_i",$data->tipo_i?? "")=="subcutanea" ? "selected":""}}>Sububcutaneanea</option>
                        </select>
                    </div>
                </div> 

                <div class="col-lg-12 center">
                    <div class="col-sm-12">
                        <label class="blue"><b>Medicamento</b></label> <br>
                        <div class="form-group center">
                            <textarea class="form-control" placeholder="Ingrese el medicamento " id="medicamento_i" name="medicamento_i" rows="4" maxlength="500">{{old('medicamento_i', $data->medicamento_i ?? '')}}</textarea>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 center">
                    <div class="col-sm-12">
                        <label class="blue"><b>Detalles</b></label> <br>
                        <div class="form-group center">
                            <textarea class="form-control" placeholder="Ingrese los detalles " id="detalles_i" name="detalles_i" rows="4" maxlength="500">{{old('detalles_c', $data->detalles_i ?? '')}}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div id="suero" class="tab-pane">
                <div class="form-group">
                    <label for="atencion" class="col-lg-4 control-label">Tipo de Suero</label>
                    <div class="col-lg-6">
                        <select name="tipo_s" id="tipo_s" class="form-control">
                            <option value="">Seleccione su Opción</option>
                            <option value="solucion salina normal" {{old("tipo_i",$data->tipo_s?? "")=="solucion salina normal" ? "selected":""}}>Solución Salina Normal</option>
                            <option value="solucion salina hipertonica" {{old("tipo_i",$data->tipo_s?? "")=="solucion salina hipertonica" ? "selected":""}}>Solución Salina Hipertónica</option>
                            <option value="solucion salina hipotonica" {{old("tipo_i",$data->tipo_s?? "")=="solucion salina hipotonica" ? "selected":""}}>Solución Salina Hipotónica</option>
                            <option value="solucion de ringer con lactato" {{old("tipo_i",$data->tipo_s?? "")=="solucion de ringer con lactato" ? "selected":""}}>Solución de Ringer con Lactato</option>
                            <option value="solucion de tipo plasmalyte" {{old("tipo_i",$data->tipo_s?? "")=="solucion de tipo plasmalyte" ? "selected":""}}>Solución de Tipo Plasmalyte</option>
                            <option value="solucion de dextrosa al 5%" {{old("tipo_i",$data->tipo_s?? "")=="solucion de dextrosa al 5%" ? "selected":""}}>Solución de Dextrosa al 5%</option>
                            <option value="suero glucosado hipertonico" {{old("tipo_i",$data->tipo_s?? "")=="suero glucosado hipertonico" ? "selected":""}}>Suero Glucosado Hipertonico</option>
                            <option value="suero glucosalino" {{old("tipo_i",$data->tipo_s?? "")=="suero glucosalino" ? "selected":""}}>Suero Glucosalino</option>
                            <option value="suero natural" {{old("tipo_i",$data->tipo_s?? "")=="suero natural" ? "selected":""}}>Suero Natural</option>
                            <option value="suero artificial" {{old("tipo_i",$data->tipo_s?? "")=="suero artificial" ? "selected":""}}>Suero Artificial</option>
                        </select>
                    </div>
                </div> 
                <div class="col-lg-12 center">
                    <div class="col-sm-12">
                        <label class="blue"><b>Detalles</b></label> <br>
                        <div class="form-group center">
                            <textarea class="form-control" placeholder="Ingrese los detalles " id="detalles_s" name="detalles_s" rows="4" maxlength="500">{{old('detalles_c', $data->detalles_i ?? '')}}</textarea>
                        </div>
                    </div>
                </div> 
            </div>
            </div>
        </div>
        </div>
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

    var previo = document.getElementById('aprevio');  //instanciamos el elemento input
        function PrevioMayus() {            //función que capitaliza la primera letra
        var palabra = apellido.value;                    //almacenamos el valor del input
        if(!apellido.value) return;                      //Si el valor es nulo o undefined salimos
        var mayuscula = palabra.substring(0,1).toUpperCase(); // almacenamos la mayuscula
        if (palabra.length > 0) {                     //si la palabra tiene más de una letra almacenamos las minúsculas
            var minuscula = palabra.substring(1);
        }
        apellido.value = mayuscula.concat(minuscula);    //escribimos la palabra con la primera letra mayuscula
    }

</script>