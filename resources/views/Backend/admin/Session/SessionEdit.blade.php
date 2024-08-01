@extends('Backend.admin.include.master')

@section('content')
    <div class="dashboard-content-one">
        <!-- Breadcubs Area Start Here -->
        <div class="breadcrumbs-area">
            <h3>EDIT SESSION</h3>
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>Edit Session</li>
            </ul>
        </div>
        <div>
            <div class="container">


                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Edit Session</h3>
                            </div>

                        </div>
                        <form class="new-added-form" action="{{url('Session/update',$sessionEdit->id)}}" method="Post" enctype="multipart/form-data">
                           @csrf
                            <div class="row">
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Session Name *</label>
                                    <input type="text" name="session_name" value="{{$sessionEdit->session_name}}" class="form-control"  style="font-size:18px">
                                </div>

                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Course</label>
                                    <select name="course_id" class="select2">
                                      @foreach ($getCourse as $course)

                                      <option {{( $course->id==$sessionEdit->course_id)?'selected':''}} value={{$course->id}}>{{$course->course_name}}</option>
                                      @endforeach
                                    </select>
                                </div>

                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Status</label>
                                    <select name="status" class="select2">
                                        <option value="{{$sessionEdit->status}}">{{$sessionEdit->status}}</option>
                                        <option value="Active">Active</option>
                                        <option value="Deactive">Deactive</option>

                                    </select>
                                </div>

                                <div class="col-md-6 form-group"></div>
                                <div class="col-12 form-group mg-t-8">
                                    <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                                    <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- Social Media End Here -->
    @endsection


