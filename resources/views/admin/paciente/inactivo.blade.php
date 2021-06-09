@extends("theme.$theme.layout")
@section('titulo')
    Paciente
@endsection
@section("scripts")
    <script src="{{asset("assets/pages/scripts/datatables/datatables.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/pages/scripts/paciente/estado.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
<div class="page-header">
    <h1>
        Lista del Pacientes Inactivos
    </h1>
</div>
<div class="row">
    <div class="col-xs-12">
        @include('mensajes.correcto')
        @include('mensajes.incorrecto')
        <div class="box-body">
            <table id="tabla" class="table  table-bordered table-hover">
                <thead>
                    <tr>
                        <th style="text-align: center; width: 10%">Exp.</th>
                        <th style="text-align: center; width: 37%">Nombres y Apellidos</th>
                        <th style="text-align: center; width: 15%">N° Carnet</th>                    
                        <th style="text-align: center; width: 13%">Edad</th>
                        <th style="text-align: center; width: 15%">Contacto</th>
                        <th style="text-align: center; width: 10%">Opción</th>                           
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datos as $paciente)
                        <tr>   
                            <td style="text-align: center;">{{$num=MyHelper::num_expediente($paciente->id)}}</td>
                            <td style="text-align: center;">{{$paciente->nombre}} {{$paciente->apellido_p}} {{$paciente->apellido_m}}</td>
                            <td style="text-align: center;">{{$paciente->ci}}</td>
                            <td style="text-align: center;">{{$edad=MyHelper::Edad_Paciente($paciente->fecha_nac,"index")}}</td>
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
                                        <form action="{{route('activar_paciente', ['id' => $paciente->id])}}" class="d-inline form-estado" method="POST" id="form-estado">
                                            @csrf @method("put")
                                            <button type="submit" class="btn btn-success btn-xs eliminar tooltipsC" title="Reincorporar Paciente">
                                                <i class="ace-icon glyphicon glyphicon-ok"></i>
                                            </button>
                                        </form>
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