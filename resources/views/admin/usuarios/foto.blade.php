<div class="form-group">    
    <label class="control-label">
        @if($usuario->foto!=null)
            <img src="{{Storage::url("datos/fotos/usuario/$usuario->foto")}}" width="50%" >        
        @else
            <img src="{{asset("assets/$theme/assets/images/avatars/usuario.jpg")}}" width="45%" />
        @endif
        <label class="control-label">
            <div style=""><u><b>Nombre</b></u>: <i>{{$usuario->nombre}}  {{$usuario->apellido}}</i></div>
            <div style=""><u><b>Usuario</b></u>: <i>{{$usuario->usuario}}</i></div>
            <div style=""><u><b>email</b></u>: <i>{{$usuario->email}}</i></div>
            <div style=""><u><b>Rol</b></u>: <i>{{$usuario->rol->rol}}</i></div>
            <div style=""><u><b>Añadir</b></u>: <i>
                @if($usuario->rol->añadir==1)
                    <span class="badge badge-success"><i class="ace-icon glyphicon glyphicon-ok"></i></span>
                @else
                    <span class="badge badge-danger"><i class="ace-icon glyphicon glyphicon-remove"></i></span>
                @endif 
            </i></div>
            <div style=""><u><b>Editar</b></u>: <i>
                @if($usuario->rol->editar==1)
                    <span class="badge badge-success"><i class="ace-icon glyphicon glyphicon-ok"></i></span>
                @else
                    <span class="badge badge-danger"><i class="ace-icon glyphicon glyphicon-remove"></i></span>
                @endif 
            </i></div>
            <div style=""><u><b>Eliminar</b></u>: <i>
                @if($usuario->rol->eliminar==1)
                    <span class="badge badge-success"><i class="ace-icon glyphicon glyphicon-ok"></i></span>
                @else
                    <span class="badge badge-danger"><i class="ace-icon glyphicon glyphicon-remove"></i></span>
                @endif 
            </i></div>
        </label>          
    </label>   
</div>