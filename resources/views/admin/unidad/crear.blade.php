@extends("theme.$theme.layout")
@section('titulo')
    Crear Unidad
@endsection
@section("scripts")
    <script src="{{asset("assets/pages/scripts/unidad/validar.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
<div class="page-header">
    <h1>
        Unidad
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
             Crear Unidad
        </small>
        <div class="box-tools pull-right">
            <a href="{{route('unidad')}}" class="btn btn-block btn-info btn-sm">
                <i class="fa fa-fw fa-reply-all"></i> Volver al listado
            </a>
        </div>
    </h1>
</div>
<div class="row">
    <div class="col-xs-12">
        @include('mensajes.error')
        @include('mensajes.incorrecto')
        <form class="form-horizontal" action="{{route ('guardar_unidad')}}" id="form-general" class="form-horizontal" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.unidad.form')
            <div class="box-footer">
                <div class="col-lg-4"></div>
                <div class="col-lg-6">
                    @include('botones.crear')
                </div>
            </div>
        </form>
    </div>
</div>
@endsection