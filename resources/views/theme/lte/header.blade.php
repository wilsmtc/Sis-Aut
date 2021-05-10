<link rel="stylesheet" href="{{asset("assets/css/zoom.css")}}">
<div class="navbar-buttons navbar-header pull-right" role="navigation">
    <ul class="nav ace-nav">
        @php
            $datos=MyHelper::Usuarios_Pendientes();
            $contador=$datos->count();
        @endphp
        @if(session()->get('rol_id')==1 && $contador>=1)
            <li class="grey dropdown-modal">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <i class="ace-icon fa fa-bell icon-animated-bell"></i>
                    <span class="badge badge-important"> {{$contador}}</span>
                </a>
                <ul class="dropdown-menu-right dropdown-navbar navbar-grey dropdown-menu dropdown-caret dropdown-close">
                    <li class="dropdown-header">
                        <i class="ace-icon fa fa-exclamation-triangle"></i>
                        {{$contador}} Notificationes
                    </li>
                    <li class="dropdown-content">
                        <ul class="dropdown-menu dropdown-navbar navbar-blue">
                            <table id="table">
                            @foreach ($datos as $usuario )                           
                                <li>
                                    <a class="clearfix">
                                        <span class="msg-title">
                                            <span class="blue">{{$usuario->nombre}} {{$usuario->apellido}}</span>
                                            Solicita unirse al sistema con el rol de: <span class="blue">{{$usuario->rol->rol}} </span>
                                        </span>
                                        <form action="{{route('aceptar_usuario', ['id' => $usuario->id])}}" class="d-inline">
                                            <button type="submit" class="btn btn-white btn-success btn-sm" style="border-width: 2px" onclick="return confirm('Desea ACEPTAR a: {{$usuario->nombre}} {{$usuario->apellido}}' )">
                                                <i class="ace-icon fa fa-check bigger-120 success"></i>
                                                Aceptar
                                            </button>
                                        </form> 
                                        <form action="{{route('rechazar_usuario', ['id' => $usuario->id])}}" class="d-inline">  
                                            <button type="submit" class="btn btn-white btn-danger btn-sm pull-right" style="border-width: 2px" onclick="return confirm('¿Esta seguro de RECHAZAR a: {{$usuario->nombre}} {{$usuario->apellido}}?')">
                                                <i class="ace-icon fa fa-close bigger-120 danger"></i>
                                                Rechazar
                                            </button> 
                                        </form> 
                                    </a>
                                </li>                           
                            @endforeach
                            </table>
                        </ul>
                    </li>

                    <li class="dropdown-footer">
                        <a href="#">
                            See all notifications
                            <i class="ace-icon fa fa-arrow-right"></i>
                        </a>
                    </li>
                </ul>
            </li>
        @endif
        

        

        {{-- <li class="green dropdown-modal">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
                <span class="badge badge-success">5</span>
            </a>

            <ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                <li class="dropdown-header">
                    <i class="ace-icon fa fa-envelope-o"></i>
                    5 Messages
                </li>

                <li class="dropdown-content">
                    <ul class="dropdown-menu dropdown-navbar">
                        <li>
                            <a href="#" class="clearfix">
                                <img src="assets/images/avatars/avatar.png" class="msg-photo" alt="Alex's Avatar" />
                                <span class="msg-body">
                                    <span class="msg-title">
                                        <span class="blue">Alex:</span>
                                        Ciao sociis natoque penatibus et auctor ...
                                    </span>

                                    <span class="msg-time">
                                        <i class="ace-icon fa fa-clock-o"></i>
                                        <span>a moment ago</span>
                                    </span>
                                </span>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="clearfix">
                                <img src="assets/images/avatars/avatar3.png" class="msg-photo" alt="Susan's Avatar" />
                                <span class="msg-body">
                                    <span class="msg-title">
                                        <span class="blue">Susan:</span>
                                        Vestibulum id ligula porta felis euismod ...
                                    </span>

                                    <span class="msg-time">
                                        <i class="ace-icon fa fa-clock-o"></i>
                                        <span>20 minutes ago</span>
                                    </span>
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown-footer">
                    <a href="inbox.html">
                        See all messages
                        <i class="ace-icon fa fa-arrow-right"></i>
                    </a>
                </li>
            </ul>
        </li> --}}
        <li class="blue dropdown-modal">
            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                @php
                    $aux= session()->get('foto_usuario');
                @endphp
                @if(session()->get('foto_usuario')==null)
                    <img class="nav-user-photo" src="{{asset("assets/$theme/assets/images/avatars/usuario.jpg")}}" />
                @else
                    <img src="{{Storage::url("datos/fotos/usuario/$aux")}}" class="nav-user-photo" >                  
                @endif
                
                <span class="user-info">
                    <small>Bienvenido</small>
                    {{session()->get('usuario')}}
                </span>

                <i class="ace-icon fa fa-caret-down"></i>
            </a>

            <ul class="dropdown-menu-right dropdown-navbar navbar-grey dropdown-menu dropdown-caret dropdown-close">
                <li class="dropdown-header" style="text-align: center">
                    <i class="menu-icon fa fa-user icon-animated-vertical"> <b> Perfil de Usuario</b></i>
                    
                </li>

                <li class="dropdown-content">
                    <ul class="dropdown-menu dropdown-navbar">
                        <li style="background: rgb(235, 235, 235)">
                            <a href="#" class="clearfix" align='center' >
                                @if(session()->get('foto_usuario')==null)
                                    <img class="img-circle" src="{{asset("assets/$theme/assets/images/avatars/usuario.jpg")}}" width="35%"/>
                                @else
                                    <img class="img-circle  zoom" style="center" src="{{Storage::url("datos/fotos/usuario/$aux")}}" width="35%">                  
                                @endif
                            </a>
                            <a href="#">                               
                                <i class="blue menu-icon fa fa-caret-right"></i>
                                <span class="blue">Usuario:&nbsp;</span>
                                <b>  {{session()->get('usuario')}}</b>
                                <br>
                                <i class="blue menu-icon fa fa-caret-right"></i>
                                <span class="blue">Nombre:</span>
                                <b>  {{session()->get('nombre_usuario')}} {{session()->get('apellido_usuario')}}</b>
                                <br>
                                <i class="blue menu-icon fa fa-caret-right"></i>
                                <span class="blue">Correo: </span>
                                <b> &nbsp; {{session()->get('email_usuario')}}</b>
                                <br>
                                <i class="blue menu-icon fa fa-caret-right"></i>
                                <span class="blue">Rol: &nbsp; &nbsp; &nbsp;</span>
                                <b>  &nbsp; {{session()->get('rol_usuario')}}</b>
                                <br>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown-footer" >
                    <button onclick="location.href='{{route('logout')}}'" class="btn btn-xs btn-danger pull-right" title="salir del sistema">
                        <i class="ace-icon fa fa-close bigger-120"> Salir</i>
                    </button> 
                    <button onclick="location.href='{{route('editar_mi_usuario', ['id' => session()->get('usuario_id')])}}'" class="btn btn-xs btn-warning pull-left" title="editar usuario">
                        <i class="ace-icon fa fa-pencil bigger-120"> Editar</i>
                    </button>   
                    <br>               
                </li>                                                                              
            </ul>
        </li>
    </ul>
</div>
