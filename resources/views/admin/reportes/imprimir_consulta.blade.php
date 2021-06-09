<!DOCTYPE html>
<html>
    <head>
        <title>Reporte de Consultas</title>
        <meta charset="utf-8"/>
    </head>
    <body>
        <table align="center" width="100%">
            <tr>
                <td>
                    <table width="100%">
                        <tr>
                            <th align="center" width="20%" colspan="2">
                                <img src="data:image/png;base64,{{$image}}" height="110px" width="80px"/>
                            </th>
                            <th width="80%">
                                <h2 style="color: rgb(53, 17, 17)"><b>{{$clinica->nombre}}</b></h2>
                                <span style="color: rgb(8, 6, 31)" style="text-align: right"><b>Dirección: </b>{{$clinica->direccion}}</span>
                                <span style="color: rgb(53, 17, 17)"> <b>Contactos: </b>{{$clinica->telefono}}  {{$clinica->contacto_1}}  {{$clinica->contacto_2}}</span>
                            </th>
                        </tr> <br>
                    </table>
                </td>
            </tr>
        </table>
        <hr>
        <table  width="100%">
            <tr>
                <th width="50%" align="left">
                    Reporte de Consultas - {{$titulo}}
                </th>
                @php
                    $aux = new \DateTime();
                    $aux=$aux->format('Y-m-d');
                @endphp

                <td width="50%" align="right">
                    Fecha de Impresión: {{$aux}}
                </td>
            </tr>
        </table>
        <hr>
        <h3 style="text-align: center">Información del Reporte</h3>
        <hr>
        <table width="100%">
            <tr>
                <td style="text-align: center">
                    @if ($fecha_esp==null)
                        Generado: <b>Desde</b> "{{$fecha_ini}}" &nbsp;&nbsp;&nbsp; <b>Hasta</b> "{{$fecha_fin}}"
                    @else
                        Perteneciente al: <b>"{{$fecha_esp}}"</b> 
                    @endif
                </td>
            </tr>
        </table>
        <hr>
        <table  align="center">
            @php
                $hombres=0;
                $contador=1;
                $espera=0;
                $atendido=0;
                $falta=0;
            @endphp
            @if ($fecha_esp==null)
                <tr>
                    <td>
                        <b>Periodo: </b> {{$diferencia=MyHelper::Diferencia_inicio_fin($fecha_ini,$fecha_fin,"completo")}}
                    </td>
                </tr>           
                
            @endif 
        </table>
        <hr>
        <table align="center" width="100%">
            <tr>
                <th width="10%">Nro</th>
                <th width="18%">Fecha</th>
                <th width="37%">Nombres y Apellidos</th>
                <th width="10%">Edad</th>
                <th width="10%">Sexo</th>  
                <th width="15%">Estado</th>
            </tr>
            @foreach ($datos as $dato)
                <tr align="center">
                    <td>{{$contador}}</td>
                    <td>{{$dato->fecha}}</td>
                    <td align="left">{{$dato->paciente->nombre}} {{$dato->paciente->apellido_p}} {{$dato->paciente->apellido_m}}</td>
                    <td>{{$edad=MyHelper::Edad_Paciente($dato->paciente->fecha_nac,"index")}}</td>
                    <td>
                        @if ($dato->genero=="Mujer")
                            M
                        @else
                            H  @php $hombres++;   @endphp
                        @endif
                    </td>
                    <td>
                        @if($dato->estado=="0")
                            En espera
                            @php $espera++; @endphp 
                        @else
                            @if ($dato->estado=="1")
                                Atendido
                                @php $atendido++; @endphp 
                            @else
                                Falta
                                @php $falta++; @endphp 
                            @endif
                        @endif
                    </td>
                </tr> 
                @php $contador++; @endphp 
            @endforeach
        </table>
        <hr>
        <table  align="center">
            <tr>
                <td align="center">
                    Total: <b>"{{$datos->count()}}"</b>&nbsp;&nbsp;&nbsp; Hombres: <b>"{{$hombres}}"</b>&nbsp;&nbsp;&nbsp; Mujeres: <b>"{{$datos->count()-$hombres}}"</b>
                </td>
            </tr>
            @if ($titulo=="Todas")
                <tr>
                    <td align="center">
                        En Espera: <b>"{{$espera}}"</b>&nbsp;&nbsp;&nbsp; Atendidas: <b>"{{$atendido}}"</b></b>&nbsp;&nbsp;&nbsp; Faltas: <b>"{{$falta}}"</b>
                    </td>
                </tr>                   
            @endif
        </table>
    </body>
</html>