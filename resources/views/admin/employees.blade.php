@extends('layouts.dashboard')
@section('sides')
<div class="card ctm-border-radius shadow-sm grow">
    <div class="card-body py-4">
        <div class="row">
            <div class="col-md-12 mr-auto text-left">
                <div class="custom-search input-group">
                    <div class="custom-breadcrumb">
                        <ol class="breadcrumb no-bg-color d-inline-block p-0 m-0 mb-2">
                            <li class="breadcrumb-item d-inline-block"><a href="index.html"
                                    class="text-dark">Home</a></li>
                            <li class="breadcrumb-item d-inline-block active">Employees</li>
                        </ol>
                        <h4 class="text-dark">Employees</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="col-xl-9 col-lg-8 col-md-12">
    <div class="card shadow-sm grow ctm-border-radius">
        <div class="card-body align-center">
            <h4 class="card-title float-left mb-0 mt-2">{{$employees->count()}} People</h4>
            <ul class="nav nav-tabs float-right border-0 tab-list-emp">
                <li class="nav-item pl-3">
                    <a href="add-employee.html"
                        class="btn btn-theme button-1 text-white ctm-border-radius p-2 add-person ctm-btn-padding"><i
                            class="fa fa-plus"></i> Add Person</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="ctm-border-radius shadow-sm grow card">
        <div class="card-body">

            <div class="row people-grid-row">
                @foreach ( $employees as $employee )
                <div class="col-md-6 col-lg-6 col-xl-4">
                    <div class="card widget-profile">
                        <div class="card-body">
                            <div class="pro-widget-content text-center">
                                <div class="profile-info-widget">
                                    <a href="employment.html" class="booking-doc-img">
                                        <img src="assets/img/profiles/img-6.jpg" alt="User Image">
                                    </a>
                                    <div class="profile-det-info">
                                        <h4><a href="employment.html" class="text-primary">{{$employee->name}}</a></h4>
                                        <div>
                                            <p class="mb-0"><b>PHP Team Lead</b></p>
                                            <p class="mb-0 ctm-text-sm"><a
                                                    href="https://dleohr.dreamguystech.com/cdn-cgi/l/email-protection"
                                                    class="__cf_email__"
                                                    data-cfemail="1e737f6c777f7d716a6a71705e7b667f736e727b307d7173">[email&#160;protected]</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
               
            </div>
        </div>
    </div>
</div>
@endsection