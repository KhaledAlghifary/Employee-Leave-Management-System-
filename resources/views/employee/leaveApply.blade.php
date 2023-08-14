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
                            <select class="form-control select" name="leave_type_id" id="leave_type_id">
                                <option value=" ">Select Leave</option>
                                @foreach ($leaveTypes as $type )
                                <option value="{{$type->id}}">{{$type->name}}</option>
                                    
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="col-sm-6 leave-col">
                        <div class="form-group">
                            <label>Remaining Leaves</label>
                            <input type="text" class="form-control" placeholder="{{auth()->user()->remaining_days}}"
                                disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>From</label>
                            <input type="date" class="form-control " name="start_date" id="start_date">
                        </div>
                       
                    </div>
                    <div class="col-sm-6 leave-col">
                        <div class="form-group">
                            <label>To</label>
                            <input type="date" class="form-control" name="end_date" id="end_date">
                        </div>
                       
                        
                    </div>
                </div>
               
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group mb-0">
                            <label>Reason</label>
                            <textarea class="form-control" rows="4" name="employee_comments" id="employee_comments"></textarea>
                        
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <a href="javascript:void(0);"
                        class="btn btn-theme button-1 text-white ctm-border-radius mt-4" id="apply_leave_form_btn">Apply</a>
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

<script>

$('#apply_leave_form_btn').on('click',function(){       
                event.preventDefault()
                var href=$('#submit-apply').attr('action');
                const $elementsWithDangerClass = $('.card-body').find('.error');
    
                // Loop through the collection and perform actions on each element
                $elementsWithDangerClass.each(function() {
                    const $element = $(this);
                    $element.closest('.form-control').removeClass('is-invalid');
                    debugger
                    $element.remove();
                
                
                });

                $.ajax({
                type: "POST",
                url: href,
                cache:false,
                data: $('form#submit-apply').serialize(),
               
                success: function(response){

                    var route="{{route('employee.dashboard')}}";
                    window.location.replace(route);
                    toastr.success(response)



                },
                error: function(response){debugger
                    if(typeof response.responseJSON !== 'undefined'){
                        $.each(response.responseJSON.errors, function (i, v) {
                        $('#'+i).addClass('form-control is-invalid');

                        var spanElement = $('<span>').addClass('text-danger error').text(v);
                        $('#'+i).closest('div').append(spanElement);
                        var $errors = "<ul>";
                        $.each(v, function (i, v) {
                        $errors += "<li>" + v + "</li>";
                        });
                        $errors += "</ul>";
                        toastr.error($errors);
                    });
                    }
                    

                    
                },
                complete: function(response){
                    
                },
	        });
	    });
</script>
@endpush