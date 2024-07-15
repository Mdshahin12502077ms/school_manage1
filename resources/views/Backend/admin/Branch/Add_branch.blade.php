@extends('Backend.admin.include.master')

@section('content')
    <div class="dashboard-content-one">
        <!-- Breadcubs Area Start Here -->
        <div class="breadcrumbs-area">
            <h3>ADD BRANCH</h3>
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>Branch</li>
            </ul>
        </div>
        <div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                Add Branch
                            </div>
                            <div class="card-body">
                                <form class="mb-5" action="{{url('branch/insert')}}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <div class="mb-3 col-md-6 mt-3">
                                            <label for="exampleInputEmail1" class="form-label">বিভাগের নাম (Division
                                                Name):*</label>

                                            <select name="division_id" class="form-control" id="division"
                                                style="font-size:15px;">
                                                <option class="p-4"value="">Select Division</option>
                                                @foreach ($get_division as $division)
                                                    <option value="{{ $division->id }}">{{ $division->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-6 mt-4">
                                            <label for="exampleInputEmail1" class="form-label">জেলার নাম (District
                                                Name):*</label>
                                            <select name="district_id" class="form-control"
                                                id="district"style="font-size:15px">
                                                <option value="">select District </option>
                                            </select>
                                        </div>

                                        <div class="mb-3 col-md-6 mt-4">
                                            <label for="exampleInputEmail1" class="form-label">উপজেলা (Upazila):*
                                            </label>
                                            <input type="text" name="sub_district" class="form-control"
                                                placeholder="Enter your sub District"style="font-size:15px">
                                        </div>



                                        <div class="mb-3 col-md-6 mt-4">
                                            <label for="exampleInputEmail1" class="form-label">থানা (Thana):*
                                            </label>
                                            <input type="text" name="thana" class="form-control"
                                                placeholder="Enter your sub District"style="font-size:15px">
                                        </div>

                                        <div class="mb-3 col-md-6 mt-4">
                                            <label for="exampleInputEmail1" class="form-label">পোষ্ট অফিস (Post Office):*
                                            </label>
                                            <input type="text" name="post_office" class="form-control"
                                                placeholder="Enter your sub District"style="font-size:15px">
                                        </div>

                                        <div class="mb-3 col-md-6 mt-4">
                                            <label for="exampleInputEmail1" class="form-label">পোস্ট কোড (Post Code):*
                                            </label>
                                            <input type="text" name="post_code" class="form-control"
                                                placeholder="Enter your sub District"style="font-size:15px">
                                        </div>

                                        <div class="mb-3 col-md-12 mt-4">
                                            <label for="exampleInputEmail1" class="form-label">প্রতিষ্ঠানের নাম (Institute
                                                Name):*
                                            </label>
                                            <input type="text" name="institute_name" class="form-control"
                                                placeholder="Enter your sub District"style="font-size:15px">
                                        </div>




                                        <div class="mb-3 col-md-12 mt-4">
                                            <label for="exampleInputEmail1" class="form-label">পরিচালকের নাম (Propietor
                                                Name):*
                                            </label>
                                            <input type="text" name="Propietor_Name" class="form-control"
                                                placeholder="Enter your sub District"style="font-size:15px">
                                        </div>


                                        <div class="mb-3 col-md-6 mt-4">
                                            <label for="exampleInputEmail1" class="form-label">
                                                নিবন্ধন নম্বর (Registration
                                                Number):*
                                            </label>
                                            <input type="text" name="registration_id" class="form-control"
                                                placeholder="6521" readonly style="font-size:15px">
                                        </div>

                                        <div class="mb-3 col-md-6 mt-4">
                                            <label for="exampleInputEmail1" class="form-label">পিতার নাম (Father's Name):*
                                            </label>
                                            <input type="text" name="fathers_name" class="form-control"
                                                placeholder="Enter your sub District"style="font-size:15px">
                                        </div>

                                        <div class="mb-3 col-md-6 mt-4">
                                            <label for="exampleInputEmail1" class="form-label">মাতার নাম (Mother's Name):*
                                            </label>
                                            <input type="text" name="mothers_name" class="form-control"
                                                placeholder="Enter your sub District"style="font-size:15px">
                                        </div>

                                        <div class="mb-3 col-md-6 mt-4">
                                            <label for="exampleInputEmail1" class="form-label">প্রতিষ্ঠানের বয়স(Institute
                                                Age):
                                            </label>
                                            <input type="text" name="institute_age" class="form-control"
                                                placeholder="Enter your sub District"style="font-size:15px">
                                        </div>

                                        <div class="mb-3 col-md-6 mt-4">
                                            <label for="exampleInputEmail1" class="form-label">কম্পিউটারের সংখ্যা (No Of
                                                Computers):*
                                            </label>
                                            <input type="text" name="no_computer" class="form-control"
                                                placeholder="Enter your sub District"style="font-size:15px">
                                        </div>

                                        <div class="mb-3 col-md-6 mt-4">
                                            <label for="exampleInputEmail1" class="form-label">ই-মেইল (E-mail):*
                                            </label>
                                            <input type="email" name="e_mail" class="form-control"
                                                placeholder="Enter your sub District"style="font-size:15px">
                                        </div>

                                        <div class="mb-3 col-md-6 mt-4">
                                            <label for="exampleInputEmail1" class="form-label">মোবাইল নম্বর (Mobile
                                                Number):*
                                            </label>
                                            <input type="text" name="mobile_number" class="form-control"
                                                placeholder="Enter your sub District"style="font-size:15px">
                                        </div>

                                        <div class="mb-3 col-md-6 mt-4">
                                            <label for="exampleInputEmail1" class="form-label">অতিরিক্ত যোগাযোগের নাম
                                                (Additional Contact Name):*
                                            </label>
                                            <input type="text" name="additional_rel_name" class="form-control"
                                                placeholder="Enter your sub District"style="font-size:15px">
                                        </div>

                                        <div class="mb-3 col-md-6 mt-4">
                                            <label for="exampleInputEmail1" class="form-label">রক্তের গ্রুপ (Blood Group)
                                            </label>
                                            <select name="blood_group" id=""
                                                class="form-control"style="font-size:15px">
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

                                        <div class="mb-3 col-md-6 mt-4">
                                            <label for="exampleInputEmail1" class="form-label">অতিরিক্ত যোগাযোগের সম্পর্ক
                                                (Additional Contact Relation):*
                                            </label>
                                            <input type="text" name="extra_rel_contact" class="form-control"
                                                placeholder="Enter your sub District"style="font-size:15px">
                                        </div>


                                        <div class="mb-3 col-md-6 mt-4">
                                            <label for="exampleInputEmail1" class="form-label"> অতিরিক্ত মোবাইল নম্বর
                                                (Additional Mobile Number):*
                                            </label>
                                            <input type="text" name="additional_mobile_no" class="form-control"
                                                placeholder="Enter your sub District"style="font-size:15px">
                                        </div>

                                        <div class="mb-3 col-md-6 mt-4">
                                            <label for="exampleInputEmail1" class="form-label"> মালিক/সি,ই,ও প্রোফাইল
                                                (Propietor/CEO Profile):*
                                            </label>
                                            <input type="file" name="ceo_profile" class="form-control"
                                                placeholder="Enter your sub District"
                                                accept="image/*"style="font-size:15px;">
                                        </div>

                                        <div class="mb-3 col-md-6 mt-4">
                                            <label for="exampleInputEmail1" class="form-label"> জাতীয় পরিচয়পত্র
                                                (National id):
                                            </label>
                                            <input type="file" name="national_id" class="form-control"
                                                placeholder="Enter your sub District"
                                                accept="image/*"style="font-size:15px">
                                        </div>

                                        <div class="mb-3 col-md-6 mt-4">
                                            <label for="exampleInputEmail1" class="form-label">Document: ( 'HSC' শিক্ষাগত
                                                ও দক্ষত সনদ Educational & Skill )
                                            </label>
                                            <input type="file" name="educational_skill" class="form-control"
                                                placeholder="Enter your sub District"
                                                accept="image/*"style="font-size:15px">
                                        </div>

                                        <div class="mb-3 col-md-6 mt-4">
                                            <label for="exampleInputEmail1" class="form-label"> প্রতিষ্ঠানের ছবি:
                                                (Institute Photo):
                                            </label>
                                            <input type="file" name="institute_image" class="form-control"
                                                placeholder="Enter your sub District"
                                                accept="image/*"style="font-size:15px">
                                        </div>

                                        <div class="mb-3 col-md-6 mt-4">
                                            <label for="exampleInputEmail1" class="form-label"> ট্রেড লাইসেন্স (Trade
                                                License):
                                            </label>
                                            <input type="file" name="trade_licence" class="form-control"
                                                placeholder="Enter your sub District"
                                                accept="image/*"style="font-size:15px">
                                        </div>

                                        <div class="mb-3 col-md-6 mt-4" id="extra_file">
                                            <label for="exampleInputEmail1" class="form-label"> আরো ফাইল যুক্ত করুন (Click to Add More):
                                            </label>
                                            <input type="file" name="extra_file[]" multiple class="form-control"

                                                accept="image/*"style="font-size:15px;">
                                                <div>
                                                    <button type="button"class="btn btn-info mt-4 btn-lg" id="addMore" style="font-size:18px;color:white">Add More File</button>
                                                   </div>

                                        </div>



                                        <div class="mb-3 col-md-6 mt-4">
                                            <label for="exampleInputEmail1" class="form-label"style="font-size:15px" >
                                                পরিচালকের ফেসবুক লিংক (Proprietor/CEO Facebook URL):*
                                            </label>
                                            <input type="text" name="ceo_facebook" class="form-control"
                                                placeholder="Enter your sub District" style="font-size:15px">
                                        </div>

                                        <div class="mb-3 form-group col-md-6 mt-4">
                                            <label for="exampleInputEmail1" class="form-label"style="font-size:15px">
                                                ঠিকানা (Address):*
                                            </label>
                                            <br>
                                            <textarea name="address" id="" class="form-control" placeholder="enter Proprietor address" style="border:1px solid black"></textarea>
                                        </div>




                                        <div class="col-md-12"> <button type="submit"
                                                class="btn btn-primary btn-lg" style="font-size:18px;color:white">Submit</button></div>

                                </form>
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
            $(document).ready(function() {
                $('#division').change(function() {
                    var division_id = $(this).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                   type:'GET',
                   url:'get_districts',
                   data:{division_id:division_id },
                   success:function(data){
                    $('#district').html(data);

                   }


            });
            });
        });
        </script>

        <script>
              $(document).ready(function() {
                $('#addMore').click(function(){
                $('#extra_file').append(' <input type="file" name="extra_file[]" class="form-control"accept="image/*"style="font-size:15px;padding:20px">')
                });
              });
        </script>
    @endsection
