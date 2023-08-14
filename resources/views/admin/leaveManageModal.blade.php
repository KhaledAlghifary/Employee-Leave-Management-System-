<div id="manage_leave" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Manage Leave Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="manage_leave_form" action="{{$route}}" method="POST">
                    @csrf
                   <input hidden name="user_id" value="{{$user_id}}"/>
                   <input hidden name="status" value="{{$status}}"/>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group mb-0">
                                <label>Reason</label>
                                <textarea class="form-control" rows="4" name="admin_comments" id="admin_comments"></textarea>
                            
                            </div>
                        </div>
                    </div>

                    <div class="submit-section text-center">
                        <button class="btn btn-theme ctm-border-radius text-white submit-btn button-1"
                            id="add_manage_leave" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

