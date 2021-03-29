<div class="row">
    <div class="col-xs-12">
        <div>  
            <div id="user-profile-1" class="user-profile row">
                <div class="col-xs-12 col-sm-5 center">
                    <div>   
                        <span class="profile-picture">
                            @if($personal->foto!=null)
                                <img src="{{Storage::url("datos/fotos/personal/$personal->foto")}}" class="editable img-responsive"/>        
                            @else
                                <img src="{{asset("assets/$theme/assets/images/avatars/usuario.jpg")}}" class="editable img-responsive"/>
                            @endif
                        </span>
                        
                    </div>
                </div>
                <div class="col-xs-12 col-sm-7">
                    <div class="">
                        <div class="profile-user-info profile-user-info-striped">
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Nombre </div>
                                <div class="profile-info-value">
                                    <span class="editable"><i>{{$personal->nombre}}  {{$personal->apellido}}</i></span>
                                </div>                              
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> N° de Carnet </div>
                                <div class="profile-info-value">
                                    <span class="editable"><i>{{$personal->ci}}</i></span>
                                </div>                              
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Dirección </div>
                                <div class="profile-info-value">
                                    <span class="editable"><i>
                                        @if($personal->direccion==null)
                                        No Tiene
                                        @else
                                            {{$personal->direccion}}
                                        @endif    
                                    </i></span>
                                </div>                              
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Celular </div>
                                <div class="profile-info-value">
                                    <span class="editable"><i>
                                        @if($personal->celular==null)
                                        No Tiene
                                        @else
                                            {{$personal->celular}}
                                        @endif    
                                    </i></span>
                                </div>                              
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Ingreso </div>
                                <div class="profile-info-value">
                                    <span class="editable"><i>{{$personal->fecha_ing}}</i></span>
                                </div>                              
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Unidad </div>
                                <div class="profile-info-value">
                                    <span class="editable"><i>{{$personal->unidad->nombre}}</i></span>
                                </div>                              
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Curriculum </div>
                                <div class="profile-info-value">
                                    <span class="editable">
                                        @if($personal->curriculum==null)
                                        <span>No Tiene</span>
                                        @else
                                            <a href="{{route('ver_curriculum', ['id' => $personal->id])}}" target="{{$personal->curriculum}}" title="ver curriculum" id="ver-curriculum">
                                                <span class="label label-info arrowed-in arrowed-in-right">
                                                    <i class="fa fa-fw  fa-download"></i> Ver</span>                           																			
                                            </a>
                                        @endif  
                                    </span>
                                </div>                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>           
        </div> 
    </div>
</div>