<div id="add_type" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{$title}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add_type_form" action="{{$route}}" method="POST">
                    @csrf
                    @if($method == 2)
                    @method('PUT')
                    @endif
                    <div class="form-group">
                        <label>Title <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="name" @if(isset($type)) value="{{$type->name}}"
                            @endif>
                    </div>
                    <div class="form-group">
                        <label>Duration <span class="text-danger">*</span></label>
                        <div class="cal-icon">
                            <input class="form-control" type="number" name="duration" @if(isset($type))
                                value="{{$type->duration}}" @endif>
                        </div>
                    </div>

                    <div class="submit-section text-center">
                        <button class="btn btn-theme ctm-border-radius text-white submit-btn button-1"
                             type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $('#add_type_form_btn').on('click',function(){       
                event.preventDefault()
                var href=$(this).closest('form').attr('action');

                $.ajax({
                type: "POST",
                url: href,
                cache:false,
                data: $('form#add_type_form').serialize(),
                success: function(response){
                    

                    $("#add_type").modal('hide');
                  
                    $("#leaveTypes_table").load(
                         window.location.href + " #leaveTypes_table",
                         edit_type(),
                         delete_type()
                    );

                    toastr.success(response)


                },
                error: function(response){
                    $.each(response.responseJSON.errors, function (i, v) {
                        var $errors = "<ul>";
                        $.each(v, function (i, v) {
                        $errors += "<li>" + v + "</li>";
                        });
                        $errors += "</ul>";
                        toastr.error($errors);
                    });

                    
                },
                complete: function(response){
                    
                },
	        });
	    });
</script>