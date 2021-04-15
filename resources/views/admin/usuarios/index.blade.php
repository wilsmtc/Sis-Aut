@extends("theme.$theme.layout")
@section('titulo')
    Usuarios
@endsection
@section("scripts")
    <script src="{{asset("assets/pages/scripts/usuario/modal.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/pages/scripts/usuario/estado.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
<div class="page-header">
    <h1>
        Lista de Usuarios 
        @if(Auth::user()->rol->añadir == 1)      
            <div class="box-tools pull-right">
                <a href="{{route('crear_usuario')}}" class="btn btn-block btn-success btn-sm">
                    <i class="fa fa-fw fa-plus-circle"></i> Crear Usuario
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
                        <th class="col-lg-1" style="text-align: center;">Usuario</th>
                        <th class="col-lg-2" style="text-align: center;">Nombre</th>
                        <th class="col-lg-3" style="text-align: center;">Apellido</th>
                        <th class="col-lg-2" style="text-align: center;">Correo</th>
                        <th class="col-lg-2" style="text-align: center;">Rol</th> 
                        <th class="col-lg-2" style="text-align: center;">Opción</th>                           
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datos as $usuarios)
                        <tr>
                            <td>{{$usuarios->usuario}}</td>
                            <td>{{$usuarios->nombre}}</td>
                            <td>{{$usuarios->apellido}}</td>
                            <td>{{$usuarios->email}}</td>
                            <td>{{$usuarios->rol->rol}}</td>
                            <td style="text-align: center;">
                                <a href="{{route('ver_usuario', $usuarios)}}" class="ver-usuario btn btn-info btn-xs tooltipC" title="ver foto" id="ver-usuario">
                                    @csrf
                                    <i class="fa fa-fw fa-camera-retro"></i>
                                </a>
                                @if(Auth::user()->rol->editar == 1)
                                    <div class="hidden-sm hidden-xs btn-group">                                    
                                        <button onclick="location.href='{{route('editar_usuario', ['id' => $usuarios->id])}}'" class="btn btn-xs btn-warning" title="editar usuario">
                                            <i class="ace-icon fa fa-pencil bigger-120"></i>
                                        </button>
                                    </div>
                                @endif
                                @if(Auth::user()->rol->eliminar == 1)    
                                    <div class="hidden-sm hidden-xs btn-group">  
                                        <form action="{{route('inactivar_usuario', ['id' => $usuarios->id])}}" class="d-inline form-estado" method="POST" id="form-estado">
                                            @csrf @method("put")
                                            <button type="submit" class="btn btn-danger btn-xs eliminar tooltipsC" title="Inactivar usuario">
                                                <i class="fa fa-fw fa-ban"></i>
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

<div class="modal modal-info fade in" id="modal-ver-usuario" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content" style="background: rgb(185, 185, 185)">
            <div class="modal-header " style="background: rgb(95, 95, 104)">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="white modal-title" style="text-align: center"><b>Usuario</b></h4>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer" style="background: rgb(88, 88, 97)">
                <button type="button" class="btn btn-success" data-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>
@endsection