@extends("theme.$theme.layout")
@section('titulo')
Consulta
@endsection
@section("scripts")
  <script src="{{asset("assets/pages/scripts/consulta/consulta.js")}}" type="text/javascript"></script>
  <script src="{{asset("assets/pages/scripts/consulta/receta_input.js")}}" type="text/javascript"></script>
  <script src="{{asset("assets/pages/scripts/consulta/receta.js")}}" type="text/javascript"></script>
  <script src="{{asset("assets/pages/scripts/consulta/gabinete.js")}}" type="text/javascript"></script>
  <script src="{{asset("assets/pages/scripts/consulta/historial.js")}}" type="text/javascript"></script>
    @endsection
@section('contenido')
<div class="row">
  <div class="col-xs-12">
    <div class="center page-header">
      <h1>
         Atención Medica
         <button class="btn btn-pink pull-right" onclick="location.href='{{route('terminar_consulta', ['id' => $ficha->id])}}'"><i class="fa fa-save"> Terminar Consulta</i></button>
         <button class="btn btn-inverse pull-right" onclick="location.href='{{route('crear_internacion', ['id' => $ficha->id])}}'"><i class="fa fa-bed"> Pasar a Internación</i></button>
      </h1>
      
    </div>
    <div class="clearfix">
        <div class="col-xs-12 col-sm-2 center">
            <div>
                <span class="profile-picture">
                    @if ($paciente->foto==null)
                    <img src="{{asset("assets/$theme/assets/images/avatars/usuario.jpg")}}" height="115px" width="110px"/>
                    @else
                    <img src="{{Storage::url("datos/fotos/paciente/$paciente->foto")}}" height="115px" width="110px"/>
                    @endif
                </span>
                <span class="blue">{{$paciente->nombre}} {{$paciente->apellido_p}} {{$paciente->apellido_m}}</span>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4">
            <div class="profile-user-info">
                <div class="profile-info-row">
                    <div class="profile-info-name"> Edad </div>
                    <div class="profile-info-value">
                        <span>{{$edad=MyHelper::Edad_Paciente($paciente->fecha_nac,"completo")}}</span>
                    </div>
                </div>
                <div class="profile-info-row">
                    <div class="profile-info-name"> Dirección </div>
                    <div class="profile-info-value">
                        <span>
                            @if($paciente->direccion==null)
                                No Registrado
                            @else
                                {{$paciente->direccion}}
                            @endif
                        </span>
                    </div>
                </div>
                <div class="profile-info-row">
                    <div class="profile-info-name"> Contacto </div>
                    <div class="profile-info-value">
                        <span>
                            @if($paciente->celular==null)
                                No Registrado
                            @else
                                {{$paciente->celular}}
                            @endif
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6">
            <div class="">
                <div class="center">
                  @if ($SVM==null)
                    <span class="center blue">Ultimos Signos Vitales</span>
                  @else
                    <span class="center blue">Ultimos Signos Vitales ({{$aux_fecha}})</span>
                  @endif
                </div>   
                <table id="tabla" class="table  table-bordered table-hover" >
                    <tr style="background: rgb(237, 243, 247)">
                        <th style="text-align: center; width: 14%"><i class="glyphicon glyphicon-arrow-up" style="color: darkviolet"></i><br> Altura</th>
                        <th style="text-align: center; width: 14%"><i class="fa fa-tachometer" style="color: rgb(100, 149, 237)"></i><br> Peso</th>
                        {{-- <th style="text-align: center; width: 10%"><i class="glyphicon glyphicon-piggy-bank" style="color: rgb(60, 196, 89)"></i><br> IMC</th> --}}
                        <th style="text-align: center; width: 16%"><i class="glyphicon glyphicon-fire" style="color: rgb(240, 161, 15)"></i><br> Temp.</th>
                        <th style="text-align: center; width: 18%"><i class="glyphicon glyphicon-time blue"></i><br> P.A.</th>
                        <th style="text-align: center; width: 14%"><i class="glyphicon glyphicon-heart-empty" style="color: red"></i><br> F.C</th>
                        <th style="text-align: center; width: 14%"><i class="glyphicon glyphicon-flash" style="color: saddlebrown"></i> <br> F.R</th>
                    </tr>
                    @if ($SVM==null)
                        <tr><td colspan="6" class="center"><span class="red">Esta es su primera consulta</span></td></tr>
                    @else
                        <tr>
                        <td style="text-align: center;"><i>
                          @if ($SVM->altura==null)
                              <span class="red">Sin Reg.</span>
                          @else
                              {{$SVM->altura}} cm
                          @endif         
                        </i></td>
                        <td style="text-align: center;"><i>
                          @if ($SVM->peso==null)
                              <span class="red">Sin Reg.</span>
                          @else
                              {{$SVM->peso}} kg
                          @endif                          
                        </i></td>
                        {{-- <td style="text-align: center;"><i>0.0 mb</i></td> --}}
                        <td style="text-align: center;"><i>
                          @if ($SVM->temperatura==null)
                              <span class="red">Sin Reg.</span>
                          @else
                              {{$SVM->temperatura}} °C
                          @endif                          
                        </i></td>
                        <td style="text-align: center;"><i>
                          @if ($SVM->p_a==null)
                              <span class="red">Sin Reg.</span>
                          @else
                              {{$SVM->p_a}} mmHg
                          @endif                        
                        </i></td>
                        <td style="text-align: center;"><i>
                          @if ($SVM->f_c==null)
                              <span class="red">Sin Reg.</span>
                          @else
                              {{$SVM->f_c}} lat/min
                          @endif  
                        </i></td>
                        <td style="text-align: center;"><i>
                          @if ($SVM->f_r==null)
                              <span class="red">Sin Reg.</span>
                          @else
                              {{$SVM->f_r}} r/min
                          @endif                       
                        </i></td>
                      </tr>
                    @endif
                    
                </table>
            </div>
        </div>
    </div>


    
    <div class="">
      <div id="user-profile-2" class="user-profile">
        <div class="tabbable">
          <ul class="nav nav-tabs padding-18">
            <li>
              <a data-toggle="tab" href="#historia">
                <i class="blue ace-icon fa fa-user bigger-120"></i>
                Historia Clínica
              </a>
            </li>

            <li class="active">
              <a data-toggle="tab" href="#consulta">
                <i class="orange fa fa-stethoscope bigger-120"></i>
                Consulta Medica
              </a>
            </li>

            <li>
              <a data-toggle="tab" href="#receta">
                <i class="green ace-icon fa fa-file bigger-120"></i>
                receta medica
              </a>
            </li>

            <li>
              <a data-toggle="tab" href="#gabinete">
                <i class="pink ace-icon fa fa-book bigger-120"></i>
                E. Gabinete
              </a>
            </li>
          </ul>

          <div class="tab-content no-border padding-24">
            <div id="historia" class="tab-pane">
                @include('admin.consulta.historia')
            </div>

            <div id="consulta" class="tab-pane in active">
                @include('admin.consulta.consulta')
            </div>

            <div id="receta" class="tab-pane">
                @include('admin.consulta.receta')
            </div>

            <div id="gabinete" class="tab-pane">
                @include('admin.consulta.gabinete')
            </div>
          </div>
        </div>
      </div>
    </div>

    
  </div>
</div>
@endsection