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
                                <h3>All Student</h3>
                            </div>

                        </div>



                        <div class="row">

                            @if (Auth::user()->admin_role=='superadmin')
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                @php
                                  $institute=App\Models\Branch::all();
                                @endphp
                                <label>Institute*</label>
                                <select name="institute_id" class="form-control" id="search_branch">
                                    <option value="">Please Select Institute</option>
                                    @foreach ($institute as $institute)
                                    <option value="{{$institute->id}}">{{$institute->institute_name}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('course_id'))
                                   <div class="error" style="color:red">{{ $errors->first('course_id') }}</div>
                                @endif
                            </div>
                            @endif
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Course*</label>
                                <select name="course_id" class="form-control" id="search_course" >
                                    <option value="">Please Select Course</option>
                                    @foreach ($course as $course)
                                    <option value="{{$course->id}}">{{$course->course_name}}</option>
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
                                    <option value="{{$session->id}}">{{$session->session_name}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('course_id'))
                                <div class="error" style="color:red">{{ $errors->first('course_id') }}</div>
                             @endif
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Year*</label>
                                <select name="year" class="form-control" id="search_year" >
                                    <option value="">Please Select Year</option>
                                    @foreach ($year as $year)
                                    <option value="{{$year->id}}">{{$year->education_year}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('course_id'))
                                   <div class="error" style="color:red">{{ $errors->first('course_id') }}</div>
                                @endif
                            </div>





                            <div class="col-xl-3 col-lg-6 col-12  form-group">
                                <label></label>
                                <form class="mg-b-20" action="{{url('course/search')}}" method="get">
                                    @csrf
                                    <div class="row gutters-8">

                                        <div class="col-8-xxxl col-xl-4 col-lg-3 col-12 form-group">
                                            <input type="text" name="course_code" placeholder="Search by Course Code ..." class="form-control">
                                        </div>

                                        <div class="col-4-xxxl col-xl-2 col-lg-3 col-12 form-group">
                                            <button type="submit" class="fw-btn-fill btn-gradient-yellow" >SEARCH</button>
                                        </div>
                                    </div>
                                </form>
                            </div>


                              <div >
                                <div class="pb-3 mt-5">
                                    <a  class="fw-btn-fill btn-gradient-yellow" href="{{url('Student/addmission/form')}}">Add New Student</a>
                                 </div>
                              </div>


                        </div>

                        <div class="table-responsive table table-bordered">
                            <table class="table display data-table text-nowrap font_style table_style" id="students-table">
                                <thead >
                                    <tr>
                                        <th style="width:24px">
                                            <div class="form-check">

                                                <input type="checkbox"class="form-check-input checkAll">

                                                {{-- <label class="form-check-label"></label> --}}

                                                <input type="checkbox" class="form-check-input checkAll">
                                                <label class="form-check-label">All</label>

                                            </div>
                                        </th>
                                        <th style="width:10%; vertical-align: middle;color:black;font-size:15px"><b>Photo</b></th>
                                        <th class="table_cell" style="color:black;font-size:15px" ><b>Student Id<br>
                                        Father Name<br>
                                        Student Name<br>
                                        Mother Name<br></b>
                                         </th>
                                         <th class="table_cell" style="color:black;font-size:15px"><b> Date Of Birth<br>
                                            Religion<br>
                                           Gender<br>
                                            NID/BR<br>
                                        </b>
                                             </th>
                                             <th class="table_cell"style="color:black;font-size:15px"><b>  Course<br>
                                                Session<br>
                                               Class Roll<br>
                                            </b>
                                                 </th>
                                                 <th class="table_cell"style="color:black;font-size:15px"><b> Educational Qualification<br>
                                                    Board/Passing-Year<br>
                                                   Registration<br>
                                                 </b>
                                                     </th>


                                        <th style="color:black;font-size:15px"><b> Action</b></th>


                                    </tr>
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


    @endsection
    @section('js')
    <script>

        $(document).ready(function () {
            $('#search_branch,#search_course,#search_year,#search_session,#registration').change(function () {
              var branch_id=$('#search_branch').val();
              var course_id=$('#search_course').val();
              var eduyear_id=$('#search_year').val();
              var session_id=$('#search_session').val();
              var registration=$('#registration').val();
            $.ajax({
            url:'{{ url('Student/get/Search') }}',
            type: 'GET',
            data: {
                branch_id: branch_id,
                course_id:course_id,
                eduyear_id:eduyear_id,
                session_id:session_id,
                registration:registration,
              },
              success: function(data) {


                    let adminRole = data.auth_role;
                    let html = '';

                    if (data.data.length > 0) {
                        data.data.forEach(function(student) {
                            html += `
                                <tr data-student-id="${student.id}">
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" name="St_reg[${student.id}]" class="student-checkbox" value="${student.id}" id="select-all" class="form-check-input">
                                            <label class="form-check-label"></label>
                                        </div>
                                    </td>
                                    <td><img src="{{asset('${student.student_photo}')}}" alt="Photo of ${student.st_name}" height="100" width="100"></td>
                                    <td class="table_cell">
                                        <b>${student.st_id_number}</b><br>
                                        <b>${student.st_name}</b><br>
                                        <b>${student.f_name}</b><br>
                                        <b>${student.m_name}</b>
                                    </td>
                                    <td class="table_cell">
                                        <b>${student.Date_of_birth}</b><br>
                                        <b>${student.religion}</b><br>
                                        <b>${student.gender}</b><br>
                                        <b>${student.id_number}</b>
                                    </td>
                                    <td class="table_cell">
                                        <b>${student.course.course_name}</b><br>
                                        <b>${student.session.session_name}</b><br>
                                        <b>${student.class_roll}</b><br>

                                    </td>
                                    <td class="table_cell">
                                        <b>${student.edu_qualification}</b><br>
                                        <b>${student.reg_board}/${student.passing_year}</b><br>
                                        <b>${student.reg_no}</b>
                                    </td>`;

                               if(student.status==='registered' && adminRole==='instituteadmin'){
                                      html += `<td>
                                        <a href="/Student/register/cancel/${student.id}" class="mt-2 btn btn-info btn-lg font_icon text-center" style="background-color:red"><i class="fa fa-times" aria-hidden="true"></i></a>

                                        `;
                                        }
                                        else{
                                            html += `<td style="display: flex">
                                        <a href="/Student/info/${student.id}" class="mt-2 btn btn-info btn-lg font_icon"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a href="/Student/edit/${student.id}" class="mt-2 btn btn-info btn-lg font_icon"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                        <form action="/Student/delete/${student.id}" method="post" class="mt-2">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button type="submit" class="btn btn-danger btn-lg font_icon" onclick="return confirm('Are you sure to delete this item?')" style="font-size:15px"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            `;
                                        }

                        });
                    } else {
                        html = `
                            <tr>
                                <td colspan="7">No students found for this course.</td>
                            </tr>
                        `;
                    }

                    $('#students-table tbody').html(html);
                    $('#students-table').show();
                },
                error: function(error) {
                    console.error('Error fetching data:', error);
                }
        });
            });
        });
    </script>





<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
