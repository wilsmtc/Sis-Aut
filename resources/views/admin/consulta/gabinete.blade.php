<div class="col-lg-12 center">
    <div class="col-sm-2"></div>
    <div class="col-sm-8" style="text-align: center">
        <label class="blue requerido"><b>Estudio</b></label>
        <div class="form-group center">
                <textarea class="form-control" placeholder="Describa el estudio de la estudio" id="estudio_g" name="estudio" rows="3" maxlength="500" required >{{old('estudio', $gabinete->estudio_g ?? '')}}</textarea>
        </div>
    </div>
    <div class="col-sm-2"></div>
</div>
<div class="col-lg-12 center">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <label class="blue"><b>Indicación</b></label> <br>
        <div class="form-group center">
                <textarea class="form-control" placeholder="Ingrese los indicacion " id="indicacion_g" name="indicacion" rows="4" maxlength="500">{{old('indicacion', $gabinete->indicacion_g ?? '')}}</textarea>
        </div>
    </div>
    <div class="col-sm-2"></div>
</div>
<div class="col-lg-12">
    <div class="col-lg-3"></div>
    <div class="col-lg-2">
        <button class="btn btn-success" type="submit" id="Guardar_G" name="a" style="display: block;"><i class="fa fa-check"> Guardar</i></button>
    </div>
    <div class="col-lg-2">
        <button class="btn btn-primary" type="button" id="Actualizar_G" name="a" style="display: none;"><i class="fa fa-wrench"> Actualizar</i></button>
    </div>
    <div class="col-xs-12 col-sm-2">
        <form action="{{route('imprimir_gabinete', ['id' => $consulta->id])}}" target="{{$consulta->id}}">
            <button class="btn btn-warning" type="submit" id="Imprimir_G" style="display: none;" ><i class="fa fa-print"> IMPRIMIR</i></button>
        </form>
    </div>
    <div class="col-lg-3"></div>
</div>