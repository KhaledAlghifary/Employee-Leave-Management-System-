@extends('layouts.dashboard')
@section('sides')
<div class="row">
    <div class="col-12">
        <div class="card ctm-border-radius shadow-sm grow">
            <div class="card-body py-4">
                <div class="row">
                    <div class="col-md-12 mr-auto text-left">
                        <div class="custom-search input-group">
                            <div class="custom-breadcrumb">
                                <ol class="breadcrumb no-bg-color d-inline-block p-0 m-0 mb-2">
                                    <li class="breadcrumb-item d-inline-block"><a href="index.html"
                                            class="text-dark">Home</a>
                                    </li>
                                    <li class="breadcrumb-item d-inline-block active">Dashboard
                                    </li>
                                </ol>
                                <h4 class="text-dark">Dashboard</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="card shadow-sm flex-fill grow">
	<div class="card-header">
		<h4 class="card-title mb-0 d-inline-block">Leave</h4>
		<a href="leave.html" class="d-inline-block float-right text-primary"><i
				class="fa fa-suitcase"></i></a>
	</div>
	<div class="card-body text-center">
		<div class="time-list">
			<div class="dash-stats-list">
				<span class="btn btn-outline-primary">4.5 Days</span>
				<p class="mb-0">Taken</p>
			</div>
			<div class="dash-stats-list">
				<span class="btn btn-outline-primary">7.5 Days</span>
				<p class="mb-0">Remaining</p>
			</div>
		</div>
	</div>
</div>
<div class="col-lg-6 col-md-12 d-flex">

	<div class="card flex-fill today-list shadow-sm grow">
		<div class="card-header">
			<h4 class="card-title mb-0 d-inline-block">Your Upcoming Leave</h4>
			<a href="leave.html" class="d-inline-block float-right text-primary"><i
					class="fa fa-suitcase"></i></a>
		</div>
		<div class="card-body recent-activ">
			<div class="recent-comment">
				<a href="javascript:void(0)" class="dash-card text-danger">
					<div class="dash-card-container">
						<div class="dash-card-icon">
							<i class="fa fa-suitcase"></i>
						</div>
						<div class="dash-card-content">
							<h6 class="mb-0">Mon, 16 Dec 2019</h6>
						</div>
					</div>
				</a>
				<hr>
				<a href="javascript:void(0)" class="dash-card text-primary">
					<div class="dash-card-container">
						<div class="dash-card-icon">
							<i class="fa fa-suitcase"></i>
						</div>
						<div class="dash-card-content">
							<h6 class="mb-0">Mon, 23 Dec 2019</h6>
						</div>
					</div>
				</a>
				<hr>
				<a href="javascript:void(0)" class="dash-card text-primary">
					<div class="dash-card-container">
						<div class="dash-card-icon">
							<i class="fa fa-suitcase"></i>
						</div>
						<div class="dash-card-content">
							<h6 class="mb-0">Wed, 25 Dec 2019</h6>
						</div>
					</div>
				</a>
				<hr>
				<a href="javascript:void(0)" class="dash-card text-primary">
					<div class="dash-card-container">
						<div class="dash-card-icon">
							<i class="fa fa-suitcase"></i>
						</div>
						<div class="dash-card-content">
							<h6 class="mb-0">Fri, 27 Dec 2019</h6>
						</div>
					</div>
				</a>
				<hr>
				<a href="javascript:void(0)" class="dash-card text-primary">
					<div class="dash-card-container">
						<div class="dash-card-icon">
							<i class="fa fa-suitcase"></i>
						</div>
						<div class="dash-card-content">
							<h6 class="mb-0">Tue, 31 Dec 2019</h6>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
</div>
@endsection