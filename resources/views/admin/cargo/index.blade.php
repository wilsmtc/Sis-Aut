@extends("theme.$theme.layout")
@section('titulo')
    Cargo
@endsection
@section("scripts")
    <script src="{{asset("assets/pages/scripts/alert/alert.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/pages/scripts/datatables/datatables.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
<div class="page-header">
    <h1>
        Lista de Cargos
        @if(Auth::user()->rol->añadir == 1)      
            <div class="box-tools pull-right">
                <a href="{{route('crear_cargo')}}" class="btn btn-block btn-success btn-sm">
                    <i class="fa fa-fw fa-plus-circle"></i> Crear Cargo
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
            <table id="tabla-data" class="table  table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="col-lg-3" style="text-align: center;">Nombre</th>
                        <th class="col-lg-8" style="text-align: center;">Descripción</th>
                        <th class="col-lg-1" style="text-align: center;">Opción</th>                           
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datos as $cargo)
                        <tr>
                            <td>{{$cargo->nombre}}</td>
                            <td>{{$cargo->descripcion}}</td>
                            <td style="text-align: center;">
                                @if(Auth::user()->rol->editar == 1)
                                    <div class="hidden-sm hidden-xs btn-group">                                    
                                        <button onclick="location.href='{{route('editar_cargo', ['id' => $cargo->id])}}'" class="btn btn-xs btn-warning" title="editar Cargo">
                                            <i class="ace-icon fa fa-pencil bigger-120"></i>
                                        </button>
                                    </div>
                                @endif
                                @if(Auth::user()->rol->eliminar == 1)    
                                    <div class="hidden-sm hidden-xs btn-group">  
                                        <form action="{{route('eliminar_cargo', ['id' => $cargo->id])}}" class="d-inline form-eliminar " method="POST" id="form-eliminar" title="Eliminar Cargo">
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