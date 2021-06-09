@extends("theme.$theme.layout")
@section('titulo')
    Editar Unidad
@endsection
@section("scripts")
    <script src="{{asset("assets/pages/scripts/ficha/editar.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
<div class="page-header">
    <h1>
        Editar Ficha
        <div class="box-tools pull-right">
            <a href="{{route('consulta')}}" class="btn btn-block btn-info btn-sm">
                <i class="fa fa-fw fa-reply-all"></i> Volver al listado
            </a>
        </div>
    </h1>
</div>
<div class="row">
    <div class="col-xs-12">
        @include('mensajes.error')
        @include('mensajes.incorrecto')
        <form class="form-horizontal" action="{{route('actualizar_ficha', ['id' => $ficha->id])}}" id="form-general" method="POST">
            @csrf @method("put")

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
                        <div class="profile-info-row">
                            <div class="profile-info-name"><u>Atención</u>:</div>
                            <div class="profile-info-value">
                                <span class="editable"><i>{{$ficha->fecha }}  {{ $ficha->hora}}</i></span>
                                <button id="btn_modificar" type="button" style="display: block" class="btn btn-warning pull-right btn-sm"><i class="fa fa-wrench"></i> Modificar</button>                          
                            </div>
                        </div>
                        @php                               
                            $fecha_actual = new \DateTime();
                            $fecha=$fecha_actual->format('Y-m-d');                    
                        @endphp
                    </div>
                    <div class="profile-user-info profile-user-info-striped">
                        <div id="div_fecha" style="display: none">
                            <div class="profile-info-row">               
                                <div class="profile-info-name"><u>Fecha</u>:</div>
                                <div class="profile-info-value">
                                    <span class="editable"><i>
                                        <input type="date" class="form-control fecha" name="fecha" id="fecha" value="{{old('fecha', $ficha->fecha ?? $fecha)}}"/>
                                    </i></span>
                                </div>
                            </div>
                        </div>
                        <div id="div_hora" style="display: none">
                            <div class="profile-info-row ">
                                <div class="profile-info-name"><u>Hora</u>:</div>
                                <div class="profile-info-value" id="div_select">
                                    <button type="button" class="form-control btn-primary" id="horario" name="horario" style="display: block"><span class="white">ver Horario</span></button>
                                    <div id="div_select_horario" style="display: none">
                                        
                                    </div>
                                    <div id="div_hidden" style="display: block"><input type="hidden" id="hidden"></div>
                                </div>
                            </div>
                        </div>                     
                    </div><br>
                </div>
            </div>
            <div class="box-footer">
                <div class="col-lg-4"></div>
                <div class="col-lg-6">
                    <button type="button"  id="btn_cancel" class="btn btn-default">Cancel</button>
                    <button type="submit" class="btn btn-info">Actualizar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection