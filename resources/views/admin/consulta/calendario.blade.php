@extends("theme.$theme.layout")
@section('titulo')
Calendario
@endsection
@section("styles")
  <link rel="stylesheet" href="{{asset("assets/css/fullcalendar/core/main.css")}}"> 
  <link rel="stylesheet" href="{{asset("assets/css/fullcalendar/daygrid/main.css")}}">
  <link rel="stylesheet" href="{{asset("assets/css/fullcalendar/list/main.css")}}">
  <link rel="stylesheet" href="{{asset("assets/css/fullcalendar/timegrid/main.css")}}"> 
@endsection
@section("scripts")
  <script src="{{asset("assets/js/fullcalendar/core/main.js")}}" type="text/javascript"></script>
  <script src="{{asset("assets/js/fullcalendar/daygrid/main.js")}}" type="text/javascript"></script>
  <script src="{{asset("assets/js/fullcalendar/timegrid/main.js")}}" type="text/javascript"></script>
  <script src="{{asset("assets/js/fullcalendar/list/main.js")}}" type="text/javascript"></script>
  <script src="{{asset("assets/js/fullcalendar/interaction/main.js")}}" type="text/javascript"></script>
  <script>
    var url_="{{url('eventos')}}";
    var url_show="{{ url('admin/eventos/show') }}";
  </script>
  <script src="{{asset("assets/pages/scripts/calendario/index.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
    <div class="row">
      @include('mensajes.correcto')
        @include('mensajes.incorrecto')
      <h4 class="center page-header"><b>Calendario de Consulta Externa</b>
        <div class="box-tools pull-right">
          <a href="{{route('consulta')}}" class="btn btn-block btn-info btn-sm">
              <i class="fa fa-fw fa-reply-all"></i> Volver
          </a>
        </div> 
      </h4>
        <div class="col-lg-2"></div>
        <div class="col-lg-8" style="background-color: rgba(238, 228, 228, 0.699)" >
          <div class="box-header with-border box box-primary" id="calendar" ></div>
        </div>
    </div>
    <div class="modal modal-info fade in" id="agenda" tabindex="-1">
      <div class="modal-dialog">
          <div class="modal-content" style="background: rgb(185, 185, 185)">
              <div class="modal-header " style="background: rgb(95, 95, 104)">
                  <button type="button" class="white close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
                  <h4 class="white modal-title" id="modalTitle" style="text-align: center"><b>Agenda</b></h4>
              </div>
              <form id="form-general">
                <div class="modal-body">                
                    @csrf
                    <div class="row">
                      <div class="form-group">
                        <label class="col-sm-4 control-label no-padding-right requerido" for="form-field-1"> Intervalo de Atención</label>
                        <div class="col-sm-5">
                          <select class="form-control" id="intervalo">                  
                            <option value="">Elija una Opción</option>
                            <option value="15">15 minutos</option>
                            <option value="30">30 minutos</option>              
                          </select> 
                        </div>
                        <div class="col-sm-5 center" id="div_intervalo" style="display: none"><span class="red"><b>Elija una opción</b></span></div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group">
                        <label class="col-sm-4 control-label no-padding-right requerido" for="form-field-1"> Hora Inicio</label>
                        <div class="col-sm-5">
                          <input type="time" min="07:00" max="19:59" step="1800" class="form-control" id="hora_inicio" name="hora" value="{{old('hora', $ficha->hora ?? '08:00')}}" required/>
                        </div>
                        <div class="col-sm-5 center" id="div_hora_inicio" style="display: none"><span class="red"><b>Elija una Hora Válida</b></span></div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group">
                        <label class="col-sm-4 control-label no-padding-right requerido" for="form-field-1"> Hora Fin</label>
                        <div class="col-sm-5">
                          <input type="time" min="22:00" max="23:59" step="1800" class="form-control" id="hora_fin" name="hora_fin" value="{{old('hora', $ficha->hora ?? '22:00')}}" required/>
                        </div>
                        <div class="col-sm-5 center" id="div_hora_fin" style="display: none"><span class="red"><b>Elija una Hora Válida</b></span></div>
                      </div>
                    </div>              
                </div>
                </form> 
                <div class="modal-footer" style="background: rgb(88, 88, 97)">    
                    <button type="button" class="btn btn-success pull-right" id="btn_agendar" style="display: block">Agendar</button>
                    <button type="button" class="btn btn-danger pull-right" id="btn_eliminar" style="display: none;">Elliminar</button> 
                    <button type="button" class="btn btn-primary pull-right" id="btn_editar" style="display: none;">Actualizar</button>
                </div>
                          
          </div>
      </div>
  </div>
@endsection

