@extends('Backend.admin.include.master')

@section('content')
    <div class="dashboard-content-one">
        <!-- Breadcubs Area Start Here -->
        <div class="breadcrumbs-area">
            <h3>ADD COURSE</h3>
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>Course</li>
            </ul>
        </div>
        <div>
            <div class="container">
                {{-- <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                Add Branch
                            </div>
                            <div class="card-body">
                                <form class="mb-5" action="{{url('branch/insert')}}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">

                                        <div class="mb-3 col-md-6 mt-3 form-group">
                                            <label for="exampleInputEmail1" class="form-label">বিভাগের নাম (Division
                                                Name):*</label>

                                            <select name="division_id" class="form-control" id="division"
                                                style="font-size:20px;">
                                                <option class="p-4"value="">Select Division</option>
                                                @foreach ($get_division as $division)
                                                    <option value="{{ $division->id }}">{{ $division->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-6 mt-4 form-group">
                                            <label for="exampleInputEmail1" class="form-label">জেলার নাম (District
                                                Name):*</label>
                                            <select name="district_id" class="form-control"
                                                id="district"style="font-size:20px">
                                                <option value="">select District </option>
                                            </select>
                                        </div>

                                        <div class="mb-3 col-md-6 mt-4 form-group">
                                            <label for="exampleInputEmail1" class="form-label">উপজেলা (Upazila):*
                                            </label>
                                            <input type="text" name="sub_district" class="form-control"
                                                placeholder="Enter your sub District"style="font-size:20px">
                                        </div>



                                        <div class="mb-3 col-md-6 mt-4 form-group">
                                            <label for="exampleInputEmail1" class="form-label">থানা (Thana):*
                                            </label>
                                            <input type="text" name="thana" class="form-control"
                                                placeholder="Enter your sub District"style="font-size:20px">
                                        </div>

                                        <div class="mb-3 col-md-6 mt-4 form-group">
                                            <label for="exampleInputEmail1" class="form-label">পোষ্ট অফিস (Post Office):*
                                            </label>
                                            <input type="text" name="post_office" class="form-control"
                                                placeholder="Enter your sub District"style="font-size:20px">
                                        </div>

                                        <div class="mb-3 col-md-6 mt-4 form-group">
                                            <label for="exampleInputEmail1" class="form-label">পোস্ট কোড (Post Code):*
                                            </label>
                                            <input type="text" name="post_code" class="form-control"
                                                placeholder="Enter your sub District"style="font-size:20px">
                                        </div>

                                        <div class="mb-3 col-md-12 mt-4 form-group">
                                            <label for="exampleInputEmail1" class="form-label">প্রতিষ্ঠানের নাম (Institute
                                                Name):*
                                            </label>
                                            <input type="text" name="institute_name" class="form-control"
                                                placeholder="Enter your sub District"style="font-size:20px">
                                        </div>




                                        <div class="mb-3 col-md-12 mt-4 form-group">
                                            <label for="exampleInputEmail1" class="form-label">পরিচালকের নাম (Propietor
                                                Name):*
                                            </label>
                                            <input type="text" name="Propietor_Name" class="form-control"
                                                placeholder="Enter your sub District"style="font-size:20px">
                                        </div>


                                        <div class="mb-3 col-md-6 mt-4 form-group">
                                            <label for="exampleInputEmail1" class="form-label">
                                                নিবন্ধন নম্বর (Registration
                                                Number):*
                                            </label>
                                            <input type="text" name="registration_id" class="form-control"
                                                placeholder="6521" readonly style="font-size:20px">
                                        </div>

                                        <div class="mb-3 col-md-6 mt-4 form-group">
                                            <label for="exampleInputEmail1" class="form-label">পিতার নাম (Father's Name):*
                                            </label>
                                            <input type="text" name="fathers_name" class="form-control"
                                                placeholder="Enter your sub District"style="font-size:20px">
                                        </div>

                                        <div class="mb-3 col-md-6 mt-4 form-group">
                                            <label for="exampleInputEmail1" class="form-label">মাতার নাম (Mother's Name):*
                                            </label>
                                            <input type="text" name="mothers_name" class="form-control"
                                                placeholder="Enter your sub District"style="font-size:20px">
                                        </div>

                                        <div class="mb-3 col-md-6 mt-4 form-group">
                                            <label for="exampleInputEmail1" class="form-label">প্রতিষ্ঠানের বয়স(Institute
                                                Age):
                                            </label>
                                            <input type="text" name="institute_age" class="form-control"
                                                placeholder="Enter your sub District"style="font-size:20px">
                                        </div>

                                        <div class="mb-3 col-md-6 mt-4 form-group">
                                            <label for="exampleInputEmail1" class="form-label">কম্পিউটারের সংখ্যা (No Of
                                                Computers):*
                                            </label>
                                            <input type="text" name="no_computer" class="form-control"
                                                placeholder="Enter your sub District"style="font-size:20px">
                                        </div>

                                        <div class="mb-3 col-md-6 mt-4 form-group">
                                            <label for="exampleInputEmail1" class="form-label">ই-মেইল (E-mail):*
                                            </label>
                                            <input type="email" name="e_mail" class="form-control"
                                                placeholder="Enter your sub District"style="font-size:20px">
                                        </div>

                                        <div class="mb-3 col-md-6 mt-4 form-group">
                                            <label for="exampleInputEmail1" class="form-label">মোবাইল নম্বর (Mobile
                                                Number):*
                                            </label>
                                            <input type="text" name="mobile_number" class="form-control"
                                                placeholder="Enter your sub District"style="font-size:20px">
                                        </div>

                                        <div class="mb-3 col-md-6 mt-4 form-group">
                                            <label for="exampleInputEmail1" class="form-label">অতিরিক্ত যোগাযোগের নাম
                                                (Additional Contact Name):*
                                            </label>
                                            <input type="text" name="additional_rel_name" class="form-control"
                                                placeholder="Enter your sub District"style="font-size:20px">
                                        </div>

                                        <div class="mb-3 col-md-6 mt-4 form-group">
                                            <label for="exampleInputEmail1" class="form-label">রক্তের গ্রুপ (Blood Group)
                                            </label>
                                            <select name="blood_group" id=""
                                                class="form-control"style="font-size:20px">
                                                <option value="">Select Blood Group</option>
                                                <option value="A+">A+</option>
                                                <option value="A-">A-</option>
                                                <option value="AB+">AB+</option>
                                                <option value="AB-">AB-</option>
                                                <option value="B+">B+</option>
                                                <option value="B-">B-</option>
                                                <option value="O+">O+</option>
                                                <option value="O-">O-</option>
                                            </select>
                                        </div>

                                        <div class="mb-3 col-md-6 mt-4 form-group">
                                            <label for="exampleInputEmail1" class="form-label">অতিরিক্ত যোগাযোগের সম্পর্ক
                                                (Additional Contact Relation):*
                                            </label>
                                            <input type="text" name="extra_rel_contact" class="form-control"
                                                placeholder="Enter your sub District"style="font-size:20px">
                                        </div>


                                        <div class="mb-3 col-md-6 mt-4 form-group ">
                                            <label for="exampleInputEmail1" class="form-label"> অতিরিক্ত মোবাইল নম্বর
                                                (Additional Mobile Number):*
                                            </label>
                                            <input type="text" name="additional_mobile_no" class="form-control"
                                                placeholder="Enter your sub District"style="font-size:20px">
                                        </div>

                                        <div class="mb-3 col-md-6 mt-4 form-group">
                                            <label for="exampleInputEmail1" class="form-label"> মালিক/সি,ই,ও প্রোফাইল
                                                (Propietor/CEO Profile):*
                                            </label>
                                            <input type="file" name="ceo_profile" class="form-control"
                                                placeholder="Enter your sub District"
                                                accept="image/*"style="font-size:20px;">
                                        </div>

                                        <div class="mb-3 col-md-6 mt-4 form-group">
                                            <label for="exampleInputEmail1" class="form-label"> জাতীয় পরিচয়পত্র
                                                (National id):
                                            </label>
                                            <input type="file" name="national_id" class="form-control"
                                                placeholder="Enter your sub District"
                                                accept="image/*"style="font-size:20px">
                                        </div>

                                        <div class="mb-3 col-md-6 mt-4 form-group">
                                            <label for="exampleInputEmail1" class="form-label">Document: ( 'HSC' শিক্ষাগত
                                                ও দক্ষত সনদ Educational & Skill )
                                            </label>
                                            <input type="file" name="educational_skill" class="form-control"
                                                placeholder="Enter your sub District"
                                                accept="image/*"style="font-size:20px">
                                        </div>

                                        <div class="mb-3 col-md-6 mt-4 form-group">
                                            <label for="exampleInputEmail1" class="form-label"> প্রতিষ্ঠানের ছবি:
                                                (Institute Photo):
                                            </label>
                                            <input type="file" name="institute_image" class="form-control"
                                                placeholder="Enter your sub District"
                                                accept="image/*"style="font-size:20px">
                                        </div>

                                        <div class="mb-3 col-md-6 mt-4 form-group">
                                            <label for="exampleInputEmail1" class="form-label"> ট্রেড লাইসেন্স (Trade
                                                License):
                                            </label>
                                            <input type="file" name="trade_licence" class="form-control"
                                                placeholder="Enter your sub District"
                                                accept="image/*"style="font-size:20px">
                                        </div>

                                        <div class="mb-3 col-md-6 mt-4 form-group" id="extra_file">
                                            <label for="exampleInputEmail1" class="form-label"> আরো ফাইল যুক্ত করুন (Click to Add More):
                                            </label>
                                            <input type="file" name="extra_file[]" multiple class="form-control"

                                                accept="image/*"style="font-size:20px;">
                                                <div>
                                                    <button type="button"class="btn btn-info mt-4 btn-lg" id="addMore" style="font-size:18px;color:white">Add More File</button>
                                                   </div>

                                        </div>



                                        <div class="mb-3 col-md-6 mt-4 form-group">
                                            <label for="exampleInputEmail1" class="form-label"style="font-size:15px" >
                                                পরিচালকের ফেসবুক লিংক (Proprietor/CEO Facebook URL):*
                                            </label>
                                            <input type="text" name="ceo_facebook" class="form-control"
                                                placeholder="Enter your sub District" style="font-size:20px">
                                        </div>

                                        <div class="mb-3 form-group col-md-6 mt-4 form-group">
                                            <label for="exampleInputEmail1" class="form-label"style="font-size:20px">
                                                ঠিকানা (Address):*
                                            </label>
                                            <br>
                                            <textarea name="address" id="" class="form-control" placeholder="enter Proprietor address" style="border:1px solid black"></textarea>
                                        </div>




                                        <div class="col-md-12"> <button type="submit"
                                                class="btn btn-primary btn-lg" style="font-size:20px;color:white">Submit</button></div>

                                </form>
                            </div>
                        </div>
                    </div>


                </div> --}}

                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Add New Class Schedule</h3>
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
                        <form class="new-added-form" action="{{url('course/insert')}}" method="Post" enctype="multipart/form-data">
                           @csrf
                            <div class="row">
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Course Name *</label>
                                    <input type="text" name="course_name" placeholder="Enter Course Name" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Course Code</label>
                                    <input type="text" name="course_code" placeholder="Enter Course Code" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Course Duration</label>
                                    <input type="text" name="course_duration" placeholder="Enter Course Duration" class="form-control">
                                </div>
                               
                             
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Course Amount</label>
                                    <input type="text" name="course_amount" placeholder="Enter Course Amount" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Status</label>
                                    <select name="status" class="select2">
                                        <option value="">Please Select</option>
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

  
