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


                            <div class="col-xl-4 col-lg-6 col-12 form-group">
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



                            <div class="col-xl-4 col-lg-6 col-12  form-group">
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
                              <div class="col-xl-4 col-lg-6 col-12  form-group" align="center"  id="Available_blance">

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
                                  <th style="width:10%; vertical-align: middle;color:black;font-size:15px">Pay Online</th>
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

        @include('Frontend.Payment.paymentModule')

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
                    //    console.log(data.data);
            let tableBody = '';
            let available_balance = data.amount;
            if(available_balance!==null){
                $('#Available_blance').html(`
                    <div class="mt-3 form-group">
                        <p class="mt-5 form-group" style="margin-right:5px">
                            Available Balance: ${available_balance}
                        </p>
                    </div>`);
            }
        if (data.data.length > 0) {

            data.data.forEach(function(item, index) {
                tableBody += `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${item.course.course_name}</td>
                        <td>${item.session.session_name}</td>
                        <td>${item.pay_for}</td>
                        <td>${item.amount}</td>
                        <td>${item.status}</td>
                        <td>
                                <a type="button" href=""
                                class="btn btn-info btn-lg Payment" style="font-size:15px; margin:4%;"
                                data-toggle="modal"
                                data-id="${item.id}"
                                data-amount="${item.amount}"
                                data-target="#payment-modal">
                                Pay
                                </a>
                        </td>
                        <td><a href="/Registration/fund/voucher/Pdf/${item.id}" target="_blank">Print Voucher</a></td>
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
<script>
$(document).on('click', '.Payment', function() {
    var id = $(this).data('id');
    var amount = $(this).data('amount');

    // Send the data to the server
    $.ajax({
        url: '/store-payment-data',  // URL to send the request to
        method: 'POST',
        data: {
            id: id,
            amount: amount,
            _token: '{{ csrf_token() }}'  // CSRF token for security
        },
        success: function(response) {
           
            console.log('Payment data stored in session');
        },
        error: function(xhr) {
            console.error('Error:', xhr.responseText);
        }
    });
});
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection

