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
        Lista de Internos Dados de Alta
        <div class="box-tools pull-right">
            <a href="{{route('internacion')}}" class="btn btn-block btn-info btn-sm">
                <i class="fa fa-fw fa-reply-all"></i>Volver a Internación
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
                        <th style="text-align: center; width: 15%">F. Ingreso</th>
                        <th style="text-align: center; width: 15%">F. salida</th>
                        <th style="text-align: center; width: 35%">Paciente</th>
                        <th style="text-align: center; width: 20%">contacto</th>
                        <th style="text-align: center; width: 15%">Opción</th>                           
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datos as $interno)
                        <tr>
                            <td style="text-align: center">{{$interno->fecha_ingreso}}</td>
                            <td style="text-align: center">{{$interno->fecha_salida}}</td>
                            <td style="text-align: center">{{$interno->paciente->nombre}} {{$interno->paciente->apellido_p}} {{$interno->paciente->apellido_m}}</td>
                            <td style="text-align: center">
                                @if ($interno->paciente->celular==null)
                                    <span class="red">No Registrado</span>
                                @else
                                    {{$interno->paciente->celular}}
                                @endif  
                            </td>
                            <td style="text-align: center;">
                                <div class="hidden-sm hidden-xs btn-group">  
                                    <form action="{{route('retiro_forzoso', ['id' => $interno->id])}}" class="d-inline" target="{{$interno->id}}">
                                        <button type="submit" class="btn btn-primary btn-xs eliminar tooltipsC" title="Imprimir documento de retiro">
                                            <i class="fa fa-fw fa-download"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="hidden-sm hidden-xs btn-group">  
                                    <form action="{{route('imprimir_todo', ['id' => $interno->id])}}" class="d-inline" target="{{$interno->id}}">
                                        <button type="submit" class="btn btn-inverse btn-xs eliminar tooltipsC" title="Imprimir Internación">
                                            <i class="fa fa-file-pdf-o"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection