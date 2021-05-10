<!DOCTYPE html>
    <html>
    <head>
        <title>Ficha de Atención</title>
        <meta charset="utf-8"/>
    </head>
    <body>
        <br><br>
        <table border="1" id="uno">
            <tr>
                <td>
                    <style>
                    #uno {
                        background-image: url("{{asset("assets/$theme/assets/images/gallery/logo.jpg")}}");
                        background-repeat: no-repeat;
                        background-position: right bottom;
                        background-size:35%;
                    }
                    </style><br>
                    <table align="center" width="100%">
                        <tr>
                            <th align="center" width="20%" colspan="2">
                                <img src="data:image/png;base64,{{$image}}" height="110px" width="80px" alt="BTS">

                            </th>
                            <th width="80%">
                                    <h2 style="color: rgb(92, 5, 5)"><b>{{$clinica->nombre}}</b></h2>
                                    <span style="color: rgb(121, 9, 9)" style="text-align: right"><b>Dirección: </b>{{$clinica->direccion}}</span><br><br>
                                    <span style="color: rgb(73, 5, 10)"> <b>Contactos: </b>{{$clinica->telefono}}  {{$clinica->contacto_1}}  {{$clinica->contacto_2}}</span>
                            </th>
                        </tr><br>
                        <tr>
                            <td colspan="3">
                                <h2 style="text-align: center"><FONT COLOR='#0f0fa0'><u>FICHA DE ATENCIÓN MÉDICA</u></FONT></h2>
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="4"></td>
                            <td>
                                <h3>
                                    <span style="color: rgb(92, 5, 5)"><b><u>Especialidad</u>:</b></span>
                                </h3>
                            </td>
                            <td>
                                <h3>
                                    <span>{{$ficha->servicio->nombre}}</span>
                                </h3>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span style="color: rgb(92, 5, 5)"><b><u>Paciente</u>:</b></span>
                            </td>
                            <td>
                                <span>{{$ficha->paciente->nombre}} {{$ficha->paciente->apellido_p}} {{$ficha->paciente->apellido_m}}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span style="color: rgb(92, 5, 5)"><b><u>Fecha</u>:</b></span>
                            </td>
                            <td>
                                <span>{{$ficha->fecha}}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span style="color: rgb(92, 5, 5)"><b><u>Hora</u>:</b></span>
                            </td>
                            <td>
                                <span>{{$ficha->hora}}</span>
                            </td>
                        </tr>
                    </table><br>
                </td>
            </tr>
        </table>
        <br><br><br>
.................................................................................................................................................................................
        <br><br><br><br>
        <table border="1" id="uno">
            <tr>
                <td><br>
                    <table align="center" width="100%">
                        <tr>
                            <th align="center" width="20%" colspan="2">
                                @if ($clinica->logo==null)
                                    <img class="img-circle zoom" src="{{asset("assets/$theme/assets/images/gallery/bayern.png")}}" height="110px" width="80px"/>
                                @else
                                    <img src="data:image/png;base64,{{$image}}" height="110px" width="80px"/>
                                @endif
                            </th>
                            <th width="80%">
                                    <h2 style="color: rgb(92, 5, 5)"><b>{{$clinica->nombre}}</b></h2>
                                    <span style="color: rgb(121, 9, 9)"><b>Dirección: </b>{{$clinica->direccion}}</span><br><br>
                                    <span style="color: rgb(73, 5, 10)"> <b>Contactos: </b>{{$clinica->telefono}}  {{$clinica->contacto_1}}  {{$clinica->contacto_2}}</span>
                            </th>
                        </tr><br>
                        <tr>
                            <td colspan="3">
                                <h2 style="text-align: center"><FONT COLOR='#0f0fa0'><u>FICHA DE ATENCIÓN MÉDICA</u></FONT></h2>
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="4"></td>
                            <td>
                                <h3>
                                    <span style="color: rgb(92, 5, 5)"><b><u>Especialidad</u>:</b></span>
                                </h3>
                            </td>
                            <td>
                                <h3>
                                    <span>{{$ficha->servicio->nombre}}</span>
                                </h3>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span style="color: rgb(92, 5, 5)"><b><u>Paciente</u>:</b></span>
                            </td>
                            <td>
                                <span>{{$ficha->paciente->nombre}} {{$ficha->paciente->apellido_p}} {{$ficha->paciente->apellido_m}}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span style="color: rgb(92, 5, 5)"><b><u>Fecha</u>:</b></span>
                            </td>
                            <td>
                                <span>{{$ficha->fecha}}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span style="color: rgb(92, 5, 5)"><b><u>Hora</u>:</b></span>
                            </td>
                            <td>
                                <span>{{$ficha->hora}}</span>
                            </td>
                        </tr>
                    </table><br>
                </td>
            </tr>
        </table>
    </body>
</html>