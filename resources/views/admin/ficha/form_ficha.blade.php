{{-- 
<div class="row">
    <div class="col-xs-12">
        <div>
            <div id="user-profile-1" class="user-profile row">
                <div class="col-xs-12 col-sm-4 center">
                    <div>
                        <span class="profile-picture">
                            @if ($paciente->foto==null)
                            <img src="{{asset("assets/$theme/assets/images/avatars/usuario.jpg")}}" class="editable img-responsive"/>
                            @else
                            <img src="{{Storage::url("datos/fotos/paciente/$paciente->foto")}}" class="editable img-responsive"/>
                            @endif &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-8">
                    <div class="">
                        <div class="profile-user-info profile-user-info-striped">
                            <div class="profile-info-row">
                                <div class="profile-info-name"><u>Paciente</u>:</div>
                                <div class="profile-info-value">
                                    <span class="editable"><i>{{$paciente->nombre}} {{$paciente->apellido_p}} {{$paciente->apellido_m}}</i></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"><u>N° de Carnet</u>:</div>
                                <div class="profile-info-value">
                                    <span class="editable"><i>{{$paciente->ci}}</i></span>
                                </div>
                            </div>
                            @php                               
                                $fecha_actual = new \DateTime();
                                $fecha=$fecha_actual->format('Y-m-d');                    
                            @endphp
                            <div class="profile-info-row">
                                <div class="profile-info-name"><u>Fecha</u>:</div>
                                <div class="profile-info-value">
                                    <input type="date" class="form-control fecha" name="fecha" id="fecha" value="{{old('fecha', $ficha->fecha ?? $fecha)}}"  required/>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"><u>Horarios</u>:</div>
                                <div class="profile-info-value" id="div_select">
                                    <button type="button" class="form-control btn-primary" id="horario" name="horario" style="display: block"><span class="white">ver horario</span></button>
                                    <div id="div_select_horario" style="display: none">

                                    </div>
                                </div>
                            </div>                          
                            <input type="hidden" id="paciente_id" name="paciente_id" value="{{$paciente->id}}">
                            <input type="hidden" id="servicio_id" name="servicio_id" value="{{$servicio->id}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}