@extends("theme.$theme.layout")
@section('titulo')
    Internacion
@endsection
@section("scripts")
    <script src="{{asset("assets/pages/scripts/internacion/validar.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
<div class="page-header">
    <h1>
        Editar Registro de Entrada
        <div class="box-tools pull-right">
            <a href="{{route('internacion')}}" class="btn btn-block btn-info btn-sm">
                <i class="fa fa-fw fa-reply-all"></i> Volver al listado
            </a>
        </div>
    </h1>
</div>
<div class="row">
    <div class="col-xs-12">
        @include('mensajes.error')
        @include('mensajes.incorrecto')
        <form class="form-horizontal" action="{{route('actualizar_internacion', ['id' => $dato->id])}}" id="form-general" method="POST">
            @csrf @method("put")
            @include('admin.internacion.form')
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