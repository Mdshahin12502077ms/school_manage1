@extends('Backend.admin.include.master')

@section('content')
    <div class="dashboard-content-one">
        <!-- Breadcubs Area Start Here -->
        <div class="breadcrumbs-area">
            <h3>SMTP SETTING</h3>

        </div>
        <div>
            <div class="container">


                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>SMTP</h3>
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
                        <form class="new-added-form" action="{{url('smtp/update',$data->id)}}" method="Post" enctype="multipart/form-data">
                           @csrf
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label>Mailer</label>
                                    <input type="text" name="mailer" value="{{$data->mailer}}" class="form-control">
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label>Host</label>
                                    <input type="text" name="host" value="{{$data->host}}" class="form-control">
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label>Port</label>
                                    <input type="text" name="port" value="{{$data->port}}" class="form-control">
                                </div>


                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label>User Name</label>
                                    <input type="text" name="username" value="{{$data->username}}" class="form-control">
                                </div>

                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label>Password</label>
                                    <input type="text" name="password" value="{{$data->password}}" class="form-control">
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label>Encryption</label>
                                    <input type="text" name="encryption" value="{{$data->encryption}}" class="form-control">
                                </div>


                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label>Sender</label>
                                    <input type="text" name="sender" value="{{$data->sender}}" class="form-control">
                                </div>

                                <div class="col-md-6 form-group"></div>
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


