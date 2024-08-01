@extends('Backend.admin.include.master')

@section('content')
    <div class="dashboard-content-one">
        <!-- Breadcubs Area Start Here -->
        <div class="breadcrumbs-area">
            <h3> Student Information</h3>
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>Student Information</li>
            </ul>
        </div>
        <div>

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="dashboard-content-one">
                            <!-- Breadcubs Area Start Here -->

                            <!-- Breadcubs Area End Here -->
                            <!-- Student Details Area Start Here -->
                            <div class="card height-auto">
                                <div class="card-body">
                                    <div class="heading-layout1">
                                        <div class="item-title">
                                            <h3>Student Details</h3>
                                        </div>
                                       <div class="dropdown">
                                            <a class="dropdown-toggle" href="#" role="button"
                                            data-toggle="dropdown" aria-expanded="false">...</a>

                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                                                <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                                <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-info-details">

                                        <div class="item-content">
                                            <div class="header-inline item-header">

                                                <div class="header-elements">
                                                    <ul>
                                                        <li><a href="#"><i class="far fa-edit"></i></a></li>
                                                        <li><a href="#"><i class="fas fa-print"></i></a></li>
                                                        <li><a href="#"><i class="fas fa-download"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class=" d-flex">

                                                <table class="table col-md-6">

                                                    <tbody>
                                                      <tr>

                                                        <td class="mt-5 d-flex" align="center">
                                                            <img src="{{asset($student->student_photo)}}" alt=""style="border-radius: 20% 20%;height:20vh;width:15vh;margin-right:4%">
                                                           <div class="" style="margin-top: 7vh">
                                                            <h3 style="">{{$student->st_name}}</h3>
                                                            <h4>#{{$student->st_id_number}}</h4>
                                                           </div>

                                                        </td>


                                                      </tr>
                                                      <hr>
                                                      <tr>
                                                        <td class="d-flex">
                                                           <p style="font-size:20px"> <i class="fa fa-envelope" aria-hidden="true" style="margin-right:3%;"></i>Email:</p>
                                                           <p  style="font-size:20px">{{$student->email}}</p>

                                                        </td>

                                                      </tr>
                                                         <hr>
                                                      <tr>
                                                        <td class="d-flex">
                                                           <p style="font-size:20px"> <i class="fa fa-phone" aria-hidden="true" style="margin-right:3%;"></i>Mobile No:</p>
                                                           <p  style="font-size:20px">{{$student->mobile_no}}</p>

                                                        </td>

                                                      </tr>
                                                      <hr>
                                                      <tr>
                                                        <td class="d-flex">
                                                           <p style="font-size:20px"> <i class="fa fa-users" aria-hidden="true" style="margin-right:3%;"></i>Session:</p>
                                                           <p  style="font-size:20px">{{$student->session->session_name}}</p>

                                                        </td>

                                                      </tr>

                                                      <tr>
                                                        <td class="d-flex">
                                                           <p style="font-size:20px"> <i  class="fa fa-graduation-cap" aria-hidden="true" style="margin-right:3%;"></i>Course:</p>
                                                           <p  style="font-size:20px">{{$student->course->course_name}}</p>

                                                        </td>

                                                      </tr>


                                                      <tr>
                                                        <td class="d-flex">
                                                           <p style="font-size:20px"> Addmission Date:</p>
                                                           <p  style="font-size:20px">{{$student->created_at}}</p>

                                                        </td>

                                                      </tr>
                                                    </tbody>
                                                  </table>



                                                <table class="table text-nowrap col-md-6">




                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

