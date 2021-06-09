@extends("theme.$theme.layout")
@section('titulo')
    Crear Internacion
@endsection
@section("scripts")
    <script src="{{asset("assets/pages/scripts/internacion/validar.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
<div class="page-header">
    <h1>
        Internaciones
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
             Crear
        </small>
        <div class="box-tools pull-right">
            <a href="{{route('crear_consulta', ['id' => $ficha->id])}}" class="btn btn-block btn-info btn-sm">
                <i class="fa fa-fw fa-reply-all"></i> Volver a Consulta
            </a>
        </div>
    </h1>
</div>
<div class="row">
    <div class="col-xs-12">
        @include('mensajes.error')
        @include('mensajes.incorrecto')
        <form class="form-horizontal" action="{{route ('guardar_internacion')}}" id="form-general" method="POST">
            @csrf
            @include('admin.internacion.form')
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