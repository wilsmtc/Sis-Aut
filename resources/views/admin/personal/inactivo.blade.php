@extends("theme.$theme.layout")
@section('titulo')
    Personal
@endsection
@section("scripts")
    <script src="{{asset("assets/pages/scripts/alert/alert.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/pages/scripts/datatables/datatables.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/pages/scripts/personal/modal.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/pages/scripts/personal/estado.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
<div class="page-header">
    <h1>
        Lista del Personal Inactivo
    </h1>
</div>
<div class="row">
    <div class="col-xs-12">
        @include('mensajes.correcto')
        @include('mensajes.incorrecto')
        <div class="box-body">
            <table id="tabla-data" class="table  table-bordered table-hover">
                <thead>
                    <tr>
                        <th style="text-align: center; width: 17%">Nombres</th>
                        <th style="text-align: center; width: 20%">Apellidos</th>
                        <th style="text-align: center; width: 17%">Unidad</th>
                        <th style="text-align: center; width: 20%">Cargo</th>
                        <th style="text-align: center; width: 13%">Curriculum</th>
                        <th style="text-align: center; width: 13%">Opción</th>                           
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datos as $personal)
                        <tr>
                            <td style="text-align: center;">{{$personal->nombre}}</td>
                            <td style="text-align: center;">{{$personal->apellido}}</td>
                            <td style="text-align: center;">{{$personal->unidad->nombre}}</td>
                            <td style="text-align: center;">{{$personal->cargo->nombre}}</td>
                            <td style="text-align: center;">
                                @if($personal->curriculum==null)
                                    <span class="label label-inverse arrowed-in arrowed-in-right">No Tiene</span>
                                @else
                                    <a href="{{route('ver_curriculum', ['id' => $personal->id])}}" target="{{$personal->curriculum}}" title="ver curriculum" id="ver-curriculum">
                                        <span class="label label-info arrowed-in arrowed-in-right">
                                            <i class="fa fa-fw  fa-download"></i> Ver</span>                           																			
                                    </a>
                                @endif
                            </td>
                            <td style="text-align: right;">
                                <a href="{{route('ver_personal', $personal)}}" class="ver-personal btn btn-info btn-xs tooltipC" title="ver datos" id="ver-personal">
                                    @csrf
                                    <i class="fa fa-fw fa-camera-retro"></i>
                                </a>
                                @if(Auth::user()->rol->editar == 1)
                                    <div class="hidden-sm hidden-xs btn-group">  
                                        <form action="{{route('activar_personal', ['id' => $personal->id])}}" class="d-inline form-estado" method="POST" id="form-estado">
                                            @csrf @method("put")
                                            <button type="submit" class="btn btn-success btn-xs eliminar tooltipsC" title="Reincorporar Personal">
                                                <i class="ace-icon glyphicon glyphicon-ok"></i>
                                            </button>
                                        </form>
                                    </div>
                                @endif
                                @if(Auth::user()->rol->eliminar == 1)    
                                    <div class="hidden-sm hidden-xs btn-group">  
                                        <form action="{{route('eliminar_personal', ['id' => $personal->id])}}" class="d-inline form-eliminar " method="POST" id="form-eliminar">
                                            @csrf @method("delete")
                                            <button type="submit" class="btn btn-danger btn-xs eliminar tooltipsC" title="Eliminar Personal">
                                                <i class="fa fa-fw fa-close"></i>
                                            </button>
                                        </form>
                                    </div> 
                                @endif                       
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal modal-info fade in" id="modal-ver-personal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content" style="background: rgb(185, 185, 185)">
            <div class="modal-header " style="background: rgb(95, 95, 104)">
                <button type="button" class="white close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="white modal-title" style="text-align: center"><b>Personal</b></h4>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer" style="background: rgb(88, 88, 97)">
                <button type="button" class="btn btn-success" data-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>
@endsection