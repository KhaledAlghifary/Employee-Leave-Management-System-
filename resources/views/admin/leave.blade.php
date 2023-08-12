@extends('layouts.dashboard')
@section('sides')
    <div class="col-md-12">
        <div class="card ctm-border-radius shadow-sm grow">
            <div class="card-body py-4">
                <div class="row">
                    <div class="col-md-12 mr-auto text-left">
                        <div class="custom-search input-group">
                            <div class="custom-breadcrumb">
                                <ol
                                    class="breadcrumb no-bg-color d-inline-block p-0 m-0 mb-2">
                                    <li class="breadcrumb-item d-inline-block"><a
                                            href="index.html" class="text-dark">Home</a>
                                    </li>
                                    <li class="breadcrumb-item d-inline-block active">Leave
                                    </li>
                                </ol>
                                <h4 class="text-dark">Leave</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')

<div class="card ctm-border-radius shadow-sm grow">
    <div class="card-header">
        <h4 class="card-title mb-0">Today Leaves</h4>
    </div>
    <div class="card-body">
        <div class="employee-office-table">
            <div class="table-responsive">
                <table class="table custom-table mb-0">
                    <thead>
                        <tr>
                            <th>Employee</th>
                            <th>Leave Type</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Days</th>
                            <th>Remaining Days</th>
                            <th>Notes</th>
                            <th>Status</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $requests as $request)
                        <tr>
                            <td>
                                <a href="employment.html" class="avatar"><img
                                        alt="avatar image"
                                        src="assets/img/profiles/img-5.jpg"
                                        class="img-fluid"></a>
                                <h2><a href="employment.html">{{$request->employee->name}}</a></h2>
                            </td>
                            <td>{{$request->leaveType}}</td>
                            <td>{{$request->start_date}}</td>
                            <td>{{$request->end_date}}</td>
                            <td>3</td>
                            <td>9</td>
                            <td>{{$request->employee_comments}}</td>
                            <td>
                                @if($request->status == "Pending")
                                <span class="p-3 mb-2 bg-secondary text-white">{{$request->status}}</span>
                                @elseif($request->status == "Approved")
                                <span class="p-3 mb-2 bg-success text-white">{{$request->status}}</span>
                                @else
                                <span class="p-3 mb-2 bg-danger text-white">{{$request->status}}</span>
                                @endif
                            </td>
                            <td class="text-right text-danger"><a
                                    href="javascript:void(0);"
                                    class="btn btn-sm btn-outline-danger"
                                    data-toggle="modal" data-target="#delete">
                                    <span class="lnr lnr-trash"></span> Delete
                                </a></td>
                        </tr>
                        @endforeach
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
