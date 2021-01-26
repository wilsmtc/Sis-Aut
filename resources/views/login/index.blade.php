<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Login Page - Ace Admin</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        <!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="{{asset("assets/$theme/assets/css/bootstrap.min.css")}}" />
		<link rel="stylesheet" href="{{asset("assets/$theme/assets/font-awesome/4.5.0/css/font-awesome.min.css")}}" />

		<!-- text fonts -->
		<link rel="stylesheet" href="{{asset("assets/$theme/assets/css/fonts.googleapis.com.css")}}" />

		<!-- ace styles -->
		<link rel="stylesheet" href="{{asset("assets/$theme/assets/css/ace.min.css")}}" />

		<link rel="stylesheet" href="{{asset("assets/$theme/assets/css/ace-rtl.min.css")}}" />

	</head>

	<body class="login-layout blur-login">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<i class="ace-icon fa glyphicon-plus red"></i>
									<span class="red">Sis</span>
									<span class="white" id="id-text2">Santa Teresa</span>
								</h1>
								<h4 class="blue" id="id-company-text">&copy; Sistema de control de historial y fichaje</h4>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="ace-icon fa fa-info-circle"></i>
												Por Favor Introduzca su Informacion
											</h4>

											<div class="space-6"></div>
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                        
                                        @if ($errors->any()) <!--para ver los mensajes de error-->
                                            <div class="alert alert-danger alert-dismissible">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <div class="alert-text">

                                                    @foreach ($errors->all() as $error)                                                  
                                                        {{-- <div id="countdown"></div>
                                                        <script type="text/javascript">
                                                        if($aux==1){
                                                            var countdown_time = 60; //secconds
                                                        }
                                                            
                                                            function countdown(cd_time){
                                                                document.getElementById('countdown').innerHTML = cd_time;
                                                                countdown = setInterval( function(){
                                                                    if(cd_time>0){
                                                                        cd_time--;
                                                                        document.getElementById('countdown').innerHTML = cd_time;
                                                                    }else{
                                                                        showButton();
                                                                        clearInterval(countdown);
                                                                    }
                                                                }, 1000);
                                                            }
                                                            
                                                            function showButton(){
                                                                document.getElementById('countdown').innerHTML = "<a href='mipagina.com'>Continuar</a>"
                                                            }
                                                            
                                                            document.addEventListener("load", countdown(countdown_time), false);
                                                        </script>
                                                        @php 
                                                    
                                                        if(isset($_SESSION['countdown_start'])){
                                                                echo "countdown_time -= ". time() - $_SESSION['countdown_start'] . ";";
                                                            }else{
                                                                $_SESSION['countdown_start'] = time();
                                                            } 
                                                        @endphp--}}
                                                        <span><li>{{ $error }}<br></li></span>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                            <form action="{{route('login_post')}}" method="POST" autocomplete="off">
                                                @csrf
												
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" name="usuario" value="{{old('usuario')}}" placeholder="Usuario" />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" name="password" placeholder="Contraseña" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">
														<button type="submit" class="btn btn-success btn-block btn-flat">Login</button>
													</div>
                                                    @if (Route::has('password.request'))
                                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                                        {{ __('Forgot Your Password?') }}
                                                    </a>
                                                    @endif
													<div class="space-4"></div>
											
											</form>
										</div><!-- /.widget-main -->

										<div class="toolbar clearfix">
											<div>
												<a href="#" data-target="#forgot-box" class="forgot-password-link">
													<i class="ace-icon fa fa-arrow-left"></i>
													I forgot my password
												</a>
											</div>

											<div>
												<a href="#" data-target="#signup-box" class="user-signup-link">
													I want to register
													<i class="ace-icon fa fa-arrow-right"></i>
												</a>
											</div>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->
	</body>
</html>