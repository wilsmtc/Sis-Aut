@extends("theme.$theme.layout")
@section('titulo')
    Editar registro
@endsection
@section("scripts")
    <script src="{{asset("assets/pages/scripts/enfermeria/validar.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
<div class="page-header">
    <h1>
        Editar Registro      
        <div class="box-tools pull-right">
            <a href="{{route('enfermeria')}}" class="btn btn-block btn-info btn-sm">
                <i class="fa fa-fw fa-reply-all"></i> Volver
            </a>
        </div>
    </h1>
</div>
<div class="row">
    <div class="col-xs-12">
        @include('mensajes.error')
        @include('mensajes.incorrecto')
        <form class="form-horizontal" action="{{route('actualizar_enfermeria', ['id' => $data->id])}}" id="form-general" method="POST">
            @csrf @method("put")
            <div class="row">
                @include('admin.enfermeria.form')
            </div>
            
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