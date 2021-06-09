<input type="hidden" name="consulta_id" id="consulta_id" value={{$consulta->id}}>
<input type="hidden" name="paciente_id" id="paciente_id" value={{$ficha->paciente->id}}>
<input type="hidden" name="fecha_ingreso" id="fecha_ingreso" value={{$ficha->fecha}}>
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
        <td>{{$ficha->paciente->nombre}} {{$ficha->paciente->apellido_p}} {{$ficha->paciente->apellido_m}}</td>
        <td>{{$edad=MyHelper::Edad_Paciente($ficha->paciente->fecha_nac,"index")}}</td>
        <td>{{$ficha->paciente->direccion}}</td>
        <td>
            @if ($sangre==null)
                <span class="red">No registrado</span>
            @else
                {{$sangre}}
            @endif
        </td>
        <td>{{$ficha->fecha}}</td>
    </tr>
</table>
<h4 class="blue"><i>Signos Vitales del Paciente</i> </h4>
<table width="100%" border="1" class="table  table-bordered table-hover">
    <tr class="blue">
        <th style="text-align: center; width: 14%"><i class="glyphicon glyphicon-arrow-up" style="color: darkviolet"></i> Altura</th>
                        <th style="text-align: center; width: 14%"><i class="fa fa-tachometer" style="color: rgb(100, 149, 237)"></i> Peso</th>
                        {{-- <th style="text-align: center; width: 10%"><i class="glyphicon glyphicon-piggy-bank" style="color: rgb(60, 196, 89)"></i> IMC</th> --}}
                        <th style="text-align: center; width: 16%"><i class="glyphicon glyphicon-fire" style="color: rgb(240, 161, 15)"></i> Temperatura</th>
                        <th style="text-align: center; width: 18%"><i class="glyphicon glyphicon-time blue"></i> Presión Arterial</th>
                        <th style="text-align: center; width: 14%"><i class="glyphicon glyphicon-heart-empty" style="color: red"></i> Fr. Cardiaca</th>
                        <th style="text-align: center; width: 14%"><i class="glyphicon glyphicon-flash" style="color: saddlebrown"></i>  Fr. Respiratoria</th>
    </tr>
    <tr class="center">
        <tr>
            <td style="text-align: center;"><i>
              @if ($SVM->altura==null)
                  <span class="red">Sin Reg.</span>
              @else
                  {{$SVM->altura}} cm
              @endif         
            </i></td>
            <td style="text-align: center;"><i>
              @if ($SVM->peso==null)
                  <span class="red">Sin Reg.</span>
              @else
                  {{$SVM->peso}} kg
              @endif                          
            </i></td>
            {{-- <td style="text-align: center;"><i>0.0 mb</i></td> --}}
            <td style="text-align: center;"><i>
              @if ($SVM->temperatura==null)
                  <span class="red">Sin Reg.</span>
              @else
                  {{$SVM->temperatura}} °C
              @endif                          
            </i></td>
            <td style="text-align: center;"><i>
              @if ($SVM->p_a==null)
                  <span class="red">Sin Reg.</span>
              @else
                  {{$SVM->p_a}} mmHg
              @endif                        
            </i></td>
            <td style="text-align: center;"><i>
              @if ($SVM->f_c==null)
                  <span class="red">Sin Reg.</span>
              @else
                  {{$SVM->f_c}} lat/min
              @endif  
            </i></td>
            <td style="text-align: center;"><i>
              @if ($SVM->f_r==null)
                  <span class="red">Sin Reg.</span>
              @else
                  {{$SVM->f_r}} r/min
              @endif                       
            </i></td>
    </tr>
</table>
<h4 class="blue"><i>Datos de la consulta</i> </h4>
<table width="100%" class="table  table-bordered table-hover">
    <tr class="blue">
        <th class="center" width="35%">Motivo</th>
        <th class="center" width="30%">Sintomas</th>
        <th class="center" width="35%">Diagnostico</th>
    </tr>
    <tr class="center">
        <td>{{$consulta->motivo}}</td>
        <td>{{$consulta->sintoma}}</td>
        <td>{{$consulta->diagnostico}}</td>
    </tr>
