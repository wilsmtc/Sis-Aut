@extends("theme.$theme.layout")
@section('titulo')
    Roles
@endsection
@section("scripts")
    <script src="{{asset("assets/pages/scripts/alert/alert.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
<div class="page-header">
    <h1>
        Lista de Roles
        @php
        if(Auth::user()->rol->añadir == 1)       
            $crear= "";
        else {
            $crear= "disabled";
        }
        if(Auth::user()->rol->editar == 1)       
            $editar= "";
        else {
            $editar= "disabled";
        }
        if(Auth::user()->rol->eliminar == 1)       
            $eliminar= "";
        else {
            $eliminar= "disabled";
        }
        @endphp
        <div class="box-tools pull-right">
            <button onclick="location.href='{{route('crear_rol')}}'" class="btn btn-xs btn-success {{$crear}}" title="Crear Rol">
                <i class="fa fa-fw fa-plus-circle"></i>Crear Rol
            </button>
        </div>
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
                        <th class="col-lg-4" style="text-align: center;">Rol</th>
                        <th class="col-lg-1" style="text-align: center;">Crear</th>
                        <th class="col-lg-1" style="text-align: center;">Editar</th>
                        <th class="col-lg-1" style="text-align: center;">Eliminar</th>
                        <th class="col-lg-1" style="text-align: center;">Opción</th>                           
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datos as $roles)
                        <tr>
                            <td>{{$roles->rol}}</td>
                            <td style="text-align: center;">
                                @if($roles->añadir==1)
                                    <span class="badge badge-success"><i class="ace-icon glyphicon glyphicon-ok"></i></span>
                                @else
                                    <span class="badge badge-danger"><i class="ace-icon glyphicon glyphicon-remove"></i></span>
                                @endif                     
                            </td>
                            <td style="text-align: center;">
                                @if($roles->editar==1)
                                <span class="badge badge-success"><i class="ace-icon glyphicon glyphicon-ok"></i></span>
                                @else
                                    <span class="badge badge-danger"><i class="ace-icon glyphicon glyphicon-remove"></i></span>
                                @endif 
                            </td>
                            <td style="text-align: center;">
                                @if($roles->eliminar==1)
                                <span class="badge badge-success"><i class="ace-icon glyphicon glyphicon-ok"></i></span>
                                @else
                                    <span class="badge badge-danger"><i class="ace-icon glyphicon glyphicon-remove"></i></span>
                                @endif 
                            </td>
                            <td style="text-align: center;">
                                <div class="hidden-sm hidden-xs btn-group">                                    
                                    <button onclick="location.href='{{route('editar_rol', ['id' => $roles->id])}}'" class="btn btn-xs btn-warning" title="Editar Rol">
                                        <i class="ace-icon fa fa-pencil bigger-120"></i>
                                    </button>
                                </div>
                                <div class="hidden-sm hidden-xs btn-group">  
                                    <form action="{{route('eliminar_rol', ['id' => $roles->id])}}" class="d-inline form-eliminar " method="POST" id="form-eliminar" title="Eliminar Rol">
                                        @csrf @method("delete")
                                        <button type="submit" class="btn btn-danger btn-xs eliminar tooltipsC" title="Eliminar este rol">
                                            <i class="fa fa-fw fa-close"></i>
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