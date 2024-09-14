@extends('Backend.admin.include.master')

@section('content')
    <div class="dashboard-content-one">
        <!-- Breadcubs Area Start Here -->
        <div>
            <div class="container col-lg-12">


                <div class="dashboard-content-one">
                    <!-- Breadcubs Area Start Here -->
                    <div class="breadcrumbs-area">
                        <h3>Students</h3>
                        <ul>
                            <li>
                                <a href="index.html">Home</a>
                            </li>
                            <li>Institute Settings</li>
                        </ul>
                    </div>
                    <!-- Breadcubs Area End Here -->
                    <!-- Admit Form Area Start Here -->

                    <div class="card height-auto">
                        <div class="card-body">
                            <div class="heading-layout1">
                                <div class="item-title">
                                    <h3>Institute Information Update</h3>
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
                            <form class="new-added-form" action="{{url('Settings/update',$getBackend->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="col-lg-12 col-12 form-group ">
                                        <h4><b>Title</b></h4>
                                        <hr>
                                        <div class="row">
                                            <div class="col-lg-6 col- form-group ">

                                                <label class="text-dark-medium">Site Title </label>
                                               <input type="text" name="site_title" class="form-control" value="{{$getBackend->site_title}}">
                                            </div>
                                            <div class="col-lg-6 col- form-group ">
                                                <label class="text-dark-medium">Sub Title </label>
                                               <input type="text" name="sub_title" class="form-control" value="{{$getBackend->sub_title}}">
                                            </div>
                                        </div>
                                     </div>

                                    <div class="col-lg-12 col-12 form-group">
                                        <h4><b>Meta Information</b></h4>
                                        <hr>
                                        <div class="row">
                                            <div class="col-lg-6 col- form-group">
                                                <label class="text-dark-medium">Meta Title </label>
                                               <input type="text" name="meta_title" class="form-control" value="{{$getBackend->meta_title}}">
                                            </div>

                                            <div class="col-lg-6 col- form-group">
                                                <label class="text-dark-medium">Meta Description: <span style="color: rgb(98, 150, 248)"> Max Length 160 characters</span></label>
                                              <textarea name="meta_description" class="form-control" id="" >{{$getBackend->meta_description}}</textarea>
                                            </div>

                                            <div class="col-lg-6 col- form-group ">
                                                <label class="text-dark-medium"> Meta Keywords: <span style="color: rgb(98, 150, 248)">   Separate Every Keyword by Using (,) Symbol</span></label>
                                              <textarea name="meta_keywords" class="form-control" id="" >{{$getBackend->meta_keywords}}</textarea>
                                            </div>
                                        </div>
                                     </div>


                                    <div class="col-lg-12 col-12 form-group ">
                                        <h4><b>Logo</b></h4>
                                        <hr>
                                       <div class="row">
                                        <div class="col-lg-6 col-12 form-group ">
                                            <div class="mt-5">
                                                <img src="{{asset($getBackend->logo)}}" alt="" >
                                            </div>
                                            <label class="text-dark-medium">Site Logo:<span style="color: rgb(98, 150, 248)"> Resolution Height- 70 PX,Width- 416PX</span> </label>
                                            <input type="file" name="logo" value="{{$getBackend->logo}}" class="form-control">


                                        </div>
                                        <div class="col-lg-6 col-12 form-group ">
                                            <div class="mt-5">
                                                <img src="{{asset($getBackend->favicon)}}" alt="" style="height: 64px;width:64px">
                                            </div>
                                            <label class="text-dark-medium">Site Favicon:<span style="color: rgb(98, 150, 248)"> Best Resolution Height- 64 PX, Width- 64 PX</span></label>
                                            <input type="file" name="favicon" value="{{$getBackend->favicon}}" class="form-control">
                                        </div>

                                       </div>
                                    </div>


                                    <div class="col-lg-12 col-12 form-group ">
                                        <h4><b>Institute About</b></h4>
                                        <hr>
                                      <div class="row">
                                        <div class="col-lg-6 col-12 form-group">
                                            <label class="text-dark-medium">Address</label>
                                           <input type="text" name="address" class="form-control" value="{{$getBackend->address}}">
                                        </div>

                                        <div class="col-lg-6 col-12 form-group ">
                                            <label class="text-dark-medium">Phone</label>
                                           <input type="text" name="phone" class="form-control" value="{{$getBackend->phone}}">
                                        </div>

                                        <div class="col-lg-6 col-12 form-group ">
                                            <label class="text-dark-medium">Email</label>
                                           <input type="email" name="email" class="form-control" value="{{$getBackend->email}}">
                                        </div>
                                        <div class="col-lg-6 col-12 form-group">
                                            <label class="text-dark-medium">Starting Year </label>
                                           <input type="text" name="starting_year" class="form-control" value="{{$getBackend->starting_year}}">
                                        </div>
                                      </div>

                                    </div>


                                        <div class="col-lg-12 col-12 form-group ">
                                            <h4><b>Social Media Link</b></h4>
                                            <hr>
                                           <div class="row">

                                            <div class="col-lg-6 col-12 form-group ">
                                                <label class="text-dark-medium">Facebook</label>
                                               <input type="text" name="facebook" class="form-control" value="{{$getBackend->facebook}}">
                                            </div>
                                            <div class="col-lg-6 col-12 form-group ">
                                                <label class="text-dark-medium">Twitter</label>
                                               <input type="text" name="twitter" class="form-control" value="{{$getBackend->twitter}}">
                                            </div>
                                            <div class="col-lg-6 col-12 form-group ">
                                                <label class="text-dark-medium">LinkedIn</label>
                                               <input type="text" name="linkedin" class="form-control" value="{{$getBackend->linkedin}}">
                                            </div>
                                            <div class="col-lg-6 col-12 form-group ">
                                                <label class="text-dark-medium">Instragram</label>
                                               <input type="text" name="instragram" class="form-control" value="{{$getBackend->instragram}}">
                                            </div>
                                           </div>
                                        </div>
                                        <div class="col-lg-12 col-12 form-group ">
                                            <h4><b>Footer</b></h4>
                                            <hr>
                                           <div class="row">

                                            <div class="col-lg-6 col-12 form-group ">
                                                <label class="text-dark-medium">Footer</label>
                                               <textarea type="text" name="footer" class="form-control" value="{{$getBackend->footer}}">{{$getBackend->footer}}</textarea>
                                            </div>

                                        </div>
                                    </div>


                                    <div class="col-12 form-group mg-t-8">
                                        <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Update</button>
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

    @section('js')
    <script>
    function otherQualification() {
        var qualification=document.getElementById('edu_qualification').value;
        if( qualification=='others'){
            document.getElementById('other').style.display='block';

        }

        else{
            document.getElementById('other').style.display='none';
        }
    }
    </script>


    @endsection