</table>
<div class="row">
    <div class="col-lg-4">
        <div class="form-group">
            <label class="col-sm-5 control-label no-padding-right requerido" for="form-field-1">Nro. de Cama</label>
            <div class="col-lg-7">
                <select name="cama" id="cama" class="form-control" required >
                    <option value="">Seleccione una Opción</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    {{-- @foreach($cargo as $id => $nombre)
                        <option
                        value="{{$id}}"{{old("cama",$personal->cargo->id ?? "")==$id ? "selected":""}}>{{$nombre}}
                        </option>
                    @endforeach --}}
                </select>
            </div>
            
        </div>    
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label class="col-sm-6 control-label no-padding-right" for="form-field-1">Contacto de Emergencia</label>
            <div class="col-lg-6">
                <input type="text" class="form-control" name="contacto_emergencia" id="contacto_emergencia" placeholder="Cel/Telf" value="{{old('contacto_emergencia', $dato->contacto_emergencia ?? '')}}">
            </div>
        </div>
    </div>
</div>
<div id="div_internacion" style="display: none">
    <h4 class="blue"><i>Datos de la Internación</i> </h4>
    <table width="100%" class="table  table-bordered table-hover">
        <tr class="blue">
            <th class="center" width="50%">Motivo de Internación</th>
            <th class="center" width="50%">Ex.Físico General (Conciencia, Psiquismo, Estado nutricional)</th>
        </tr>
        <tr class="center">
            <td>
                <textarea class="form-control" placeholder="" id="motivo_i" name="motivo_i" rows="3" maxlength="500">{{old('motivo_i', $dato->motivo_i ?? 'S/P')}}</textarea>
            </td>
            <td>
                <textarea class="form-control" placeholder="" id="e_fisico" name="e_fisico" rows="3" maxlength="500">{{old('e_fisico', $dato->e_fisico ?? 'S/P')}}</textarea>
            </td>
        </tr>
        <tr class="blue">
            <th class="center" width="50%">Ex.Físico Regional Craneo y cara (ojos, oidos nariz boca y faringe)</th>
            <th class="center" width="50%">Cuello y Tiroides</th>
        </tr>
        <tr class="center">
            <td>
                <textarea class="form-control" placeholder="" id="craneo_cara" name="craneo_cara" rows="3" maxlength="500">{{old('craneo_cara', $dato->craneo_cara ?? 'S/P')}}</textarea>
            </td>
            <td>
                <textarea class="form-control" placeholder="" id="cuello_tiroides" name="cuello_tiroides" rows="3" maxlength="500">{{old('cuello_tiroides', $dato->cuello_tiroides ?? 'S/P')}}</textarea>
            </td>
        </tr>
        <tr class="blue">
            <th class="center" width="50%">Torax, Cardio pulmonar, Abdomen</th>
            <th class="center" width="50%">Genitales, Urinario, Rectal</th>
        </tr>
        <tr class="center">
            <td>
                <textarea class="form-control" placeholder="" id="torax" name="torax" rows="3" maxlength="500">{{old('torax', $dato->torax ?? 'S/P')}}</textarea>
            </td>
            <td>
                <textarea class="form-control" placeholder="" id="genitales" name="genitales" rows="3" maxlength="500">{{old('genitales', $dato->genitales ?? 'S/P')}}</textarea>
            </td>
        </tr>
        <tr class="blue">
            <th class="center" width="50%">Columna Vertebral y Extremidades</th>
            <th class="center" width="50%">Ex. Neurológico</th>
        </tr>
        <tr class="center">
            <td>
                <textarea class="form-control" placeholder="" id="columna" name="columna" rows="3" maxlength="500">{{old('columna', $dato->columna ?? 'S/P')}}</textarea>
            </td>
            <td>
                <textarea class="form-control" placeholder="" id="e_neurologico" name="e_neurologico" rows="3" maxlength="500">{{old('e_neurologico', $dato->e_neurologico ?? 'S/P')}}</textarea>
            </td>
        </tr>
        <tr class="blue">
            <th class="center" width="50%">Impresión diagnostica</th>
            <th class="center" width="50%">Conducta</th>
        </tr>
        <tr class="center">
            <td>
                <textarea class="form-control" placeholder="" id="impresion_d" name="impresion_d" rows="3" maxlength="500">{{old('impresion_d', $dato->impresion_d ?? "1.-\n2.-\n3.-")}}</textarea>
            </td>
            <td>
                <textarea class="form-control" placeholder="" id="conducta" name="conducta" rows="3" maxlength="500">{{old('conducta', $dato->conducta ?? 'S/P')}}</textarea>
            </td>
        </tr>
    </table>
</div>