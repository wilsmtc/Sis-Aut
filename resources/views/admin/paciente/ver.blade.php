@extends("theme.$theme.layout")
@section('titulo')
	Expediente
@endsection
@section("scripts")
    <script src="{{asset("assets/pages/scripts/datatables/datatables.js")}}" type="text/javascript"></script>
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
                                    @if($paciente->celular==null)
                                        No Registrado
                                    @else
                                        {{$paciente->celular}}
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
                        {{-- <div class="profile-info-row">
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
                        </div> --}}
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
        <div class="col-lg-12">
            @if ($SVM==null)
            <div class="form-group" id="content">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="alert alert-info">
                        <strong>Atención! </strong> este paciente no tiene consultas registradas
                        <br />
                    </div>
                </div>
            </div>
            @else
                <div class="center">
                <span class="blue center">Signos Vitales de su ultima consulta</span>  
                </div>
                <div style="text-align: ">
                    <table class="table-bordered table-hover" >
                        <tr style="background: rgb(237, 243, 247)">
                            <th style="text-align: center; width: 14%"><i class="glyphicon glyphicon-arrow-up" style="color: darkviolet"></i> Altura</th>
                            <th style="text-align: center; width: 14%"><i class="fa fa-tachometer" style="color: rgb(100, 149, 237)"></i> Peso</th>
                            {{-- <th style="text-align: center; width: 14%"><i class="glyphicon glyphicon-piggy-bank" style="color: rgb(60, 196, 89)"></i> IMC</th> --}}
                            <th style="text-align: center; width: 16%"><i class="glyphicon glyphicon-fire" style="color: rgb(240, 161, 15)"></i> Temperatura</th>
                            <th style="text-align: center; width: 14%"><i class="glyphicon glyphicon-time blue"></i> P.A.</th>
                            <th style="text-align: center; width: 14%"><i class="glyphicon glyphicon-heart-empty" style="color: red"></i> F.C</th>
                            <th style="text-align: center; width: 14%"><i class="glyphicon glyphicon-flash" style="color: saddlebrown"></i> F.R</th>
                        </tr>
                        <tr>
                            <td style="text-align: center;" ><i>
                                @if ($SVM->altura==null)
                                    <span class="red">Sin registro</span>
                                @else
                                    {{$SVM->altura}} cm
                                @endif     
                            </i></td>
                            <td style="text-align: center;" ><i>
                                @if ($SVM->peso==null)
                                    <span class="red">Sin registro</span>
                                @else
                                    {{$SVM->peso}} kg
                                @endif     
                            </i></td>
                            <td style="text-align: center;" ><i>
                                @if ($SVM->temperatura==null)
                                    <span class="red">Sin registro</span>
                                @else
                                    {{$SVM->temperatura}} °C
                                @endif     
                            </i></td>
                            <td style="text-align: center;" ><i>
                                @if ($SVM->p_a==null)
                                    <span class="red">Sin registro</span>
                                @else
                                    {{$SVM->p_a}} mmHg
                                @endif     
                            </i></td>
                            <td style="text-align: center;" ><i>
                                @if ($SVM->f_c==null)
                                    <span class="red">Sin registro</span>
                                @else
                                    {{$SVM->f_c}} lat/min
                                @endif     
                            </i></td>
                            <td style="text-align: center;" ><i>
                                @if ($SVM->f_r==null)
                                    <span class="red">Sin registro</span>
                                @else
                                    {{$SVM->f_r}} r/m
                                @endif     
                            </i></td>
                        </tr>
                    </table>   
                </div>
                
                <h4 class="center" style="color: rgb(36, 95, 129)">Lista de sus Consultas
                    <form action="{{route('ver_expediente', ['id' => $paciente->id])}}" target="{{$paciente->id}}">
                        <button class="btn btn-inverse btn-lg tooltipsC pull-right" type="submit" title="ver expediente"><i class="fa fa-folder-open-o"> Abrir Expediente</i></button>
                    </form>
                </h4>
                    
                    <table id="tabla" class="table  table-bordered table-hover">
                        <thead>
                            <tr style="background: rgb(239, 245, 209)">
                                <th  style="text-align: center; width:10%"> <u>Fecha</u></th>
                                <th  style="text-align: center; width:32%"> <u>Motivo</u></th>
                                <th  style="text-align: center; width:32%"> <u>Diagnóstico</u></th>
                                <th  style="text-align: center; width:9%"> <u>Receta</u></th>
                                <th  style="text-align: center; width:8%"> <u>E.G.</u></th>
                                <th  style="text-align: center; width:9%"> <u>Opción</u></th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($datos as $consulta)                         
                             <tr>
                                <td style="text-align: center;">
                                    {{$consulta["fecha"]}}
                                </td>
                                <td style="text-align: center;">
                                    {{$consulta["motivo"]}}
                                </td>
                                <td style="text-align: center;">
                                    {{$consulta["diagnostico"]}}
                                </td>
                                <td style="text-align: center;">
                                    @if($consulta["receta_id"]!="no")
                                        <span class="badge badge-success"><i class="ace-icon glyphicon glyphicon-ok"></i></span>
                                    @else
                                        <span class="badge badge-danger"><i class="ace-icon glyphicon glyphicon-remove"></i></span>
                                    @endif
                                </td>
                                <td style="text-align: center;">
                                    @if($consulta["gabinete_id"]!="no")
                                        <span class="badge badge-success"><i class="ace-icon glyphicon glyphicon-ok"></i></span>
                                    @else
                                        <span class="badge badge-danger"><i class="ace-icon glyphicon glyphicon-remove"></i></span>
                                    @endif
                                </td>
                                <td style="text-align: center;">
                                    <form action="{{route('consulta_paciente', ['id' => $consulta["consulta_id"]])}}" target="{{$consulta["consulta_id"]}}">
                                        <button class="btn btn-inverse btn-xs tooltipsC" type="submit" title="ver consulta"><i class="fa fa-file-pdf-o"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </Table>    
            @endif    
        </div>
        
        
    </div>
@endsection