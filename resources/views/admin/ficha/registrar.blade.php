@extends("theme.$theme.layout")
@section('titulo')
	Registrar Ficha
@endsection
@section("scripts")
    <script src="{{asset("assets/pages/scripts/ficha/crear.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
<link rel="stylesheet" href="{{asset("assets/css/zoom.css")}}"/>
    <div class="page-header">
        <h1>
           Registrar Ficha
           <div class="box-tools pull-right">
            <a href="{{route('consulta')}}" class="btn btn-block btn-info btn-sm">
                <i class="fa fa-fw fa-reply-all"></i> Volver al listado
            </a>
        </div>
           &nbsp;&nbsp;
        </h1>
    </div>
    <div class="row">
        <form action="{{route('guardar_ficha')}}" id="form-general" method="POST">
            @csrf
        <div class="col-xs-12">
            @include('mensajes.correcto')
            @include('mensajes.incorrecto')
            <div class="col-xs-12 col-sm-4 center">
                <div>
                    <span class="profile-picture">
                        @if ($paciente->foto==null)
                        <img src="{{asset("assets/$theme/assets/images/avatars/usuario.jpg")}}" height="200px" width="200px"/>
                        @else
                        <img src="{{Storage::url("datos/fotos/paciente/$paciente->foto")}}" height="200px" width="200px"/>
                        @endif
                    </span>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="">
                    <div class="profile-user-info profile-user-info-striped">
                        <div class="profile-info-row">
                            <div class="profile-info-name"><u>Nombre</u>:</div>
                            <div class="profile-info-value">
                                <span class="editable"><i>{{$paciente->nombre}} {{$paciente->apellido_p}} {{$paciente->apellido_m}}</i></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"><u>Número de C.I.</u>:</div>
                            <div class="profile-info-value">
                                <span class="editable"><i>{{$paciente->ci}}</i></span>                          
                            </div>
                        </div>
                        @php                               
                            $fecha_actual = new \DateTime();
                            $fecha=$fecha_actual->format('Y-m-d');                    
                        @endphp
                        <div class="profile-info-row">
                            <div class="profile-info-name"><u>Fecha</u>:</div>
                            <div class="profile-info-value">
                                <span class="editable"><i>
                                    <input type="date" class="form-control fecha" name="fecha" id="fecha" value="{{old('fecha', $ficha->fecha ?? $fecha)}}"  required/>
                                </i></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"><u>Horario</u>:</div>
                            <div class="profile-info-value" id="div_select">
                                <button type="button" class="form-control btn-primary" id="horario" name="horario" style="display: block"><span class="white">ver horario</span></button>
                                <div id="div_select_horario" style="display: none">
                                    
                                </div>
                                <div id="div_hidden" style="display: block"><input type="hidden" id="hidden" required></div>
                            </div>
                        </div>
                    </div><br>
                </div>
            </div>
            <input type="hidden" id="paciente_id" name="paciente_id" value="{{$paciente->id}}">
            <input type="hidden" id="servicio_id" name="servicio_id" value="1">
            <div class="box-footer">
                <div class="col-lg-5"></div>
                <div class="col-lg-6">
                    @include('botones.crear')
                </div>
            </div>
        </div>
    </form>
        <style>
            .colo {
            float:left;
            width:30%;
            background:rgb(227, 239, 241);
            }
            #alto {
                height: 80px;
            }
        </style>
    </div>
@endsection