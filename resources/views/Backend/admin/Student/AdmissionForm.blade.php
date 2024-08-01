@extends('Backend.admin.include.master')

@section('content')
    <div class="dashboard-content-one">
        <!-- Breadcubs Area Start Here -->
        <div class="breadcrumbs-area">
            <h3>ADDMISSION FORM</h3>
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>ADDMISSION FORM</li>
            </ul>
        </div>
        <div>
            <div class="container">


                <div class="dashboard-content-one">
                    <!-- Breadcubs Area Start Here -->
                    <div class="breadcrumbs-area">
                        <h3>Students</h3>
                        <ul>
                            <li>
                                <a href="index.html">Home</a>
                            </li>
                            <li>Student Admit Form</li>
                        </ul>
                    </div>
                    <!-- Breadcubs Area End Here -->
                    <!-- Admit Form Area Start Here -->
                    <div class="card height-auto">
                        <div class="card-body">
                            <div class="heading-layout1">
                                <div class="item-title">
                                    <h3>Add New Students</h3>
                                </div>
                                <div class="dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                        aria-expanded="false">...</a>
    
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#"><i
                                                class="fas fa-times text-orange-red"></i>Close</a>
                                        <a class="dropdown-item" href="#"><i
                                                class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                        <a class="dropdown-item" href="#"><i
                                                class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                    </div>
                                </div>
                            </div>
                            <form class="new-added-form">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                                        <label>Student Name *</label>
                                        <input name="st_name"type="text" placeholder="" class="form-control">
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                                        <label>Father's Name *</label>
                                        <input type="text" name="f_name" placeholder="" class="form-control">
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                                        <label>Mothers's Name *</label>
                                        <input type="text" name="m_name" placeholder="" class="form-control">
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                                        <label>Gender *</label>
                                        <select name="gender" class="select2">
                                            <option value="">Please Select Gender *</option>
                                            <option value="1">Male</option>
                                            <option value="2">Female</option>
                                            <option value="3">Others</option>
                                        </select>
                                    </div>
                                     
                                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                                        <label>Id Type *</label>
                                        <select name="id_type" class="select2">
                                            <option value="">Please Select Id *</option>
                                            <option value="1">National Id</option>
                                            <option value="2">Date Of Birth</option>
                                            <option value="3">Others</option>
                                        </select>
                                    </div>

                                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                                        <label>Date Of Birth *</label>
                                        <input name="Date_of_birth"type="text" placeholder="dd/mm/yyyy" class="form-control air-datepicker"
                                            data-position='bottom right'>
                                        <i class="far fa-calendar-alt"></i>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                                        <label>Id Number</label>
                                        <input type="text" name="id_number" placeholder="" class="form-control">
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                                        <label>Blood Group *</label>
                                        <select class="select2">
                                            <option value="">Please Select Group *</option>
                                            <option value="1">A+</option>
                                            <option value="2">A-</option>
                                            <option value="3">B+</option>
                                            <option value="3">B-</option>
                                            <option value="3">O+</option>
                                            <option value="3">O-</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                                        <label>Religion *</label>
                                        <select class="select2">
                                            <option value="">Please Select Religion *</option>
                                            <option value="1">Islam</option>
                                            <option value="2">Hindu</option>
                                            <option value="3">Christian</option>
                                            <option value="3">Buddish</option>
                                            <option value="3">Others</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                                        <label>E-Mail</label>
                                        <input type="email" placeholder="" class="form-control">
                                    </div>
                                  
                                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                                        <label>Social Status *</label>
                                        <select name="social_status" class="select2">
                                            <option value="">Please Select Section *</option>
                                            <option value="1">Pink</option>
                                          
                                        </select>
                                    </div>
                                   
                                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                                        <label>Mobile Number</label>
                                        <input name="mobile_no"type="text" placeholder="" class="form-control">
                                    </div>
                                    <div class="col-lg-6 col-12 form-group">
                                        <label>Comments</label>
                                        <textarea name="comment" class="textarea form-control" name="message" id="form-message" cols="10"
                                            rows="9"></textarea>
                                    </div>
                                    <div class="col-lg-6 col-12 form-group mg-t-30">
                                        <label class="text-dark-medium">Upload Student Photo (150px X 150px)</label>
                                        <input type="file" class="form-control-file">
                                    </div>
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


