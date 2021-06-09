

<span class="blue"><h4><i>Receta de Medicamentos</i></h4></span>
<div class="row">
    <div class="col-xs-12">
        <form class="form-horizontal" action="" id="form_medicamento">
            <div style="display: block;" id="div_receta">
                <div class="col-xs-12 col-sm-1 center">
                    <label class="blue"><i>Cantidad</i></label>
                    <input type="number" name="cantidad" id="cantidad" class="form-control" min="1">
                </div> 
                <div class="col-xs-12 col-sm-5 center">
                    <label class="blue"><i>Medicamento</i></label>
                    <input type="text" name="medicamento" id="medicamento" class="form-control" placeholder="Nombre del medicamento">
                </div>    
                <div class="col-xs-12 col-sm-1 center">
                    <label class="blue"><i>Dosis</i></label>
                    <input type="number" name="dosis" id="dosis" class="form-control" min="1"> 
                </div>  
                <div class="col-xs-12 col-sm-1 center">
                    <label class="blue"><i>Fr (hrs)</i></label>
                    <input type="number" name="frecuencia" id="frecuencia" class="form-control" min="1">
                </div>   
                <div class="col-xs-12 col-sm-1 center">
                    <label class="blue small"><i>  Duración (d)</i></label>
                    <input type="number" name="duracion" id="duracion" class="form-control" min="1"> 
                </div>
                <div class="col-xs-12 col-sm-3" >
                    <label >botones</label><br>
                    <div class="col-xs-5 ">
                        <button id="btnAdd" type="button" class="btn btn-primary btn-xm tooltipsC" title="Agregar">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                    
                    <div class="col-xs-7 ">
                        <button id="btnSave" type="button" class="btn btn-success btn-xm tooltipsC pull-right" style="display: none;" title="Guardar">
                            <i class="fa fa-check"> CONFIRMAR</i>
                        </button>
                    </div>
                    
                </div>
            </div>
        </form>
        <br><br>
        <div id="textarea">

        </div>
        <form id="form_receta">
            @csrf
            <input type="hidden" id="consulta_id" value={{$consulta->id}}>
            <div class="form-group col-xs-12 col-sm-7 center" style="display: none;" id="content_receta">
                <label>Receta</label>
                <textarea class="form-control" id="recetas" name="recetas" rows="6" maxlength="1000"></textarea>
            </div>
            <div class="form-group col-xs-12 col-sm-7 center" style="display: none;" id="content_indicaciones">
                <label>indicaciones</label>
                <textarea class="form-control" id="indicacion" name="indicacion" rows="3" maxlength="250"></textarea>
            </div>
            <div class="col-xs-12" >
                <div class="col-xs-2" style="display: none;" id="div_guardar">
                    <button class="btn btn-success" type="button" id="btnGuardar_R" style="display: block;"><i class="fa fa-plus"> Guardar</i></button>
                </div>
                <div class="col-xs-2">
                    <button class="btn btn-primary" type="button" id="btnActualizar_R" style="display: none;"><i class="fa fa-wrench"> Actualizar</i></button>
                </div>
        </form>        
                <div class="col-xs-2">
                    <form action="{{route('imprimir_receta', ['id' => $consulta->id])}}" target="{{$consulta->id}}">
                        <button class="btn btn-warning" type="submit" id="btnImprimir_R" style="display: none;"><i class="fa fa-print"> IMPRIMIR</i></button>
                    </form>
                </div>
            </div>      
        <div id="divElements">
            <div class="form-group" id="">
            </div>
        </div>
    </div>
</div>    