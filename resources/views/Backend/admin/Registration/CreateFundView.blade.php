@extends('Backend.admin.include.master')

@section('content')
    <div class="dashboard-content-one">
        <!-- Breadcubs Area Start Here -->

        <div>
            <div class="container col-lg-12">
                <div class="row">
                    <div class="col-md-12 table_body">
                        <div class="card">
                          <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->

                <!-- Breadcubs Area End Here -->
                <!-- Class Table Area Start Here -->
                <div class="card height-auto mt-2">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Fund Check</h3>
                            </div>

                        </div>



                        <div class="row">


                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Course*</label>
                                <select name="course_id" class="form-control" id="search_course" >
                                    <option value="">Please Select Course</option>
                                    @foreach ($course as $course)
                                    <option value="{{$course->id}}" data-name="{{$course->course_name}}">{{$course->course_name}}</option>

                                    @endforeach
                                </select>
                                @if($errors->has('course_id'))
                                   <div class="error" style="color:red">{{ $errors->first('course_id') }}</div>
                                @endif
                            </div>



                            <div class="col-xl-3 col-lg-6 col-12  form-group">
                                <label>Session*</label>
                                <select name="session_id"  class="form-control" id="search_session" >
                                    <option value="">Please Select Session</option>
                                    @foreach ($session as $session)
                                    <option value="{{$session->id}}" data-name="{{$session->session_name}}">{{$session->session_name}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('course_id'))
                                <div class="error" style="color:red">{{ $errors->first('course_id') }}</div>
                             @endif
                            </div>
                              <div id="Available_blance" style="display:none">
                                <div class="pb-3 mt-5">
                                   {{-- <input type="text" value="{{$available_payment->amount}}"> --}}
                                 </div>
                              </div>


                        </div>
                     <div class="col-md-12" style="background-color: green;height:8vh">
                        <div class="row">
                            <div class="col-md-3 text-white" style="line-height: 8vh">Institute Payment Details</div>
                             <div class="col-md-6"> </div>
                            <div class="col-md-3" align="right">
                                <a type="button" href=""
                                class="btn btn-info btn-lg addFund" style="font-size:15px; margin:4%;"
                                data-toggle="modal"
                                data-course="{{$course->course_name}}"
                                data-session="{{$session->id}}"

                                data-target="#standard-modal">
                                  Add Fund
                               </a>
                            </div>
                        </div>

                     </div>
                        <div class="table-responsive table table-bordered">
                            <table class="table display data-table text-nowrap font_style table_style" id="students-table">
                                <thead >
                                  <th style="width:10%; vertical-align: middle;color:black;font-size:15px">Sl No</th>
                                  <th style="width:10%; vertical-align: middle;color:black;font-size:15px">Course Name</th>
                                  <th style="width:10%; vertical-align: middle;color:black;font-size:15px">Session Name</th>
                                  <th style="width:10%; vertical-align: middle;color:black;font-size:15px">Pay For</th>
                                  <th style="width:10%; vertical-align: middle;color:black;font-size:15px">Amount</th>
                                  <th style="width:10%; vertical-align: middle;color:black;font-size:15px">Pay Status</th>
                                  <th style="width:10%; vertical-align: middle;color:black;font-size:15px">Print Paid Voucher</th>
                                </thead>
                                <tbody style="color:black;font-size:13px" id="">




                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Class Table Area End Here -->

            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>
        <!-- Social Media End Here -->
        @include('Backend.admin.Registration.addFundModal')

    @endsection

    @section('js')

 <script>
    $(document).ready(function(){
       $('#search_course,#search_session').change(function(){
         var course_id=$('#search_course').val();
         var session_id=$('#search_session').val();

         $.ajax({
                    url:'{{url('Registration/reg/fund')}}',
                    type:'GET',
                    data:{
                        course_id: course_id,
                        session_id: session_id,
                    },
                    success: function(data) {
        let tableBody = '';

        if (data.length > 0) {
            data.forEach(function(item, index) {
                tableBody += `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${item.course_name}</td>
                        <td>${item.session_name}</td>
                        <td>${item.pay_for}</td>
                        <td>${item.amount}</td>
                        <td>${item.pay_status}</td>
                        <td><a href="${item.voucher_url}" target="_blank">Print Voucher</a></td>
                    </tr>`;
            });
        } else {
            tableBody = '<tr><td colspan="7" class="text-center">No records found</td></tr>';
        }

        $('#students-table tbody').html(tableBody); // Insert the rows into the tbody
    },
    error: function() {
        $('#students-table tbody').html('<tr><td colspan="7" class="text-center">Error fetching data</td></tr>');
    }

                   });

       });
    });
 </script>


 <script>

   $(document).on('click','.addFund',function(){
    var courseId = $('#search_course').val();
     var courseName = $('#search_course option:selected').data('name');
    var session_id=$('#search_session').val();
    var sessionName = $('#search_session option:selected').data('name');




     $('#courseId').val(courseId);
     $('#courseName').val(courseName);
     $('#sessionId').val(session_id);
     $('#sessionName').val(sessionName);
});
</script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection

