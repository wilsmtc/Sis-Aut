@extends("theme.$theme.layout")
@section('titulo')
    Crear Cargo
@endsection
@section("scripts")
    <script src="{{asset("assets/pages/scripts/cargo/validar.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
<div class="page-header">
    <h1>
        Cargos
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
             Crear Cargo
        </small>
        <div class="box-tools pull-right">
            <a href="{{route('cargo')}}" class="btn btn-block btn-info btn-sm">
                <i class="fa fa-fw fa-reply-all"></i> Volver al listado
            </a>
        </div>
    </h1>
</div>
<div class="row">
    <div class="col-xs-12">
        @include('mensajes.error')
        @include('mensajes.incorrecto')
        <form class="form-horizontal" action="{{route ('guardar_cargo')}}" id="form-general" class="form-horizontal" method="POST">
            @csrf
            @include('admin.cargo.form')
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