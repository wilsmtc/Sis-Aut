<input type="hidden" id="fecha_ingreso" name="fecha_ingreso" value={{$dato->fecha_ingreso}}>
<h4 class="blue"><i>Datos del Paciente</i></h4>
<table width="100%" class="table  table-bordered table-hover">
    <tr class="blue">
        <th class="center" width="30%">Paciente</th>
        <th class="center" width="15%">Edad</th>
        <th class="center" width="20%">Dirección</th>
        <th class="center" width="15%">Sangre</th>
        <th class="center" width="20%">Fecha de Ingreso</th>
    </tr>
    <tr class="center">
        <td>{{$dato->paciente->nombre}} {{$dato->paciente->apellido_p}} {{$dato->paciente->apellido_m}}</td>
        <td>{{$edad=MyHelper::Edad_Paciente($dato->paciente->fecha_nac,"index")}}</td>
        <td>{{$dato->paciente->direccion}}</td>
        <td>
            @if ($sangre==null)
                <span class="red">No registrado</span>
            @else
                {{$sangre}}
            @endif
        </td>
        <td>{{$dato->fecha_ingreso}}</td>
    </tr>
</table>
<h4 class="blue"><i>Datos del Alta</i></h4>
<div class="form-group">
	<label class="col-sm-2 control-label no-padding-right requerido" for="form-field-1">Fecha de salida</label>
	<div class="col-sm-3">
		<input type="date" min={{$dato->fecha_ingreso}} name="fecha_salida" id="fecha_salida" class="form-control" value="{{old('fecha_salida', $personal->fecha_ing ?? '')}}" required placeholder="Fecha de salida"/>		
	</div>
</div>
<table width="100%" class="table  table-bordered table-hover">
    <tr class="blue">
        <th class="center" width="50%">Diagnostico de Salida</th>
        <th class="center" width="50%">Tratamiento Realizado</th>
    </tr>
    <tr class="center">
        <td>
            <textarea class="form-control" placeholder="" id="diagnostico_salida" name="diagnostico_salida" rows="3" maxlength="500">{{old('diagnostico_salida', $dato->diagnostico_salida ?? 'S/P')}}</textarea>
        </td>
        <td>
            <textarea class="form-control" placeholder="" id="tratamiento_realizado" name="tratamiento_realizado" rows="3" maxlength="500">{{old('tratamiento_realizado', $dato->tratamiento_realizado ?? 'S/P')}}</textarea>
        </td>
    </tr>
</table>
<label for="foto" class="col-lg-3 control-label"> <span class="blue"><b>Fotos de hojas de Evolución</b> </span> </label>
<div class="form-group">
    <div class="col-lg-12">
        <input type="file" name='fotos[]' id="foto" data-initial-preview="{{isset($servicio->foto) ? Storage::url("datos/fotos/servicio/$servicio->foto") : "http://www.placehold.it/250x250/EFEFEF/AAAAAA&text=Hoja+de+evolucion"}}" accept="image/*" multiple/>
    </div>
</div>
<div class="form-group" style="width:100%; height: 40px;">
    <label class="control-label col-xs-12 col-sm-3">¿Retiro Forzado?</label>
    <div class="controls col-xs-12 col-sm-9">
        <div class="col-xs-2">
            <label>              
                <input name="forzado" id="forzado" class="ace ace-switch ace-switch-6" type="checkbox" value="1" onchange="javascript:showContent()">
                <span class="lbl"></span>
            </label>
        </div>
    </div>
</div>
<div id="div_forzado" style="display: none">
    <h4 class="blue"><i>Datos del Solicitante</i></h4>
    <div class="row">
        <div class="col-lg-7">
            <div class="form-group">
                <label class="col-sm-4 control-label no-padding-right requerido" for="form-field-1"> Nombres y apellidos</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" minlength="3" maxlength="80" placeholder="persona que solicita el retiro forzado"  id="nombre_resp" name="nombre_resp" autocomplete="off"/>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right requerido" for="form-field-1"> Nro de C.I.</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" minlength="7" maxlength="12" placeholder="Nro. de Carnet"  id="ci_resp" name="ci_resp" autocomplete="off"/>
                </div>
            </div>    
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Testigo</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" minlength="3" maxlength="80" placeholder="Nombres y Apellidos"  id="testigo" name="testigo" autocomplete="off"/>
        </div>
    </div>
</div>
