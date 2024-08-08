@extends('Backend.admin.include.master')

@section('content')
    <div class="dashboard-content-one">
        <!-- Breadcubs Area Start Here -->
        <div class="breadcrumbs-area">
            <h3>Update Education Year</h3>
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>Education Year</li>
            </ul>
        </div>
        <div>
            <div class="container">

          <div class="row"><div class="card height-auto">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>Update New Education Year</h3>
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
                <form class="new-added-form" action="{{url('education_year/update',$editEduYear->id)}}" method="Post" enctype="multipart/form-data">
                   @csrf
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-12 form-group">
                            <label>Educational YEAR *</label>
                            <input type="text" name="education_year" value="{{$editEduYear->education_year}}" placeholder="" class="form-control">
                        </div>
                        <div class="col-xl-12 col-lg-6 col-12 form-group">
                            <label>Status</label>
                            <select name="status" class="select2">
                                <option value="{{$editEduYear->status}}">{{$editEduYear->status}}</option>
                                <option value="Active">Active</option>
                                <option value="Deactive">Deactive</option>

                            </select>
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

        </div>
        <!-- Social Media End Here -->
    @endsection


