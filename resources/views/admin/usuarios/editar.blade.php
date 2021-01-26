@extends("theme.$theme.layout")
@section('titulo')
    Editar Usuario
@endsection
@section("scripts")
    <script src="{{asset("assets/pages/scripts/usuario/validar.js")}}" type="text/javascript"></script>
@endsection
@section("styles")
<link href="{{asset("assets/js/bootstrap-fileinput-master/css/fileinput.min.css")}}" rel="stylesheet" type="text/css"/>
@endsection

@section("scriptsPlugins")
<script src="{{asset("assets/js/bootstrap-fileinput-master/js/fileinput.min.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/js/bootstrap-fileinput-master/js/locales/es.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/js/bootstrap-fileinput-master/themes/fas/theme.min.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
<div class="page-header">
    <h1>
        Usuarios
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
             editar Usuario
        </small>
        <div class="box-tools pull-right">
            <a href="{{route('usuario')}}" class="btn btn-block btn-info btn-sm">
                <i class="fa fa-fw fa-reply-all"></i> Volver al listado
            </a>
        </div>
    </h1>
</div>
<div class="row">
    <div class="col-xs-12">
        @include('mensajes.error')
        @include('mensajes.incorrecto')
        <form class="form-horizontal" action="{{route('actualizar_usuario', ['id' => $usuario->id])}}" id="form-general" class="form-horizontal" method="POST" enctype="multipart/form-data">
            @csrf @method("put")
            @include('admin.usuarios.form')
            <div class="box-footer">
                <div class="col-lg-4"></div>
                <div class="col-lg-6">
                    @include('botones.actualizar')
                </div>
            </div>
        </form>
    </div>
</div>
@endsection