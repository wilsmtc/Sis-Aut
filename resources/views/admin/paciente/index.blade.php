@extends("theme.$theme.layout")
@section('titulo')
    Paciente
@endsection
@section("scripts")
<script src="{{asset("assets/pages/scripts/paciente/estado.js")}}" type="text/javascript"></script>
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
        Lista del Pacientes 
        @if(Auth::user()->rol->añadir == 1)      
            <div class="box-tools pull-right">
                <a href="{{route('crear_paciente')}}" class="btn btn-block btn-success btn-sm">
                    <i class="fa fa-fw fa-plus-circle"></i> Crear Paciente
                </a>
            </div>
        @endif
    </h1>
</div>
<div class="row">
    <div class="col-xs-12">
        @include('mensajes.correcto')
        @include('mensajes.incorrecto')
        <div class="col-xs-12">
            <form class="form-inline ml-3">
                <div class="col-xs-3">               
                    Buscar Por:     
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
        @if($search)
            @if ($datos->count()==0)
                <div class="col-xs-12">                
                    <div class="alert alert-danger">                    
                        <i class="ace-icon fa fa-hand-o-right"></i>
                        No hay resultados para: <b>'{{$search}}'</b>
                        <a href="{{route('paciente')}}" class="ver-curriculum btn btn-primary btn-xs tooltipC pull-right" title="volver">
                            <i class="fa fa-fw fa-reply-all"></i>																			
                        </a>	
                    </div>
                </div> 
            @else
                <div class="col-xs-12">                
                    <div class="alert alert-info">                    
                        <i class="ace-icon fa fa-hand-o-right"></i>
                        Los resultados de tu busqueda <b>'{{$search}}'</b> son:
                        <a href="{{route('paciente')}}" class="ver-curriculum btn btn-primary btn-xs tooltipC pull-right" title="volver">
                            <i class="fa fa-fw fa-reply-all"></i>																			
                        </a>	
                    </div>
                </div>    
            @endif
            
        @endif


        <div class="box-body">
            <table id="tabla" class="table  table-bordered table-hover">
                <thead>
                    <tr>   
                        <form action="{{route('ordenar_paciente')}}" method="POST" name="form2">
                            <th style="text-align: center; width: 12%">Expediente 
                                @csrf
                                <input type="hidden" id="id" name="id" value=3>
                                <input type="hidden" id="search" name="search" value="{{old('search', $search ?? '')}}">
                                <input type="hidden" id="selec" name="selec" value="{{$seleccion}}" >
                                <button  type="submit" class="pull-right" style="border: 0">
                                    @if($columna==3)
                                        <i class="glyphicon glyphicon-triangle-bottom pull-right" style="color: rgb(11, 102, 155)"></i>
                                    @else
                                        <i class="glyphicon glyphicon-sort pull-right" ></i>
                                    @endif
                                </button>
                            </th>
                        </form>

                        <form action="{{route('ordenar_paciente')}}" method="POST" name="form2">
                            <th style="text-align: center; width: 36%">Nombres y Apellidos
                                @csrf
                                <input type="hidden" id="id" name="id" value=1>
                                <input type="hidden" id="search" name="search" value="{{old('search', $search ?? '')}}">
                                <input type="hidden" id="selec" name="selec" value="{{$seleccion}}" >
                                <button  type="submit" class="pull-right" style="border: 0">
                                    @if($columna==1)
                                        <i class="glyphicon glyphicon-triangle-bottom pull-right" style="color: rgb(11, 102, 155)"></i>
                                    @else
                                        <i class="glyphicon glyphicon-sort pull-right" ></i>
                                    @endif
                                </button>
                            </th>
                        </form>

                        <form action="{{route('ordenar_paciente')}}" method="POST" name="form2">
                            <th style="text-align: center; width: 12%">N° Carnet
                                @csrf
                                <input type="hidden" id="id" name="id" value=2>
                                <input type="hidden" id="search" name="search" value="{{old('search', $search ?? '')}}">
                                <input type="hidden" id="selec" name="selec" value="{{$seleccion}}" >
                                <button  type="submit" class="pull-right" style="border: 0">
                                    @if($columna==2)
                                        <i class="glyphicon glyphicon-triangle-bottom pull-right" style="color: rgb(11, 102, 155)"></i>
                                    @else
                                        <i class="glyphicon glyphicon-sort pull-right" ></i>
                                    @endif
                                </button>
                            </th>
                        </form>

                        

                        <form action="{{route('ordenar_paciente')}}" method="POST" name="form2">
                            <th style="text-align: center; width: 9%">Edad 
                                @csrf
                                <input type="hidden" id="id" name="id" value=4>
                                <input type="hidden" id="search" name="search" value="{{old('search', $search ?? '')}}">
                                <input type="hidden" id="selec" name="selec" value="{{$seleccion}}" >
                                <button  type="submit" class="pull-right" style="border: 0">
                                    @if($columna==4)
                                        <i class="glyphicon glyphicon-triangle-bottom pull-right" style="color: rgb(11, 102, 155)"></i>
                                    @else
                                        <i class="glyphicon glyphicon-sort pull-right" ></i>
                                    @endif
                                </button>
                            </th>
                        </form>

                        <form action="{{route('ordenar_paciente')}}" method="POST" name="form2">
                            <th style="text-align: center; width: 10%">Contacto
                                @csrf
                                <input type="hidden" id="id" name="id" value=5>
                                <input type="hidden" id="search" name="search" value="{{old('search', $search ?? '')}}">
                                <input type="hidden" id="selec" name="selec" value="{{$seleccion}}" >
                                <button  type="submit" class="pull-right" style="border: 0">
                                    @if($columna==5)
                                        <i class="glyphicon glyphicon-triangle-bottom pull-right" style="color: rgb(11, 102, 155)"></i>
                                    @else
                                        <i class="glyphicon glyphicon-sort pull-right" ></i>
                                    @endif
                                </button>
                            </th>
                        </form>

                        <th style="text-align: center; width: 11%">Opción</th>                           
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datos as $paciente)
                        <tr>
                            <td style="text-align: center;">{{$num=MyHelper::num_expediente($paciente->id)}}</td>
                            <td style="text-align: center;">{{$paciente->apellido_p}} {{$paciente->apellido_m}} {{$paciente->nombre}} </td>
                            <td style="text-align: center;">{{$paciente->ci}}</td>      
                            <td style="text-align: center;">{{$edad=MyHelper::Edad_Paciente($paciente->fecha_nac,"index")}}</td>
                            {{-- <td style="text-align: center;">
                                @if($paciente->t_sangre==null)
                                    <span class="red">No registrado</span>
                                @else
                                    {{$paciente->t_sangre}}
                                @endif
                            </td>  --}}
                            <td style="text-align: center;">
                                @if($paciente->celular==null)
                                    <span class="red">No registrado</span>
                                @else
                                    {{$paciente->celular}}
                                @endif
                            </td>                  
                            <td style="text-align: right;">
                                <div class="hidden-sm hidden-xs btn-group">                                    
                                    <button onclick="location.href='{{route('ver_paciente', ['id' => $paciente->id])}}'" class="btn btn-xs btn-info" title="ver Paciente">
                                        <i class="ace-icon fa fa-plus bigger-120"></i>
                                    </button>
                                </div>
                                @if(Auth::user()->rol->editar == 1)
                                    <div class="hidden-sm hidden-xs btn-group">                                    
                                        <button onclick="location.href='{{route('editar_paciente', ['id' => $paciente->id])}}'" class="btn btn-xs btn-warning" title="editar Paciente">
                                            <i class="ace-icon fa fa-pencil bigger-120"></i>
                                        </button>
                                    </div>
                                @endif
                                @if(Auth::user()->rol->eliminar == 1)    
                                    <div class="hidden-sm hidden-xs btn-group">  
                                        <form action="{{route('inactivar_paciente', ['id' => $paciente->id])}}" class="d-inline form-estado" method="POST" id="form-estado">
                                            @csrf @method("put")
                                            <button type="submit" class="btn btn-danger btn-xs eliminar tooltipsC" title="dar de baja personal">
                                                <i class="fa fa-fw fa-ban"></i>
                                            </button>
                                        </form>
                                    </div>
                                @endif                       
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$datos->links()}}
        </div>
    </div>
</div>
@endsection