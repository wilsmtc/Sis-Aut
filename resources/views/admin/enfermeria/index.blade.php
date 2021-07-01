@extends("theme.$theme.layout")
@section('titulo')
    Enfermeria
@endsection
@section("scripts")
    <script src="{{asset("assets/pages/scripts/alert/alert.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/pages/scripts/datatables/datatables.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/pages/scripts/enfermeria/validar.js")}}" type="text/javascript"></script>
    <script>
        function mostrar(id) {
            console.log(id);
            if (id !=null) {
                $("#buscar").show();
            }
            else
                $("#buscar").hide();
        }
    </script>
@endsection
@section('contenido')
<div class="page-header">
    <h1>
        Registro de Enfermeria
    </h1>
</div>
<div class="row">
    <div class="col-xs-12">
        @include('mensajes.correcto')
        @include('mensajes.incorrecto')
        <div class="col-xs-12">
            <form class="form-inline ml-3">
                <div class="col-xs-4">               
                    Buscar Paciente Por:     
                    <select id="seleccion" name="seleccion" onChange=mostrar(this.value);>
                        
                        <option value="">Elija una Opción</option>
                        <option value="apellido_p">Apellido Paterno</option>
                        <option value="apellido_m">Apellido Materno</option>
                        <option value="ci">N° de Carnet</option>
                        <option value="id">N° de Expediente</option>
                        <option value="celular">Telf/Cel</option>              
                    </select>               
                </div>

                <div class="col-xs-4">
                    <div id="buscar" style="display: none;">
                        <div class="input-group">
                            <input type="search" name="search" class="form-control" placeholder="Buscar..." aria-label="search" value="{{$search}}" autocomplete="off">						
                            <span class="input-group-btn">							
                                <button type="submit" class="btn btn-flat">                
                                    <i class="fa fa-search"></i>
                                </button>                  
                            </span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        @if($datos_pac)
            @if ($datos_pac->count()==0)
                <div class="col-xs-12">                
                    <div class="alert alert-danger">                    
                        <i class="ace-icon fa fa-hand-o-right"></i>
                        Busqueda sin resultados	
                        <a href="{{route('enfermeria')}}" class="ver-curriculum btn btn-primary btn-xs tooltipC pull-right" title="volver">
                            <i class="fa fa-fw fa-reply-all"></i>																			
                        </a>
                    </div>
                </div>
                @if(Auth::user()->rol->añadir == 1)      
                    <div class="box-tools">
                        <a href="{{route('crear_paciente')}}" class="btn btn-block btn-success btn-xl">
                            <i class="fa fa-fw fa-plus-circle"></i> registrar Nuevo Paciente
                        </a>
                    </div>
                @endif
            @else
                <div class="col-xs-12">                
                    <div class="alert alert-info">                    
                        <i class="ace-icon fa fa-hand-o-right"></i>
                        Los resultados de tu busqueda <b>'{{$search}}'</b> son:
                        <a href="{{route('enfermeria')}}" class="btn btn-primary btn-xs tooltipC pull-right" title="volver">
                            <i class="fa fa-fw fa-reply-all"></i>																			
                        </a>	
                    </div>
                </div>
                <span class="blue center"><h3>Resultados </h3></span>
                <div class="box-body">
                    <table id="tabla" class="table  table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="text-align: center; width: 10%">Expediente</th>
                                <th style="text-align: center; width: 50%">Nombres y Apellidos</th>
                                <th style="text-align: center; width: 10%">N° de Carnet</th>
                                <th style="text-align: center; width: 10%">Edad</th>
                                <th style="text-align: center; width: 10%">Opción</th>                           
                            </tr>
                        </thead>               
                            <tbody>
                                @foreach ($datos_pac as $paciente)
                                    <tr>
                                        <td style="text-align: center;">{{$num=MyHelper::num_expediente($paciente->id)}}</td>
                                        <td style="text-align: center;">{{$paciente->nombre}} {{$paciente->apellido_p}} {{$paciente->apellido_m}}</td>
                                        <td style="text-align: center;">{{$paciente->ci}}</td>
                                        <td style="text-align: center;">{{$edad=MyHelper::Edad_Paciente($paciente->fecha_nac,"index")}}</td>
                                        <td style="text-align: center;">
                                            <div class="hidden-sm hidden-xs btn-group"> 
                                                @if(Auth::user()->rol->añadir == 1)      
                                                    <div class="box-tools pull-right">
                                                        <a href="{{route('crear_enfermeria', ['id' => $paciente->id])}}" class="btn btn-block btn-success btn-sm">
                                                            <i class="fa fa-fw fa-plus-circle"></i>
                                                        </a>
                                                    </div>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
            @endif                 
        @else
            <div class="box-body">
                @php
                    setlocale(LC_ALL,"es_CO.utf8");
                    $data =strtotime($fecha_actual);
                    $formato_fecha = strtolower(strftime("%A %d de %B", $data));

                    $aux = new \DateTime();
                    $aux=$aux->format('Y-m-d');
                @endphp
                    <span class="blue center"><h3>Registro de atención para: {{$formato_fecha}}  
                        @if(Auth::user()->rol->añadir == 1)      
                            <div class="box-tools pull-left">
                                <a href="{{route('crear_paciente')}}" class="btn btn-block btn-success btn-xs">
                                    <i class="fa fa-fw fa-plus-circle"></i> Crear Paciente
                                </a>
                            </div>
                        @endif
                        <button  class="btn btn-xs btn-info pull-right" data-toggle="modal" data-target="#VerFecha" title="ir a fecha">
                            <i class="fa fa-calendar bigger-120"> ver fecha</i>
                        </button>
                        @if($aux!=$fecha_actual)
                            <button  class="btn btn-xs btn-primary pull-right"  title="volver" onclick="location.href='{{route('enfermeria')}}'">
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
                                        <button type="submit" class="btn btn-success">Mostrar</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> 
                <table id="tabla" class="table  table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="col-lg-1" style="text-align: center;">Orden</th>
                            <th class="col-lg-5" style="text-align: center;">Nombres y Apellidos</th>
                            <th class="col-lg-2" style="text-align: center;">Edad</th>    
                            <th class="col-lg-3" style="text-align: center;">Atención</th> 
                            <th class="col-lg-1" style="text-align: center;">Opción</th>                        
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $cont=1;
                        @endphp
                        @foreach ($datos_enf as $enf)
                            <tr>
                                <td style="text-align: center;">{{$cont}}</td>
                                <td>{{$enf->paciente->nombre}} {{$enf->paciente->apellido_p}} {{$enf->paciente->apellido_m}}</td>
                                <td style="text-align: center;">{{$edad=MyHelper::Edad_Paciente($enf->paciente->fecha_nac,"index")}}</td>
                                <td>
                                    @if ($enf->atencion_c==1)
                                        <span class="red">- Curación</span>                    
                                    @endif
                                    @if ($enf->atencion_i==1)
                                        <span class="blue">- Inyectable</span>                    
                                    @endif
                                    @if ($enf->atencion_s==1)
                                        <span class="green">- Suero</span>                    
                                    @endif
                                </td>
                                <td style="text-align: center;">
                                    @if($enf->fecha==$aux)
                                        @if(Auth::user()->rol->editar == 1)
                                            <div class="hidden-sm hidden-xs btn-group">                                    
                                                <button onclick="location.href='{{route('editar_enfermeria', ['id' => $enf->id])}}'" class="btn btn-xs btn-warning" title="editar registro">
                                                    <i class="ace-icon fa fa-pencil bigger-120"></i>
                                                </button>
                                            </div>
                                        @endif
                                        @if(Auth::user()->rol->eliminar == 1)    
                                            <div class="hidden-sm hidden-xs btn-group">  
                                                <form action="{{route('eliminar_enfermeria', ['id' => $enf->id])}}" class="d-inline form-eliminar " method="POST" id="form-eliminar" title="Eliminar registro">
                                                    @csrf @method("delete")
                                                    <button type="submit" class="btn btn-danger btn-xs eliminar tooltipsC" title="Eliminar Unidad">
                                                        <i class="fa fa-fw fa-close"></i>
                                                    </button>
                                                </form>
                                            </div> 
                                        @endif 
                                    @endif                      
                                </td>
                            </tr>
                            @php
                                $cont++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection