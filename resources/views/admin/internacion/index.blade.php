@extends("theme.$theme.layout")
@section('titulo')
    Internación
@endsection
@section("scripts")
    <script src="{{asset("assets/pages/scripts/alert/alert.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/pages/scripts/datatables/datatables.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
<div class="page-header">
    <h1>
        Lista de Internos
        <div class="box-tools pull-right">
            <a href="{{route('internacion_alta')}}" class="btn btn-block btn-info btn-sm">
                <i class="fa fa-bed"></i> Internos dados de alta
            </a>
        </div>
    </h1>
</div>
<div class="row">
    <div class="col-xs-12">
        @include('mensajes.correcto')
        @include('mensajes.incorrecto')
        <div class="box-body">
            <table id="tabla" class="table  table-bordered table-hover">
                <thead>
                    <tr>
                        <th style="text-align: center; width: 15%">Cama</th>
                        <th style="text-align: center; width: 15%">F. Ingreso</th>
                        <th style="text-align: center; width: 35%">Paciente</th>
                        <th style="text-align: center; width: 20%">Núm Emergencia</th>
                        <th style="text-align: center; width: 15%">Opción</th>                           
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datos as $interno)
                        <tr>
                            <td style="text-align: center">{{$interno->cama}}</td>
                            <td style="text-align: center">{{$interno->fecha_ingreso}}</td>
                            <td style="text-align: center">{{$interno->paciente->nombre}} {{$interno->paciente->apellido_p}} {{$interno->paciente->apellido_m}}</td>
                            <td style="text-align: center">
                                @if ($interno->contacto_emergencia==null)
                                    <span class="red">No Registrado</span>
                                @else
                                    {{$interno->contacto_emergencia}}
                                @endif  
                            </td>
                            <td style="text-align: center;">
                                @if(Auth::user()->rol->editar == 1)
                                    <div class="hidden-sm hidden-xs btn-group">                                    
                                        <button onclick="location.href='{{route('editar_internacion', ['id' => $interno->id])}}'" class="btn btn-xs btn-warning" title="Editar interno">
                                            <i class="ace-icon fa fa-pencil bigger-120"></i>
                                        </button>
                                    </div>
                                @endif
                                <div class="hidden-sm hidden-xs btn-group">  
                                    <form action="{{route('imprimir_internacion', ['id' => $interno->id])}}" class="d-inline" target="{{$interno->id}}">
                                        <button type="submit" class="btn btn-success btn-xs eliminar tooltipsC" title="Imprimir entrada">
                                            <i class="fa fa-fw fa-download"></i>
                                        </button>
                                    </form>
                                </div>
                                @if(Auth::user()->rol->añadir == 1)
                                    <div class="hidden-sm hidden-xs btn-group">                                    
                                        <button onclick="location.href='{{route('alta', ['id' => $interno->id])}}'" class="btn btn-xs btn-danger" title="solicitar alta">
                                            <i class="ace-icon fa fa-bed bigger-120"></i>
                                        </button>
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
@endsection