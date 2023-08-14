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



    <div id="formContainer"></div>




    <div class="card ctm-border-radius shadow-sm grow">
        <div class="card-header d-flex align-items-center">
            <h4 class="card-title mb-0">Today Leaves</h4>
            <a href="{{route('types.create')}}" id="leave_type_button_create"
                style="width: max-content; margin-left: auto;"
                class="btn btn-theme button-1 ctm-border-radius text-white btn-block"><span><i
                        class="fe fe-plus"></i></span> Create New</a>

        </div>

        <div class="card-body" id="leaveRequests_table">
            <div class="employee-office-table">
                <div class="table-responsive" id="tag_container">
                    <table class="table custom-table mb-0" id="types_tabel">
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
                                   
                                    <h2><a href="javascript:void(0)">{{$type->name}}</a></h2>
                                </td>
                                <td>{{$type->duration}}</td>

                                <td><a href="{{route('types.edit',$type->id)}}"
                                        class="btn btn-dark edit_type_btn">Edit</a></td>
                                <td>
                                    <form action="{{route('types.destroy',$type->id)}}" id="delete_type_btn"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger delete_type_btn">Delete</button>
                                    </form>
                                </td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {!! $leaveTypes->links() !!}


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

<script>
    $(document).ready(function() {
      
        $('#leave_type_button_create').on('click', function() {
            event.preventDefault()

            var href=$(this).attr('href');
            
            $.ajax({
                url: href , 
                type: 'GET',
                dataType: 'html',
                success: function(data) {

                    $('#formContainer').html(data);
                    $('#add_type').modal('show');

                    

                 
                },
                error: function() {
                    alert('Failed to load the form.');
                }
            });


           
        });

      

        edit_type();

        // delete_type();
    });

   
     
    function edit_type()
        {
            $('#types_tabel').on('click', '.edit_type_btn',function() {
            event.preventDefault()

            var href=$(this).attr('href');
            
            $.ajax({
                url: href , 
                type: 'GET',
                dataType: 'html',
                success: function(data) {

                    $('#formContainer').html(data);
                    $('#add_type').modal('show');

                 
                },
                error: function() {
                    alert('Failed to load the form.');
                }
            });


           
                    });
        }
       

        // function delete_type(){
        //     $('#types_tabel').on('click','.delete_type_btn',function(){       
        //         event.preventDefault()
        //         var href=$(this).closest('form').attr('action');

        //         $.ajax({
        //         type: "DELETE",
        //         url: href,
        //         cache:false,
        //         data: $('form#delete_type_btn').serialize(),
        //         success: function(response){
                    
                  
        //             $("#leaveTypes_table").load(
        //                  window.location.href + " #leaveTypes_table"
        //             );

        //             toastr.success(response)


        //         },
        //         error: function(response){
        //             $.each(response.responseJSON.errors, function (i, v) {
        //                 var $errors = "<ul>";
        //                 $.each(v, function (i, v) {
        //                 $errors += "<li>" + v + "</li>";
        //                 });
        //                 $errors += "</ul>";
        //                 toastr.error($errors);
        //             });

                    
        //         },
        //         complete: function(response){
                    
        //         },
	    //          });
	    //      });

            
        //      }
       
  
	

    
</script>

@endpush