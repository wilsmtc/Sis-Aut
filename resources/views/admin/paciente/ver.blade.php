@extends("theme.$theme.layout")
@section('titulo')
	Expediente
@endsection
@section('contenido')
    <div class="page-header">
        <h1>
           Expediente Clínico
           <div class="box-tools pull-right">
            <a href="{{route('paciente')}}" class="btn btn-block btn-info btn-sm">
                <i class="fa fa-fw fa-reply-all"></i> Volver
            </a>
            </div>&nbsp;&nbsp;
        </h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            @include('mensajes.correcto')
            @include('mensajes.incorrecto')
            <div class="col-xs-12 col-sm-2 center">
                <div>
                    <span class="profile-picture">
                        @if ($paciente->foto==null)
                        <img src="{{asset("assets/$theme/assets/images/avatars/usuario.jpg")}}" height="155px" width="145px"/>
                        @else
                        <img src="{{Storage::url("datos/fotos/paciente/$paciente->foto")}}" height="155px" width="145px"/>
                        @endif
                    </span>
                </div>
            </div>
            <div class="col-xs-12 col-sm-5">
                <div class="">
                    <div class="profile-user-info profile-user-info-striped">
                        <div class="profile-info-row">
                            <div class="profile-info-name"><u>Nombre</u>:</div>
                            <div class="profile-info-value">
                                <span class="editable"><i>{{$paciente->nombre}} {{$paciente->apellido_p}} {{$paciente->apellido_m}}</i></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"><u>N° Carnet</u>:</div>
                            <div class="profile-info-value">
                                <span class="editable"><i>{{$paciente->ci}}</i></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"><u>Dirección</u>:</div>
                            <div class="profile-info-value">
                                <span class="editable"><i>
                                    @if($paciente->direccion==null)
                                        No Registrado
                                    @else
                                        {{$paciente->direccion}}
                                    @endif
                                </i></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"><u>N° de Contacto</u>:</div>
                            <div class="profile-info-value">
                                <span class="editable"><i>
                                    @if($paciente->celular==null)
                                        No Registrado
                                    @else
                                        {{$paciente->celular}}
                                    @endif
                                </i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-5">
                <div class="">
                    <div class="profile-user-info profile-user-info-striped">
                        <div class="profile-info-row">
                            <div class="profile-info-name"><u>Teléfono</u>:</div>
                            <div class="profile-info-value">
                                <span class="editable"><i>
                                    @if($paciente->telefono==null)
                                        No Registrado
                                    @else
                                        {{$paciente->telefono}}
                                    @endif
                                </i></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"><u>Genero</u>:</div>
                            <div class="profile-info-value">
                                <span class="editable"><i>{{$paciente->genero}}</i></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"><u>Tipo de Sangre</u>:</div>
                            <div class="profile-info-value">
                                <span class="editable"><i>
                                    @if($paciente->t_sangre==null)
                                        No Registrado
                                    @else
                                        {{$paciente->t_sangre}}
                                    @endif
                                </i></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"><u>Edad</u>:</div>
                            <div class="profile-info-value">
                                <span class="editable"><i>{{$edad=MyHelper::Edad_Paciente($paciente->fecha_nac,"completo")}}</i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <table id="tabla-data" class="table  table-bordered table-hover" >
            <tr style="background: rgb(237, 243, 247)">
                <th style="text-align: center; width: 14%"><i class="glyphicon glyphicon-arrow-up" style="color: darkviolet"></i> Altura</th>
                <th style="text-align: center; width: 14%"><i class="fa fa-tachometer" style="color: rgb(100, 149, 237)"></i> Peso</th>
                <th style="text-align: center; width: 14%"><i class="glyphicon glyphicon-piggy-bank" style="color: rgb(60, 196, 89)"></i> IMC</th>
                <th style="text-align: center; width: 16%"><i class="glyphicon glyphicon-fire" style="color: rgb(240, 161, 15)"></i> Temperatura</th>
                <th style="text-align: center; width: 14%"><i class="glyphicon glyphicon-time blue"></i> P.A.</th>
                <th style="text-align: center; width: 14%"><i class="glyphicon glyphicon-heart-empty" style="color: red"></i> F.C</th>
                <th style="text-align: center; width: 14%"><i class="glyphicon glyphicon-flash" style="color: saddlebrown"></i> F.R</th>
            </tr>
            <tr>
                <td style="text-align: center;" id="alto"><i>1,70 m</i></td>
                <td style="text-align: center;" id="alto"><i>75 kg</i></td>
                <td style="text-align: center;" id="alto"><i>0.0 mb</i></td>
                <td style="text-align: center;" id="alto"><i>36° C</i></td>
                <td style="text-align: center;" id="alto"><i>120/70</i></td>
                <td style="text-align: center;" id="alto"><i></i>100 f.c</td>
                <td style="text-align: center;" id="alto"><i></i>12 r/m</td>
            </tr>
        </table>
    </div>
@endsection