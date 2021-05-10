@extends("theme.$theme.layout")
@section('titulo')
    Unidad
@endsection
@section("scripts")
    <script src="{{asset("assets/pages/scripts/alert/alert.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/pages/scripts/datatables/datatables.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
<div class="page-header">
    <h1>
        Lista de Unidades 
        @if(Auth::user()->rol->añadir == 1)      
            <div class="box-tools pull-right">
                <a href="{{route('crear_unidad')}}" class="btn btn-block btn-success btn-sm">
                    <i class="fa fa-fw fa-plus-circle"></i> Crear Unidad
                </a>
            </div>
        @endif
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
                        <th class="col-lg-2" style="text-align: center;">Nombre</th>
                        <th class="col-lg-2" style="text-align: center;">Sigla</th>
                        <th class="col-lg-5" style="text-align: center;">Descripción</th>
                        <th class="col-lg-2" style="text-align: center;">Opción</th>                           
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datos as $unidad)
                        <tr>
                            <td>{{$unidad->nombre}}</td>
                            <td style="text-align: center;">{{$unidad->sigla}}</td>
                            <td>{{$unidad->descripcion}}</td>
                            <td style="text-align: center;">
                                @if(Auth::user()->rol->editar == 1)
                                    <div class="hidden-sm hidden-xs btn-group">                                    
                                        <button onclick="location.href='{{route('editar_unidad', ['id' => $unidad->id])}}'" class="btn btn-xs btn-warning" title="editar Unidad">
                                            <i class="ace-icon fa fa-pencil bigger-120"></i>
                                        </button>
                                    </div>
                                @endif
                                @if(Auth::user()->rol->eliminar == 1)    
                                <div class="hidden-sm hidden-xs btn-group">  
                                    <form action="{{route('eliminar_unidad', ['id' => $unidad->id])}}" class="d-inline form-eliminar " method="POST" id="form-eliminar" title="Eliminar Servicios">
                                        @csrf @method("delete")
                                        <button type="submit" class="btn btn-danger btn-xs eliminar tooltipsC" title="Eliminar Unidad">
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
@endsection