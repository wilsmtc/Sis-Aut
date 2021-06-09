<!DOCTYPE html>
<html>
    <head>
        <title>Exámen Físico</title>
        <meta charset="utf-8"/>
    </head>
    <body>
        <table align="center" width="100%">
            <tr>
                <td>
                    <table width="100%">
                        <tr>
                            <td align="center" width="20%" colspan="2">
                                <img src="data:image/png;base64,{{$image}}" height="90px" width="60px"/>
                            </th>
                            <td width="80%" align="center">
                                <span><b>{{$clinica->nombre}}</b></span><br>
                                <span><i>Cuida tu salud al servicio de la población Potosina</i></span><br>
                                <span style="color: rgb(24, 4, 4)" style="text-align: right"><b>EXÁMEN FÍSICO</b></span>
                            </th>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table width="100%">
            <tr align="left">
                <td width="15%" align="right"><b>Paciente:</b></td>
                <td width="25%">{{$internacion->paciente->nombre}} {{$internacion->paciente->apellido_p}} {{$internacion->paciente->apellido_m}}</td>
                <td width="10%" align="right"><b>Edad:</b></td>
                <td width="10%">{{$edad=MyHelper::Edad_Paciente($internacion->paciente->fecha_nac,"index")}}</td>
                <td width="20%" align="right"><b>Fecha de Ingreso:</b></td>
                <td width="20%">{{$internacion->fecha_ingreso}}</td>
            </tr>
        </table>
        <table width="100%" border="1">
            <tr>
                <th colspan="6" style="text-align: center">Signos Vitales</th>
            </tr>
            <tr>
                <th style="text-align: center" width="14%">Altura</th>
                <th style="text-align: center" width="14%">Peso</th>
                <th style="text-align: center" width="16%">Temperatura</th>
                <th style="text-align: center" width="14%">P.A.</th>
                <th style="text-align: center" width="14%">F.C.</th>
                <th style="text-align: center" width="14%">F.R.</th>
            </tr>
                <tr>
                <td style="text-align: center">
                    @if ($signos_vitales->altura==null)
                        <FONT COLOR='red'>Sin Registro</FONT>
                    @else
                        {{$signos_vitales->altura}} cm
                    @endif
                </td>
                <td style="text-align: center">
                    @if ($signos_vitales->peso==null)
                        <FONT COLOR='red'>Sin Registro</FONT>
                    @else
                        {{$signos_vitales->peso}} kg
                    @endif
                </td>
                <td style="text-align: center">
                    @if ($signos_vitales->temperatura==null)
                        <FONT COLOR='red'>Sin Registro</FONT>
                    @else
                        {{$signos_vitales->temperatura}} °C
                    @endif
                </td>
                <td style="text-align: center">
                    @if ($signos_vitales->p_a==null)
                        <FONT COLOR='red'>Sin Registro</FONT>
                    @else
                        {{$signos_vitales->p_a}} mmHg
                    @endif
                </td>
                <td style="text-align: center">
                    @if ($signos_vitales->f_c==null)
                        <FONT COLOR='red'>Sin Registro</FONT>
                    @else
                        {{$signos_vitales->f_c}} lat/min
                    @endif
                </td>
                <td style="text-align: center">
                    @if ($signos_vitales->f_r==null)
                        <FONT COLOR='red'>Sin Registro</FONT>
                    @else
                        {{$signos_vitales->f_r}} r/min
                    @endif
                    {{$signos_vitales->f_r}}</td>
            </tr>
        </table><br>
        <table  width="100%" border="1">
            <tr>
                <td><b><u>Exámen Físico General</u> (Conciencia, Psiquismo, Estado Nutricional)</b></td>
            </tr>
            <tr>
                @php
                    $vector = explode("\n", $internacion->motivo_i);
                    $contador=count($vector);
                @endphp
                <td>
                    @for ($i=0;$contador>$i;$i++)
                        -{{$vector[$i]}} <br>
                    @endfor
                </td>
            </tr>
            <tr>
                <td><b><u>Exámen Físico Regional</u></b><br>
                    <b>Cráneo y Cara (Ojos, Oidos, Nariz, Boca, Faringe)</b>
                </td>
            </tr>
            <tr>
                @php
                    $vector = explode("\n", $internacion->craneo_cara);
                    $contador=count($vector);
                @endphp
                <td>
                    @for ($i=0;$contador>$i;$i++)
                        -{{$vector[$i]}} <br>
                    @endfor
                </td>
            </tr>
            <tr>
                <td><b>Cuello y Tiroides</b></td>
            </tr>
            <tr>
                @php
                    $vector = explode("\n", $internacion->cuello_tiroides);
                    $contador=count($vector);
                @endphp
                <td>
                    @for ($i=0;$contador>$i;$i++)
                        -{{$vector[$i]}} <br>
                    @endfor
                </td>
            </tr>
            <tr>
                <td><b>Tórax, Mama, Cardiopulmonar, Abdomen</b></td>
            </tr>
            <tr>
                @php
                    $vector = explode("\n", $internacion->torax);
                    $contador=count($vector);
                @endphp
                <td>
                    @for ($i=0;$contador>$i;$i++)
                        -{{$vector[$i]}} <br>
                    @endfor
                </td>
            </tr>
            <tr>
                <td><b>Genitales, Urinario, Rectal</b>
                </td>
            </tr>
            <tr>
                @php
                    $vector = explode("\n", $internacion->genitales);
                    $contador=count($vector);
                @endphp
                <td>
                    @for ($i=0;$contador>$i;$i++)
                        -{{$vector[$i]}} <br>
                    @endfor
                </td>
            </tr>
            <tr>
                <td><b>Columna Vertebral y Extremidades</b></td>
            </tr>
            <tr>
                @php
                    $vector = explode("\n", $internacion->columna);
                    $contador=count($vector);
                @endphp
                <td>
                    @for ($i=0;$contador>$i;$i++)
                        -{{$vector[$i]}} <br>
                    @endfor
                </td>
            </tr>
            <tr>
                <td><b><u>Exámen Neurológico</u></b></td>
            </tr>
            <tr>
                @php
                    $vector = explode("\n", $internacion->e_neurologico);
                    $contador=count($vector);
                @endphp
                <td>
                    @for ($i=0;$contador>$i;$i++)
                        -{{$vector[$i]}} <br>
                    @endfor
                </td>
            </tr>
            <tr>
                <td><b>Impresión Diagnóstica</b></td>
            </tr>
            <tr>
                @php
                    $vector = explode("\n", $internacion->impresion_d);
                    $contador=count($vector);
                @endphp
                <td>
                    @for ($i=0;$contador>$i;$i++)
                        -{{$vector[$i]}} <br>
                    @endfor
                </td>
            </tr>
            <tr>
                <td><b>Conducta</b></td>
            </tr>
            <tr>
                @php
                    $vector = explode("\n", $internacion->conducta);
                    $contador=count($vector);
                @endphp
                <td>
                    @for ($i=0;$contador>$i;$i++)
                        -{{$vector[$i]}} <br>
                    @endfor <br>
                </td>
            </tr>
        </table><br><br>
        <table  width="100%" align="center">
            <tr>
                <th>
                    SELLO Y FIRMA
                </th>
            </tr>
        </table><br><br>
    </body>
</html>