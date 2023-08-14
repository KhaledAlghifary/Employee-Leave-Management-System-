<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">

	<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

	<link rel="stylesheet" href="{{asset('assets/css/lnr-icon.css')}}">

	<link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">

	<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
	<link href="{{ asset('assets/plugins/bootstrap-toastr/toastr.min.css') }}" rel="stylesheet" type="text/css">
	<title>Dashboard Page</title>

	<!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
</head>

<body>

	<div class="inner-wrapper">

		<div id="loader-wrapper">
			<div class="loader">
				<div class="dot"></div>
				<div class="dot"></div>
				<div class="dot"></div>
				<div class="dot"></div>
				<div class="dot"></div>
			</div>
		</div>

		<header class="header">

			<div class="top-header-section">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-lg-3 col-md-3 col-sm-3 col-6">
							<div class="logo my-3 my-sm-0">
								<a href="{{asset('index.html')}}">
									<img src="{{asset('assets/img/logo.png')}}" alt="logo image" class="img-fluid" width="100">
								</a>
							</div>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-9 col-6 text-right">
							<div class="user-block d-none d-lg-block">
								<div class="row align-items-center">
									<div class="col-lg-12 col-md-12 col-sm-12">
										<div class="user-notification-block align-right d-inline-block">
											<div class="top-nav-search">
												<form>
													<input type="text" class="form-control" placeholder="Search here">
													<button class="btn" type="submit"><i
															class="fa fa-search"></i></button>
												</form>
											</div>
										</div>
										@if(auth()->user()->type == "employee")
										<div class="user-notification-block align-right d-inline-block">
											<ul class="list-inline m-0">
												<li class="list-inline-item" data-toggle="tooltip" data-placement="top"
													title data-original-title="Apply Leave">
													<a href="{{route('employee.leaveApply')}}"
														class="font-23 menu-style text-white align-middle">
														<span class="lnr lnr-briefcase position-relative"></span>
													</a>
												</li>
											</ul>
										</div>
										@endif


										<div class="user-info align-right dropdown d-inline-block header-dropdown">
											<a href="{{asset('javascript:void(0)')}}" data-toggle="dropdown"
												class=" menu-style dropdown-toggle">
												<div class="user-avatar d-inline-block">
													<img src="{{asset('assets/img/profiles/img-6.jpg')}}" alt="user avatar"
														class="rounded-circle img-fluid" width="55">
												</div>
											</a>

											<div
												class="dropdown-menu notification-dropdown-menu shadow-lg border-0 p-3 m-0 dropdown-menu-right">
												<a class="dropdown-item p-2" href="{{asset('employment.html')}}">
													<span class="media align-items-center">
														<span class="lnr lnr-user mr-3"></span>
														<span class="media-body text-truncate">
															<span class="text-truncate">Profile</span>
														</span>
													</span>
												</a>
												<a class="dropdown-item p-2" href="{{asset('settings.html')}}">
													<span class="media align-items-center">
														<span class="lnr lnr-cog mr-3"></span>
														<span class="media-body text-truncate">
															<span class="text-truncate">Settings</span>
														</span>
													</span>
												</a>
												
												<a class="dropdown-item p-2" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('submit-form').submit();">
													<span class="media align-items-center">
														<span class="lnr lnr-power-switch mr-3"></span>
														<span class="media-body text-truncate">
															<span class="text-truncate">Logout</span>
														</span>
													</span>
												</a>
												<form id="submit-form" action="{{route('logout')}}" method="POST" class="hidden">
													@csrf
												
												</form>
											</div>

										</div>

									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>

		</header>


		<div class="page-wrapper">
			@include('partials.flashMessages')

			<div class="container-fluid">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
                        <aside class="sidebar sidebar-user">
                           @yield('sides')
						   
							<div class="user-card card shadow-sm bg-white text-center ctm-border-radius grow">
								<div class="user-info card-body">
									<div class="user-avatar mb-4">
										<img src="assets/img/profiles/img-6.jpg" alt="User Avatar"
											class="img-fluid rounded-circle" width="100">
									</div>
									<div class="user-details">
										<h4><b>Welcome {{auth()->user()->name}}</b></h4>
										<p>({{date("Y-m-d")}})</p>
									</div>
								</div>
							</div>
							@if(auth()->user()->type == "admin")
                            <div class="sidebar-wrapper d-lg-block d-md-none d-none">
                                <div class="card ctm-border-radius shadow-sm border-none grow">
                                    <div class="card-body">
                                        <div class="row no-gutters">
                                            <div class="col-6 align-items-center text-center">
                                                <a href="{{route('admin.employees')}}"
                                                    class="text-dark @if(Route::currentRouteName()=="admin.employees") active @endif p-4 first-slider-btn ctm-border-right ctm-border-left ctm-border-top"><span
                                                        class="lnr lnr-home pr-0 pb-lg-2 font-23"></span><span
                                                        class>Employees</span></a>
                                            </div>
                                            <div class="col-6 align-items-center shadow-none text-center">
                                                <a href="employees.html"
                                                    class="text-dark  p-4 second-slider-btn ctm-border-right ctm-border-top"><span
                                                        class="lnr lnr-users pr-0 pb-lg-2 font-23"></span><span
                                                        class>Company</span></a>
                                            </div>
                                            <div class="col-6 align-items-center shadow-none text-center">
                                                <a href="{{route('admin.leave')}}"
                                                    class="text-dark p-4   @if(Route::currentRouteName()=="admin.leave") active @endif ctm-border-right ctm-border-left"><span
                                                        class="lnr lnr-apartment pr-0 pb-lg-2 font-23"></span><span
                                                        class>Leave</span></a>
                                            </div>
                                            <div class="col-6 align-items-center shadow-none text-center">
                                                <a href="{{route('admin.manage')}}" class="text-dark @if(Route::currentRouteName()=="admin.manage") active @endif p-4 ctm-border-right"><span
                                                        class="lnr lnr-sync pr-0 pb-lg-2 font-23"></span><span
                                                        class>Manage</span></a>
                                            </div>
                                            <div class="col-6 align-items-center shadow-none text-center">
                                                <a href="settings.html"
                                                    class="text-dark p-4 last-slider-btn1 ctm-border-right ctm-border-left"><span
                                                        class="lnr lnr-cog pr-0 pb-lg-2 font-23"></span><span
                                                        class>Settings</span></a>
                                            </div>
                                            <div class="col-6 align-items-center shadow-none text-center">
                                                <a href="employment.html"
                                                    class="text-dark p-4 last-slider-btn ctm-border-right"><span
                                                        class="lnr lnr-user pr-0 pb-lg-2 font-23"></span><span
                                                        class>Profile</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
							
							@endif

            
                        </aside>
                    </div>
                  @yield('content')
                </div>
            </div>
		</div>

	</div>

	<div class="sidebar-overlay" id="sidebar_overlay"></div>

	<script src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>

	<script src="{{asset('assets/js/popper.min.js')}}"></script>
	<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
	@stack('scripts')



	<script src="{{asset('assets/plugins/theia-sticky-sidebar/ResizeSensor.js')}}"></script>
	<script src="{{asset('assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js')}}"></script>

	<script src="{{ asset('assets/plugins/bootstrap-toastr/toastr.min.js') }}" type="text/javascript">
    </script>

	<script src="{{asset('assets/js/script.js')}}"></script>


</body>

</html>