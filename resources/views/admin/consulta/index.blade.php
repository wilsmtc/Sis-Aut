@extends("theme.$theme.layout")
@section('titulo')
    Consulta
@endsection
@section("scripts")
<script src="{{asset("assets/pages/scripts/alert/alert.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/ficha/validar.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/scripts/datatables/datatables.js")}}" type="text/javascript"></script>
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

        {{$servicio->nombre}}
        {{-- <button class="btn btn-purple pull-right" onclick="location.href='{{route('calendario')}}'">
            <i class="fa fa-calendar"> Agenda de Atención</i>
        </button> --}}
    </h1>
</div>
<div class="row">
    <div class="col-xs-12">
        @include('mensajes.correcto')
        @include('mensajes.error')
        @include('mensajes.incorrecto')


            <div class="box-body">
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
                            <button  class="btn btn-xs btn-primary pull-right"  title="volver" onclick="location.href='{{route('consulta')}}'">
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
                            <th style="text-align: center; width: 10%">hora</th> 
                            <th style="text-align: center; width: 12%">Expediente</th>
                            <th style="text-align: center; width: 36%">Nombres y Apellidos</th>
                            <th style="text-align: center; width: 17%">Edad</th>
                             
                            <th style="text-align: center; width: 10%">Estado</th>
                            <th style="text-align: center; width: 15%">Opción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fichas as $ficha)
                            <tr>
                                <td style="text-align: center;">
                                    @php
                                        $aux =strtotime($ficha->hora);
                                        $hora=date("H:i", $aux);                                        
                                    @endphp
                                    {{$hora}}
                                </td>
                                <td style="text-align: center;">{{$num=MyHelper::num_expediente($ficha->paciente->id)}}</td>
                                <td style="text-align: center;">{{$ficha->paciente->nombre}} {{$ficha->paciente->apellido_p}} {{$ficha->paciente->apellido_m}}</td>
                                <td style="text-align: center;">{{$edad=MyHelper::Edad_Paciente($ficha->paciente->fecha_nac,"index")}}</td>
                                
                                <td style="text-align: center;">
                                    @if($ficha->estado==0)
                                        <span class="label label-lg label-danger arrowed-in arrowed-in-right">En Espera</span>               
                                    @else
                                        @if($ficha->estado==2)
                                            <span class="label label-lg label-danger arrowed-in arrowed-in-right">Faltó</span>               
                                        @else
                                            <span class="label label-lg label-success arrowed-in arrowed-in-right">Atendido</span>
                                        @endif
                                    @endif
                                </td>
                                <td style="text-align: center;">
                                    @if($ficha->estado==0)
                                        <div class="hidden-sm hidden-xs btn-group">  
                                            <form action="{{route('crear_consulta', ['id' => $ficha->id])}}" class="d-inline">
                                                <button type="submit" class="btn btn-info btn-xs tooltipsC" title="pasar a consulta">
                                                    <i class="fa fa-stethoscope"></i>
                                                </button>
                                            </form>
                                        </div>
                                    @else
                                        @if($ficha->estado==1)
                                            <div class="hidden-sm hidden-xs btn-group">  
                                                <form action="{{route('crear_consulta', ['id' => $ficha->id])}}" class="d-inline">
                                                    <button type="submit" class="btn btn-inverse btn-xs tooltipsC" title="pasar a consulta">
                                                        <i class="fa fa-stethoscope"></i>
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

