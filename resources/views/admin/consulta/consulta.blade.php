    @csrf
    <input type="hidden" id="ficha_id" value={{$ficha->id}}>
    <input type="hidden" id="paciente_id" value={{$paciente->id}}>
    <input type="hidden" id="consulta_id" value={{$consulta->id}}>
    <input type="hidden" id="signos_vitales_id" value={{$signos_vitales->id}}>
    <div class="col-xs-12 col-sm-5">
        <span class="center blue">Signos Vitales</span>
        <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> <span class="blue">Altura</span></label>
            <div class="col-sm-3">
                <span class="input-icon">
                <input type="number" class="form-control input-sm" id="altura" name="altura" min="30" max="250" value="{{old('altura', $signos_vitales->altura ?? '')}}" placeholder="150"/>
                <i class="ace-icon glyphicon glyphicon-arrow-up" style="color: darkviolet"></i>
                </span>
            </div>
            <span class="" >cm</span>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> <span class="blue">Peso</span></label>
            <div class="col-sm-3">
                <span class="input-icon">
                <input type="number" class="form-control input-sm" id="peso" name="peso" min="1" max="300" value="{{old('peso', $signos_vitales->peso ?? '')}}" placeholder="60"/>
                <i class="ace-icon fa fa-tachometer" style="color: rgb(100, 149, 237)"></i>
                </span>
            </div>
            <span class="" >Kg</span>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> <span class="blue">Temp.</span></label>
            <div class="col-sm-3">
                <span class="input-icon">
                <input type="number" class="form-control input-sm" id="temperatura" name="temperatura" min="20" max="50" value="{{old('temperatura', $signos_vitales->temperatura ?? '')}}" placeholder="36"/>
                <i class="ace-icon glyphicon glyphicon-fire" style="color: rgb(240, 161, 15)"></i>
                </span>
            </div>
            <span class="" >°C</span>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> <span class="blue">P.A.</span></label>
            <div class="col-sm-3">
                <span class="input-icon">
                <input type="text" class="form-control input-sm" id="p_a" name="p_a" value="{{old('P_A', $signos_vitales->p_a ?? '')}}" placeholder="120/80"/>
                <i class="ace-icon glyphicon glyphicon-time blue"></i>
                </span>
            </div>
            <span class="" >mmHg</span>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> <span class="blue">F.C.</span></label>
            <div class="col-sm-3">
                <span class="input-icon">
                <input type="number" class="form-control input-sm" id="f_c" name="f_c" min="40" max="120" value="{{old('F_C', $signos_vitales->f_c ?? '')}}" placeholder="60"/>
                <i class="ace-icon glyphicon glyphicon-heart-empty" style="color: red"></i>
                </span>
            </div>
            <span class="" >lat/min</span>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> <span class="blue">F.R.</span></label>
            <div class="col-sm-3">
                <span class="input-icon">
                <input type="number" class="form-control input-sm" id="f_r" name="f_r" min="10" max="30" value="{{old('F_R', $signos_vitales->f_r ?? '')}}" placeholder="12"/>
                <i class="ace-icon glyphicon glyphicon-flash" style="color: saddlebrown"></i>
                </span>
            </div>
            <span class="" >r/min</span>
        </div>

    </div>
    <div class="col-xs-12 col-sm-7 center">
        <label class="blue requerido"><b>Motivo de la Consulta</b></label>
        <div class="form-group center">
            <div class="col-sm-12s">
                <textarea class="form-control" placeholder="Describa el motivo de la consulta" id="motivo" name="motivo" rows="3" maxlength="500" required >{{old('motivo', $consulta->motivo ?? '')}}</textarea>
            </div>
        </div>
        <label class="blue"><b>Sintomas</b></label>
        <div class="form-group center">
            <div class="col-sm-12s">
                <textarea class="form-control" placeholder="Ingrese los síntomas " id="sintoma" name="sintoma" rows="4" maxlength="500">{{old('sintoma', $consulta->sintoma ?? '')}}</textarea>
            </div>
        </div>
        <label class="blue requerido"><b>Diagnostico</b></label>
        <div class="form-group center">
            <div class="col-sm-12s">
                <textarea class="form-control" id="diagnostico" name="diagnostico" rows="3" maxlength="500" required>{{old('diagnostico', $consulta->diagnostico ?? '')}}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-2 center">
            <button class="btn btn-success" type="button" id="Guardar_C" style="display: block;"><i class="fa fa-plus"> Guardar</i></button>
        </div>
        <div class="col-xs-12 col-sm-3 center">
            <button class="btn btn-primary" type="button" id="Actualizar_C" style="display: none;"><i class="fa fa-wrench"> Actualizar</i></button>
        </div>
        <div class="col-xs-12 col-sm-2 center">
            <form action="{{route('imprimir_consulta', ['id' => $consulta->id])}}" target="{{$consulta->id}}">
                <button class="btn btn-warning" type="submit" id="Imprimir_C" style="display: none;"><i class="fa fa-print"> IMPRIMIR</i></button>
            </form>
        </div>
    </div>