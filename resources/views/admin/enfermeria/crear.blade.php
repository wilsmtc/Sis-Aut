@extends("theme.$theme.layout")
@section('titulo')
    Crear Registro de Enfermería
@endsection
@section("scripts")
    <script src="{{asset("assets/pages/scripts/enfermeria/validar.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
<div class="page-header">
    <h1>
        Registro de Enfermería
        <div class="box-tools pull-right">
            <a href="{{route('enfermeria')}}" class="btn btn-block btn-info btn-sm">
                <i class="fa fa-fw fa-reply-all"></i> Volver al listado
            </a>
        </div>
    </h1>
</div>
<div class="row">
    <div class="col-xs-12">
        @include('mensajes.error')
        @include('mensajes.incorrecto')
        <form class="form-horizontal" action="{{route ('guardar_enfermeria')}}" id="form-general" method="POST">
            @csrf
            <div class="row">
                @include('admin.enfermeria.form')
            </div>
            
            <div class="row">
                <div class="box-footer">
                    <div class="col-lg-5"></div>
                    <div class="col-lg-6">
                        @include('botones.crear')
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection