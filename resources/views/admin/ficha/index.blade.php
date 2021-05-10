@extends("theme.$theme.layout")
@section('titulo')
    Ficha
@endsection
@section("scripts")
    <script src="{{asset("assets/pages/scripts/alert/alert.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/pages/scripts/datatables/datatables.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/pages/scripts/ficha/validar.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
@if(Auth::user()->rol->añadir == 1)
    <span class="blue"><h3>Lista De Servicios</h3></span>
    <div class="row">
        <div class="col-xs-12">
            <div style="text-align: center">   
                <ul class="ace-thumbnails clearfix">
                    @foreach ($servicios as $servicio)
                        <div class="ace-thumbnails clearfix col-lg-2">
                            <span class="blue"><b>{{$servicio->nombre}}</b></span><br>
                            <li>       
                                <a href="{{route('crear_ficha', ['id' => $servicio->id])}}" data-rel="colorbox">
                                    @if($servicio->foto==null)
                                        <img width="170" height="120"  src="{{asset("assets/$theme/assets/images/avatars/servicio.jpg")}}" />                                  
                                    @else
                                        <img width="170" height="120"  src="{{Storage::url("datos/fotos/servicio/$servicio->foto")}}" />                                  
                                    @endif
                                    <div class="text">
                                        <div class="inner">Registrar {{$servicio->nombre}}</div>
                                    </div>
                                </a>
                            </li>
                        </div>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif
@php
    setlocale(LC_ALL,"es_CO.utf8");
    $data =strtotime($fecha_actual);
    $formato_fecha = strtolower(strftime("%A %d de %B", $data));

    $aux = new \DateTime();
    $aux=$aux->format('Y-m-d');
@endphp
    <span class="blue center"><h3>Nómina de atención para: {{$formato_fecha}}  
        <button  class="btn btn-xs btn-info pull-right" data-toggle="modal" data-target="#VerFecha" title="ir a fecha">
            <i class="fa fa-calendar bigger-120"> ver fecha</i>
        </button>
        @if($aux!=$fecha_actual)
            <button  class="btn btn-xs btn-primary pull-right"  title="volver" onclick="location.href='{{route('ficha')}}'">
                <i class="fa fa-fw fa-reply-all bigger-120"></i>
            </button>
        @endif       
    </h3></span>
    <div class="modal modal-info fade in" id="VerFecha" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content" style="background: rgb(185, 185, 185)">
                <div class="modal-header " style="background: rgb(95, 95, 104)">
                    <button type="button" class="white close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="white modal-title" style="text-align: center"><b>Ver Por Fecha</b></h4>
                </div>
                <form class="form-horizontal">              
                    <div class="modal-body">                     
                        <div class="profile-info-row">
                            <div class="profile-info-name"><u>Fecha</u>:</div>
                            <div class="profile-info-value">
                                <input type="date" name="ver_fecha" id="ver_fecha" class="form-control" value="{{old('ver_fecha',$aux)}}" required/>		
                            </div>
                        </div>                   
                    </div>
                    <div class="modal-footer" style="background: rgb(88, 88, 97)">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Mostrar</button>
                   
                    </div>
                </form>
            </div>
        </div>
    </div>


<div class="row">
    <div class="col-xs-12">
        @include('mensajes.correcto')
        @include('mensajes.incorrecto')
        <div class="box-body">
            <table id="tabla" class="table  table-bordered table-hover">
                <thead>
                    <tr>
                        <th style="text-align: center; width: 8%">Exp.</th>
                        <th style="text-align: center; width: 25%">Paciente</th>
                        <th style="text-align: center; width: 20%">Especialidad</th>
                        <th style="text-align: center; width: 20%">Edad</th>
                        <th style="text-align: center; width: 9%">hora</th>  
                        <th style="text-align: center; width: 9%">Estado</th>
                        <th style="text-align: center; width: 9%">Opción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datos as $ficha)
                        <tr>
                            <td style="text-align: center;">{{$ficha->paciente->id}}</td>
                            <td style="text-align: center;">{{$ficha->paciente->nombre}} {{$ficha->paciente->apellido_p}} {{$ficha->paciente->apellido_m}}</td>
                            <td style="text-align: center;">{{$ficha->servicio->nombre}}</td>
                            <td style="text-align: center;">{{$edad=MyHelper::Edad_Paciente($ficha->paciente->fecha_nac,"index")}}</td>       
                            <td style="text-align: center;">
                                @php
                                    $aux =strtotime($ficha->hora);
                                    $hora=date("H:i", $aux);                                        
                                @endphp
                                {{$hora}}
                            </td>                 
                            <td style="text-align: center;">
                                @if($ficha->estado==0)
                                    <span class="label label-lg label-danger arrowed-in arrowed-in-right">En Espera</span>               
                                @else
                                    <span class="label label-lg label-success arrowed-in arrowed-in-right">Atendido</span>
                                @endif
                            </td>
                            <td style="text-align: center;">
                                @if(Auth::user()->rol->editar == 1)
                                    @if($ficha->estado==0)
                                        <div class="hidden-sm hidden-xs btn-group">                                    
                                            <button  class="btn btn-xs btn-warning" data-toggle="modal" data-target="#EditarFicha{{$ficha->id}}" title="registrar ficha">
                                                <i class="fa fa-wrench bigger-120"></i>
                                            </button>
                                            <div class="modal modal-info fade in" id="EditarFicha{{$ficha->id}}" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content" style="background: rgb(185, 185, 185)">
                                                        <div class="modal-header " style="background: rgb(95, 95, 104)">
                                                            <button type="button" class="white close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            <h4 class="white modal-title" style="text-align: center"><b>Editar Ficha</b></h4>
                                                        </div>
                                                        <form class="form-horizontal" action="{{route('actualizar_ficha', ['id' => $ficha->id])}}" id="form-general" method="POST">
                                                            @csrf @method("put")
                                                            <div class="modal-body">
                                                                @php
                                                                    $paciente=MyHelper::Datos_Paciente($ficha->paciente_id);
                                                                    $servicio=MyHelper::Datos_Servicio($ficha->servicio_id);
                                                                @endphp
                                                                @include('admin.ficha.form')
                                                            
                                                            </div>
                                                            <div class="modal-footer" style="background: rgb(88, 88, 97)">
                                                                @include('botones.actualizar')
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                                @if(Auth::user()->rol->eliminar == 1) 
                                    @if($ficha->estado==0)
                                        <div class="hidden-sm hidden-xs btn-group">  
                                            <form action="{{route('eliminar_ficha', ['id' => $ficha->id])}}" class="d-inline form-eliminar " method="POST" id="form-eliminar">
                                                @csrf @method("delete")
                                                <button type="submit" class="btn btn-danger btn-xs eliminar tooltipsC" title="Eliminar Ficha">
                                                    <i class="fa fa-fw fa-close"></i>
                                                </button>
                                            </form>
                                        </div> 
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection