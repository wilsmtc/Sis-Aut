@extends("theme.$theme.layout")
@section('titulo')
    Internación
@endsection
@section("scripts")
    <script src="{{asset("assets/pages/scripts/alert/alert.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/pages/scripts/datatables/datatables.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/pages/scripts/internacion/camas.js")}}" type="text/javascript"></script>

@endsection
@section('contenido')
<div class="page-header">
    <h1>
        Lista de Internos
        <div class="box-tools pull-right">
            <a href="{{route('internacion_alta')}}" class="btn btn-block btn-info btn-sm">
                <i class="fa fa-bed"></i> Internos dados de alta
            </a>
        </div>
    </h1>
</div>
<div class="row center">
    <div class="hidden-sm hidden-xs btn-group">  
        <button type="button" onclick="location.href='{{route('num_camas', ['dato' => 'mas'])}}'" class="btn btn-xs btn-success" id="btn_mas"><i class="fa fa-fw fa-plus"></i></button>
    </div>
    
    <div class="hidden-sm hidden-xs btn-group">
        <span class="blue"><h3>{{$valor}}</h3> </span>
    </div>
    <div class="hidden-sm hidden-xs btn-group">
        <button type="button" onclick="location.href='{{route('num_camas', ['dato' => 'menos'])}}'"class="btn btn-xs btn-danger" id="btn_menos"><i class="fa fa-fw fa-minus"></i></button>
    </div>
</div>
<div class="row">
    @foreach ($cama_objeto as $cama)
        @if($cama->estado=='libre')
            <div class="col-lg-3" >
                <div class="infobox infobox-green infobox-dark center">
                    <div class="infobox-icon">
                        <i class="ace-icon fa fa-bed zoom "></i>
                    </div>
                    <div class="infobox-data center">
                        <span class="infobox-data-number">{{$cama->orden}}</span>
                        <h4><div class="infobox-content">{{$cama->estado}}</div></h4> 
                    </div>
                    <div class="badge badge-danger">
                            <a href="{{route('mantenimiento_cama', ['id' => $cama->orden, 'estado'=>'mantenimiento'])}}" class="white">M</a>           
                    </div>
                </div>
            </div> 
        @else
            @if ($cama->estado=='mantenimiento')
                <div class="col-lg-3" >
                    <div class="infobox infobox-orange infobox-dark center">
                        <div class="infobox-icon">
                            <i class="ace-icon fa fa-bed zoom "></i>
                        </div>
                        <div class="infobox-data center">
                            <span class="infobox-data-number">{{$cama->orden}}</span>
                            <h4><div class="infobox-content">{{$cama->estado}}</div></h4> 
                        </div>
                        <div class="badge badge-danger">
                            <a href="{{route('mantenimiento_cama', ['id' => $cama->orden, 'estado'=>'libre'])}}" class="white"><i class="fa fa-check"></i></a>           
                        </div>
                    </div>
                </div>
            @else
                <div class="col-lg-3" >
                    <div class="infobox infobox-red infobox-dark center">
                        <div class="infobox-icon">
                            <i class="ace-icon fa fa-bed zoom "></i>
                        </div>
                        <div class="infobox-data center">
                            <span class="infobox-data-number">{{$cama->orden}}</span>
                            <h4><div class="infobox-content">{{$cama->estado}}</div></h4> 
                        </div>
                    </div>
                </div>    
            @endif
            
        @endif   
    @endforeach
    
</div>
<div class="row">
    <div class="col-xs-12">
        @include('mensajes.correcto')
        @include('mensajes.incorrecto')
        <div class="box-body">
            <table id="tabla" class="table  table-bordered table-hover">
                <thead>
                    <tr>
                        <th style="text-align: center; width: 15%">Cama</th>
                        <th style="text-align: center; width: 15%">F. Ingreso</th>
                        <th style="text-align: center; width: 35%">Paciente</th>
                        <th style="text-align: center; width: 20%">Núm Emergencia</th>
                        <th style="text-align: center; width: 15%">Opción</th>                           
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datos as $interno)
                        <tr>
                            <td style="text-align: center">{{$interno->cama}}</td>
                            <td style="text-align: center">{{$interno->fecha_ingreso}}</td>
                            <td style="text-align: center">{{$interno->paciente->nombre}} {{$interno->paciente->apellido_p}} {{$interno->paciente->apellido_m}}</td>
                            <td style="text-align: center">
                                @if ($interno->contacto_emergencia==null)
                                    <span class="red">No Registrado</span>
                                @else
                                    {{$interno->contacto_emergencia}}
                                @endif  
                            </td>
                            <td style="text-align: center;">
                                @if(Auth::user()->rol->editar == 1)
                                    <div class="hidden-sm hidden-xs btn-group">                                    
                                        <button onclick="location.href='{{route('editar_internacion', ['id' => $interno->id])}}'" class="btn btn-xs btn-warning" title="Editar interno">
                                            <i class="ace-icon fa fa-pencil bigger-120"></i>
                                        </button>
                                    </div>
                                @endif
                                <div class="hidden-sm hidden-xs btn-group">  
                                    <form action="{{route('imprimir_internacion', ['id' => $interno->id])}}" class="d-inline" target="{{$interno->id}}">
                                        <button type="submit" class="btn btn-success btn-xs eliminar tooltipsC" title="Imprimir entrada">
                                            <i class="fa fa-fw fa-download"></i>
                                        </button>
                                    </form>
                                </div>
                                @if(Auth::user()->rol->añadir == 1)
                                    <div class="hidden-sm hidden-xs btn-group">                                    
                                        <button onclick="location.href='{{route('alta', ['id' => $interno->id])}}'" class="btn btn-xs btn-danger" title="solicitar alta">
                                            <i class="ace-icon fa fa-bed bigger-120"></i>
                                        </button>
                                    </div>
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