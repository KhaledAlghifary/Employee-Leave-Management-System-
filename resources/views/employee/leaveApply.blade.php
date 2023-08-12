@extends('layouts.dashboard')
@section('content')


<div class="col-xl-9 col-lg-8 col-md-12">
    <div class="card ctm-border-radius shadow-sm grow">
        <div class="card-header">
            <h4 class="card-title mb-0">Apply Leaves</h4>
        </div>
        <div class="card-body">
            <form id="submit-apply" action="{{route('employee.storeLeave')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>
                                Leave Type
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-control select" name="leave_type_id">
                                <option>Select Leave</option>
                                @foreach ($leaveTypes as $type )
                                <option value="{{$type->id}}">{{$type->name}}</option>
                                    
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 leave-col">
                        <div class="form-group">
                            <label>Remaining Leaves</label>
                            <input type="text" class="form-control" placeholder="10"
                                disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>From</label>
                            <input type="text" class="form-control datetimepicker" name="start_date">
                        </div>
                    </div>
                    <div class="col-sm-6 leave-col">
                        <div class="form-group">
                            <label>To</label>
                            <input type="text" class="form-control datetimepicker" name="end_date">
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-sm-6 leave-col">
                        <div class="form-group">
                            <label>Number of Days Leave</label>
                            <input type="text" class="form-control" placeholder="2"
                                disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group mb-0">
                            <label>Reason</label>
                            <textarea class="form-control" rows="4" name="employee_comments"></textarea>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <a href="javascript:void(0);"
                        class="btn btn-theme button-1 text-white ctm-border-radius mt-4" onclick="event.preventDefault(); document.getElementById('submit-apply').submit();">Apply</a>
                    <a href="javascript:void(0);"
                        class="btn btn-danger text-white ctm-border-radius mt-4">Cancel</a>
                </div>
            </form>
        </div>
    </div>
   
</div>
@endsection

@push('scripts')
<script src="{{asset('assets/plugins/select2/moment.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>

<script src="{{asset('assets/plugins/select2/select2.min.js')}}"></script>
@endpush