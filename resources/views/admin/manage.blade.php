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
                                    <li class="breadcrumb-item d-inline-block active">Manage
                                    </li>
                                </ol>
                                <h4 class="text-dark">Manage</h4>
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
<div class="col-xl-9 col-lg-8 col-md-12">
    <div class="quicklink-sidebar-menu ctm-border-radius shadow-sm grow bg-white card">
        <div class="card-body">
            <ul class="list-group list-group-horizontal-lg">
                <li class="list-group-item text-center active button-5"><a href="manage.html" class="text-white">Manage Departments</a></li>
                <li class="list-group-item text-center button-6"><a class="text-dark"
                        href="manage-leadership.html">Manage Employess</a></li>
            </ul>
        </div>
    </div>
   
    <div id="add_event" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Leave Type</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label>Title <span class="text-danger">*</span></label>
                            <input class="form-control" type="text">
                        </div>
                        <div class="form-group">
                            <label>Duration <span class="text-danger">*</span></label>
                            <div class="cal-icon">
                                <input class="form-control" type="number">
                            </div>
                        </div>
                       
                        <div class="submit-section text-center">
                            <button
                                class="btn btn-theme ctm-border-radius text-white submit-btn button-1">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    

       

        <div class="card ctm-border-radius shadow-sm grow">
            <div class="card-header d-flex align-items-center">
                <h4 class="card-title mb-0">Today Leaves</h4>
                <a href="javascript:void(0)" style="width: max-content; margin-left: auto;" class="btn btn-theme button-1 ctm-border-radius text-white btn-block" data-toggle="modal" data-target="#add_event"><span><i class="fe fe-plus"></i></span> Create New</a>
            </div>
           
            <div class="card-body">
                <div class="employee-office-table">
                    <div class="table-responsive">
                        <table class="table custom-table mb-0">
                            <thead>
                                <tr>
                                    <th>title</th>
                                    <th>Duration</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $leaveTypes as $type)
                                <tr>
                                    <td>
                                        <a href="employment.html" class="avatar"><img
                                                alt="avatar image"
                                                src="assets/img/profiles/img-5.jpg"
                                                class="img-fluid"></a>
                                        <h2><a href="employment.html">{{$type->name}}</a></h2>
                                    </td>
                                    <td>{{$type->duration}}</td>
                                   
                                    <td>3</td>
                                    <td>9</td>
                                    
                                </tr>
                                @endforeach
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

       
       
</div>
@endsection


@push('scripts')
<script src="{{asset('assets/plugins/select2/moment.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>

<script src="{{asset('assets/plugins/select2/select2.min.js')}}"></script>
@endpush