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
    <div id="formContainer"></div>


<div class="card ctm-border-radius shadow-sm grow">
    <div class="card-header">
        <h4 class="card-title mb-0">All Leaves</h4>
    </div>
    <div class="card-body">
        <div class="employee-office-table">
            <div class="table-responsive" style="max-width:934px; overflow-x: auto;">
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
                            <th >Action</th>
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
                            <td>{{$request->leaveType->name}}</td>
                            <td>{{$request->start_date}}</td>
                            <td>{{$request->end_date}}</td>
                            <td class="text-center">{{$request->leaveType->duration}}</td>
                            <td class="text-center">{{$request->employee->remaining_days}}</td>
                            <td>{{$request->employee_comments}}</td>
                            <td>
                                @if($request->status == "Pending")
                                <span class=" px-2 py-1 rounded mb-2 bg-secondary text-white">{{$request->status}}</span>
                                @elseif($request->status == "Approved")
                                <span class=" px-2 py-1 rounded mb-2 bg-success text-white">{{$request->status}}</span>
                                @else
                                <span class=" px-2 py-1 rounded mb-2 bg-danger text-white">{{$request->status}}</span>
                                @endif
                            </td>
                            <td>
                                <div class="dropdown action-label drop-active">
                                <a href="javascript:void(0)" class="btn btn-white btn-sm dropdown-toggle" data-toggle="dropdown"> In Progress <i class="caret"></i></a>
                                <div class="dropdown-menu">
                                <a class="dropdown-item actionManage"  href="{{route('admin.manageLeaveModal',[1,$request->user_id,$request->id])}}"> Accept</a>
                                <a class="dropdown-item actionManage"  href="{{route('admin.manageLeaveModal',[2,$request->user_id,$request->id])}}"> Reject</a>
                                </div>
                                </div></td>
                        </tr>
                        @endforeach
                       
                    </tbody>
                </table>
                {!!$requests->links()!!}


            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>

$('.actionManage').on('click', function() {
            event.preventDefault()

            var href=$(this).attr('href');
            
            $.ajax({
                url: href , 
                type: 'GET',
                dataType: 'html',
                success: function(data) {

                    $('#formContainer').html(data);
                    $('#manage_leave').modal('show');

                    

                 
                },
                error: function() {
                    alert('Failed to load the form.');
                }
            });


           
        });
</script>
@endpush
