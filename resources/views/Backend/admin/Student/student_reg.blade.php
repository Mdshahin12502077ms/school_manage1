@extends('Backend.admin.include.master')

@section('content')
    <div class="dashboard-content-one">
        <!-- Breadcubs Area Start Here -->
        <div class="breadcrumbs-area">
            <h3>All STUDENT</h3>
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>All Student</li>
            </ul>
        </div>
        <div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                          <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->

                <!-- Breadcubs Area End Here -->
                <!-- Class Table Area Start Here -->
                <div class="card height-auto">
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
                        <div class="table-responsive">
                            <table class="table display data-table text-nowrap">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="form-check">
                                                <input type="checkbox"class="form-check-input checkAll">

                                                <label class="form-check-label">All</label>
                                            </div>
                                        </th>
                                        <th>Student Id<br>
                                        Father Name<br>
                                        Student Name<br>
                                        Mother Name<br>
                                         </th>
                                         <th>Date Of Birth<br>
                                            Religion<br>
                                           Gender<br>
                                            NID/BR<br>
                                             </th>
                                             <th>Course<br>
                                                Session<br>
                                               Class Roll<br>

                                                 </th>
                                                 <th>Educational Qualification<br>
                                                    Board/Passing-Year<br>
                                                   Registration<br>
                                                     </th>
                                                     <th>Student Photo</th>

                                        <th>Action</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <form action="{{url('Student/stu_reg_insert')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @foreach ($student as $student)
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" name="reg['{{$student->id}}']" value="{{$student->id}}" class="form-check-input">
                                                <label class="form-check-label"></label>
                                            </div>
                                        </td>

                                        <td><b> {{$student->st_id_number}}</b><br><b> {{$student->st_name}}</b><br> <b> {{$student->f_name}}</b><br><b>{{$student->m_name}}</b></td>
                                        <td><b> {{$student->Date_of_birth}}</b><br><b> {{$student->religion}}</b><br> <b> {{$student->gender}}</b><br><b>{{$student->id_number}}</b></td>
                                        <td><b> {{$student->course->course_name}}</b><br><b> {{$student->session->session_name}}</b><br> <b> {{$student->class_roll}}</b></td>
                                        <td><b> {{$student->edu_qualification}}</b><br><b> {{$student->reg_board}}/{{$student->passing_year}}</b><br> <b> {{$student->reg_no}}</b></td>
                                        <td><img src="{{asset($student->student_photo)}}" alt="" height="100" width="100"></td>


                                        <td style="display: flex">

                                            <a href="{{url('Student/info',$student->id)}}" class="btn btn-info btn-lg" style="font-size:15px; margin-right:4%;height:100%"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a href="{{url('Student/edit',$student->id)}}" class="btn btn-info btn-lg" style="font-size:15px;margin-right:4%;height:100%"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                            {{-- <form action="{{url('Student/delete',$student->id)}}"  method="post"  style="margin-left:4%">
                                                @csrf
                                             <button type="submit" class="btn btn-danger btn-lg" onclick="return confirm('Are you sure to delete this item?')" style="font-size:15px"><i class="fas fa-trash"></i></button>
                                         </form> --}}








                                      </td>
                                    </tr>
                                    @endforeach
                                    <button type="submit" class="btn btn-primary">Register</button>
                                </form>



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

