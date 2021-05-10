@extends("theme.$theme.layout")
@section('titulo')
    wil
@endsection

@section('contenido')
<div class="page-header">
    <h1>
        Bienvenido
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
              Sistema SIS
        </small>
    </h1>
</div><!-- /.page-header -->
@include('mensajes.correcto')
@include('mensajes.incorrecto')
@endsection