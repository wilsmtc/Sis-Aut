@extends("theme.$theme.layout")
@section('titulo')
    Inicio
@endsection
@section('contenido')
@php
    $clinica=MyHelper::Datos_Clinica();
@endphp
@include('mensajes.correcto')
@include('mensajes.incorrecto')

<div class="page-header center">
    <h1>
        {{$clinica->nombre}}
    </h1>
</div>
<div class="col-xs-6 col-sm-3 pricing-box">
    <div class="widget-box widget-color-dark">
        <div class="widget-header">
            <h5 class="widget-title bigger lighter">Misión</h5>
        </div>
        <div class="widget-body">
            <div class="widget-main center">
                {{$clinica->mision}}
            </div>
        </div>
    </div>
</div>
<div class="col-md-6" style="text-align: center">
    <div class="box box-solid">
      <div class="box-body">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
            <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
          </ol>
          <div class="carousel-inner">
            <div class="item active">
                @if ($clinica->foto==null)
                    <img src="{{asset("assets/$theme/assets/images/avatars/usuario.jpg")}}" height="500px" width="295px" alt="First slide">
                @else
                    <img src="{{Storage::url("datos/fotos/clinica/$clinica->foto")}}" height="500" width="900"/>
                @endif

              <div class="carousel-caption">
                Campeón de Champions League
              </div>
            </div>
            <div class="item">
              <img src="{{asset("assets/$theme/assets/images/avatars/bayern1.jpg")}}" height="500" width="900" alt="Second slide">

              <div class="carousel-caption">
                Second Slide
              </div>
            </div>
            <div class="item">
                <img src="{{asset("assets/$theme/assets/images/avatars/bayern2.jpg")}}" height="500" width="900"  alt="Third slide">
                <div class="carousel-caption">
                    Campeón Mundial de clubes
                </div>
            </div>
          </div>
          <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="fa fa-angle-left"></span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="fa fa-angle-right"></span>
          </a>
        </div>
      </div>
    </div>
</div>
<div class="col-xs-6 col-sm-3 pricing-box">
    <div class="widget-box widget-color-dark">
        <div class="widget-header">
            <h5 class="widget-title bigger lighter">Vision</h5>
        </div>
        <div class="widget-body">
            <div class="widget-main center">
                {{$clinica->vision}}
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-3 col-xs-6 center" >
        <div class="infobox infobox-green infobox-lg infobox-dark center">
            <div class="infobox-icon">
                <a href="{{route('personal')}}" class="ace-icon fa fa-users zoom "></a>          
            </div>
            <div class="infobox-data center">
                <div class="infobox-content">{{$per}}</div>
                <h4><div class="infobox-content">Personal</div></h4>               
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6 center" >
        <div class="infobox infobox-blue infobox-lg infobox-dark center">
            <div class="infobox-icon">
                <a href="{{route('paciente')}}" class="ace-icon fa fa-plus-circle zoom"></a>
            </div>
            <div class="infobox-data center">
                <div class="infobox-content">{{$pac}}</div>
                <h4><div class="infobox-content">Pacientes</div></h4>               
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6 center" >
        <div class="infobox infobox-orange infobox-lg infobox-dark center">
            <div class="infobox-icon">
                <i class="ace-icon fa fa-stethoscope zoom"></i>
            </div>
            <div class="infobox-data center">
                <div class="infobox-content">{{$con}}</div>
                <h4><div class="infobox-content">Consultas</div></h4>               
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6 center" >
        <div class="infobox infobox-red infobox-lg infobox-dark center">
            <div class="infobox-icon">
                 <a href="{{route('consulta')}}" class="ace-icon fa fa-book zoom"></a>
            </div>
            <div class="infobox-data center">
                <div class="infobox-content">{{$ficha}}</div>
                <h4><div class="infobox-content">Fichas para Hoy</div></h4>               
            </div>
        </div>
    </div>
</div>
@endsection