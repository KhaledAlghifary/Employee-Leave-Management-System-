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
				<span class="btn btn-outline-primary">{{$taken_days}} Days</span>
				<p class="mb-0">Taken</p>
			</div>
			<div class="dash-stats-list">
				<span class="btn btn-outline-primary">{{$remaining_days}} Days</span>
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
				@forelse ($user_leave_requests as $request)
					
				<a href="javascript:void(0)" class="dash-card text-danger">
					<div class="dash-card-container">
						<div class="dash-card-icon">
							<i class="fa fa-suitcase"></i>
						</div>
						<div class="dash-card-content " style="display: flex; justify-content: space-between;">
							<h6 class="mb-0">{{$request->start_date}}</h6>
							@if($request->status == "Pending")
							<span class=" px-2 py-1 rounded mb-2 bg-secondary text-white">{{$request->status}}</span>
							@elseif($request->status == "Approved")
							<span class=" px-2 py-1 rounded mb-2 bg-success text-white">{{$request->status}}</span>
							@else
							<span class=" px-2 py-1 rounded mb-2 bg-danger text-white">{{$request->status}}</span>
							@endif
						</div>
					</div>
				</a>
				<hr>
				@empty

				@endforelse
				
			</div>
		</div>
	</div>
</div>

@endsection