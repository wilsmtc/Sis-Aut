<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        
		<title>@yield('titulo', 'SRRHH') Sist. Rec. Hum.</title>

		<meta name="description" content="responsive photo gallery using colorbox" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        
		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="{{asset("assets/$theme/assets/css/bootstrap.min.css")}}" />
		<link rel="stylesheet" href="{{asset("assets/$theme/assets/font-awesome/4.5.0/css/font-awesome.min.css")}}" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="{{asset("assets/$theme/assets/css/colorbox.min.css")}}" />

		<!-- text fonts -->
		<link rel="stylesheet" href="{{asset("assets/$theme/assets/css/fonts.googleapis.com.css")}}" />

		<!-- ace styles -->
		<link rel="stylesheet" href="{{asset("assets/$theme/assets/css/ace.min.css")}}" class="ace-main-stylesheet" id="main-ace-style" />

		<link rel="stylesheet" href="{{asset("assets/$theme/assets/css/ace-skins.min.css")}}" />
        <link rel="stylesheet" href="{{asset("assets/$theme/assets/css/ace-rtl.min.css")}}" />
        
        @yield("styles")
        <link rel="stylesheet" href="{{asset("assets/css/custom.css")}}">
        <link rel="stylesheet" href="{{asset("assets/css/toastr/toastr.min.css")}}"/>
        <link rel="stylesheet" href="{{asset("assets/css/flatpickr.min.css")}}"/>
        <link rel="stylesheet" href="{{asset("assets/css/jquery.dataTables.min.css")}}">
		<script src="{{asset("assets/$theme/assets/js/ace-extra.min.js")}}"></script>
    </head>
    @php
        $clinica=MyHelper::Datos_Clinica();
        $tema=$clinica->color;
    @endphp
    <body class="{{$tema}}">       
        <div id="navbar" class="navbar navbar-default          ace-save-state">
            <div class="navbar-container ace-save-state" id="navbar-container">
				<div class="navbar-header pull-left">
					<a href="index.html" class="navbar-brand">
						<small>
                            @if ($clinica->logo==null)
                                <i class="fa fa-book"></i>
                            @else
                                <img class="img-circle zoom" src="{{Storage::url("datos/fotos/clinica/$clinica->logo")}}" width="4%"/>
                            @endif
							{{ $clinica->nombre}}
						</small>
					</a>
                </div>
                @include("theme/$theme/header")
            </div>
        </div>
        <div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
            </script>           
            <div class="content-wrapper" >
                <!-- Content Header (Page header) -->
                    <section class="content">
                        @include("theme/$theme/aside")
                        @include("theme/$theme/wrapper")    
                        @include("theme/$theme/footer")  
                    </section>
            </div>           
        </div>
        <div>
		<script src="{{asset("assets/$theme/assets/js/jquery-2.1.4.min.js")}}"></script>
        <script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
        </script>
        <script src="{{asset("assets/$theme/assets/js/bootstrap.min.js")}}"></script>
		<!-- ace scripts -->
		<script src="{{asset("assets/$theme/assets/js/ace-elements.min.js")}}"></script>
        <script src="{{asset("assets/$theme/assets/js/ace.min.js")}}"></script> 

        <script src="{{asset("assets/$theme/assets/js/jquery.validate.min.js")}}"></script>
        <script src="{{asset("assets/$theme/assets/js/messages_es.min.js")}}"></script> 

        @yield("scriptsPlugins")
        <script src="{{asset("assets/js/sweetalert/sweetalert.min.js")}}" type="text/javascript"></script>
        <script src="{{asset("assets/js/toastr/toastr.min.js")}}" type="text/javascript"></script>
        <script src="{{asset("assets/js/funciones.js")}}"></script>
        <script src="{{asset("assets/js/scripts.js")}}"></script>
        <script src="{{asset("assets/js/flatpickr/flatpickr.js")}}" type="text/javascript"></script>
        <script src="{{asset("assets/js/datatables/jquery.dataTables.min.js")}}" type="text/javascript"></script>

        @yield("scripts")  
        </div>     
    </body>
</html>