@extends('Backend.admin.include.master')

@section('content')
    <div class="dashboard-content-one">
        <!-- Breadcubs Area Start Here -->

        <div>
            <div class="container">
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
                        <form class="mg-b-20" action="{{url('course/search')}}" method="get">
                            @csrf
                            <div class="row gutters-8">

                                <div class="col-3-xxxl col-xl-4 col-lg-3 col-12 form-group">
                                    <input type="text" name="course_code" placeholder="Search by Course Code ..." class="form-control">
                                </div>
                                <div class="col-4-xxxl col-xl-3 col-lg-4 col-12 form-group">
                                    <input type="text" name="course_name" placeholder="Search by Course ..." class="form-control">
                                </div>
                                <div class="col-2-xxxl col-xl-2 col-lg-3 col-12 form-group">
                                    <button type="submit" class="fw-btn-fill btn-gradient-yellow" >SEARCH</button>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive table table-bordered">
                            <table class="table display data-table text-nowrap font_style table_style">
                                <thead >
                                    <tr>
                                        <th style="width:24px">
                                            <div class="form-check">
                                                <input type="checkbox"class="form-check-input checkAll">

                                                {{-- <label class="form-check-label"></label> --}}
                                            </div>
                                        </th>
                                        <th style="width:10%; vertical-align: middle;">Photo</th>
                                        <th class="table_cell" >Student Id<br>
                                        Father Name<br>
                                        Student Name<br>
                                        Mother Name<br>
                                         </th>
                                         <th class="table_cell">Date Of Birth<br>
                                            Religion<br>
                                           Gender<br>
                                            NID/BR<br>
                                             </th>
                                             <th class="table_cell">Course<br>
                                                Session<br>
                                               Class Roll<br>

                                                 </th>
                                                 <th class="table_cell">Educational Qualification<br>
                                                    Board/Passing-Year<br>
                                                   Registration<br>
                                                     </th>


                                        <th>Action</th>


                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($student as $student)
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input">
                                                <label class="form-check-label"></label>
                                            </div>
                                        </td>
                                        <td><img src="{{asset($student->student_photo)}}" alt="" height="50" width="50"></td>
                                        <td class="table_cell"><b> {{$student->st_id_number}}</b><br><b> {{$student->st_name}}</b><br> <b> {{$student->f_name}}</b><br><b>{{$student->m_name}}</b></td>
                                        <td class="table_cell"><b> {{$student->Date_of_birth}}</b><br><b> {{$student->religion}}</b><br> <b> {{$student->gender}}</b><br><b>{{$student->id_number}}</b></td>
                                        <td class="table_cell"><b> {{$student->course->course_name}}</b><br><b> {{$student->session->session_name}}</b><br> <b> {{$student->class_roll}}</b></td>
                                        <td class="table_cell"><b> {{$student->edu_qualification}}</b><br><b> {{$student->reg_board}}/{{$student->passing_year}}</b><br> <b> {{$student->reg_no}}</b></td>



                                        <td style="width:70px">

                                            <a href="{{url('Student/info',$student->id)}}" class="mt-2 btn btn-info btn-lg font_icon" ><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a href="{{url('Student/edit',$student->id)}}" class="mt-2 btn btn-info btn-lg font_icon"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                            {{-- <form action="{{url('Student/delete',$student->id)}}"  method="post" class="mt-2 ">
                                                @csrf
                                             <button type="submit" class="btn btn-danger btn-lg font_icon" onclick="return confirm('Are you sure to delete this item?')" style="font-size:15px"><i class="fas fa-trash"></i></button>
                                         </form> --}}

                                         <button type="submit" class="btn btn-danger btn-lg font_icon" onclick="return confirm('Are you sure to delete this item?')" style="font-size:15px"><i class="fas fa-trash"></i></button>






                                      </td>
                                    </tr>
                                    @endforeach


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
<script>

</script>

