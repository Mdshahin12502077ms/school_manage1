<div class="modal fade" id="standard-modal" tabindex="-1" role="dialog"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Generate Password</h5>
            <button type="button" class="close" data-dismiss="modal"
                aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

            <form action="{{url('Generate/Password')}}" method="POST">
                @csrf
                <div class="mb-3 col-md-12  form-group">
                    <input type="text" name="course_id" class="form-control" id="courseId"
                        placeholder="" hidden style="font-size:20px">
                </div>
                <div class="mb-3 col-md-12  form-group">
                    <input type="text" name="session_id" class="form-control" id="sessionId"
                        placeholder="" hidden style="font-size:20px">
                </div>
                <div class="mb-3 col-md-12  form-group">
                    <label for="">Course Name</label>
                    <input type="text" name="course_name" class="form-control" id="courseName"
                        placeholder=""style="font-size:20px">
                </div>


                <div class="mb-3 col-md-12  form-group">
                    <label for="">Session</label>
                    <input type="text" name="session_name" class="form-control" id="sessionName"
                        placeholder=""style="font-size:20px">
                </div>
                <div class="modal-footer">
                    <button type="button" class="footer-btn bg-dark-low"
                        data-dismiss="modal">Close</button>
                    <button type="submit" class="footer-btn bg-linkedin">Update</button>
                </div>
            </form>



        </div>

    </div>
</div>
</div>
