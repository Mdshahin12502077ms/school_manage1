<div class="modal fade" id="standard-modal" tabindex="-1" role="dialog"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Add Fund For Registration</h5>
            <button type="button" class="close" data-dismiss="modal"
                aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

            <form action="{{url('Registration/Fund/Insert')}}" method="POST">
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
                        @if($errors->has('course_name'))
                        <div class="error" style="color:red">{{ $errors->first('course_name') }}</div>
                     @endif
                </div>


                <div class="mb-3 col-md-12  form-group">
                    <label for="">Study Session</label>
                    <input type="text" name="session_name" class="form-control" id="sessionName"
                        placeholder=""style="font-size:20px">
                        @if($errors->has('session_name'))
                        <div class="error" style="color:red">{{ $errors->first('session_name') }}</div>
                     @endif
                </div>

                <div class=" col-md-12 form-group">
                    <label> Pay For*</label>
                    <select name="pay_for" class="form-control" id="search_course" >
                        <option value="">Please Select Paying For</option>
                        <option value="Registration Fee">Registration Fee</option>
                        <option value="Institute Fine">Institute Fine</option>
                    </select>
                    @if($errors->has('pay_for'))
                       <div class="error" style="color:red">{{ $errors->first('pay_for') }}</div>
                    @endif
                </div>


                <div class="mb-3 col-md-12  form-group">
                    <label for="">Amount</label>
                    <input type="text" name="amount" class="form-control" id="sessionName"
                        placeholder=""style="font-size:20px">
                        @if($errors->has('amount'))
                        <div class="error" style="color:red">{{ $errors->first('amount') }}</div>
                     @endif
                </div>

                <div class="modal-footer">
                    <button type="button" class="footer-btn bg-dark-low"
                        data-dismiss="modal">Close</button>
                    <button type="submit" class="footer-btn bg-linkedin"> Fund Save</button>
                </div>
            </form>



        </div>

    </div>
</div>
</div>
