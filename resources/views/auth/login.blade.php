<!DOCTYPE html>
<html lang="en">


<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/x-icon" href="assets/img/favicon.png">

	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

	<link rel="stylesheet" href="assets/css/lnr-icon.css">

	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<link rel="stylesheet" href="assets/css/style.css">
	<title>Login Page</title>

	<!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
</head>

<body>

	<div id="loader-wrapper">
		<div class="loader">
			<div class="dot"></div>
			<div class="dot"></div>
			<div class="dot"></div>
			<div class="dot"></div>
			<div class="dot"></div>
		</div>
	</div>

	<div class="inner-wrapper login-body">
		<div class="login-wrapper">
			<div class="container">
				<div class="loginbox shadow-sm grow">
					<div class="login-left">
						<img class="img-fluid" src="assets/img/logo.png" alt="Logo">
					</div>
					<div class="login-right">
						<div class="login-right-wrap">
							<h1>Login</h1>
							<p class="account-subtitle">Access to our dashboard</p>

							<form  method="POST" action="{{ route('login') }}">
								@csrf

								<div class="form-group">
									<input class="form-control" type="text" id="email" name="email" value="{{old('email')}} "required placeholder="Email" autofocus autocomplete="username">
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />

								</div>
								<div class="form-group">
									<input class="form-control" type="password" id="password" name="password" required placeholder="Password" autocomplete="current-password">
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />

								</div>
								
                                <div class="block mt-4">
                                    <label for="remember_me" class="inline-flex items-center">
                                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-theme button-1 text-white ctm-border-radius btn-block"
                                        type="submit">Login</button>
                                </div>
							</form>

                            @if (Route::has('password.request'))

							<div class="text-center forgotpass">
                                <a href="{{ route('password.request') }}">Forgot Password?</a>
							</div>

                            @endif


                           

							<div class="text-center dont-have">Don’t have an account? <a
									href="{{route('register')}}">Register</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<script src="assets/js/jquery-3.2.1.min.js"></script>

	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>

	<script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
	<script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

	<script src="assets/js/script.js"></script>
</body>


</html>