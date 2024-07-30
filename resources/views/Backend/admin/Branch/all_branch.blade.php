@extends('Backend.admin.include.master')

@section('content')
    <div class="dashboard-content-one">
        <!-- Breadcubs Area Start Here -->
        <div class="breadcrumbs-area">
            <h3>All Institute</h3>
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>All Institute</li>
            </ul>
        </div>
        <div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">


                                    <div>

                                        <div class="card height-auto">
                                            <div class="card-body">
                                                <div class="heading-layout1">
                                                    <div class="item-title">
                                                        <h3>Institute Subscription</h3>
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
                                                <form class="new-added-form" action="{{url('branch/subscription/insert')}}" method="Post" enctype="multipart/form-data">
                                                   @csrf
                                                    <div class="row">

                                                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                                                            <label>Select Branch</label>
                                                            <select name="branch_id" class="select2">
                                                                <option value="">Please Select Branch</option>
                                                                @foreach ($branchSubs as $branchSubs)
                                                                <option value="{{$branchSubs->id}}">{{$branchSubs->institute_name}}</option>
                                                                @endforeach

                                                            </select>
                                                        </div>

                                                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                                                            <label>Select Plan</label>
                                                            <select name="plan_id" class="select2">
                                                                <option value="">Please Select Plan</option>
                                                                @foreach ($plansubs as $planSubs)
                                                                <option value="{{$planSubs->id}}">{{$planSubs->name}}</option>
                                                                @endforeach

                                                            </select>
                                                        </div>

                                                        <div class="col-md-6 form-group"></div>
                                                        <div class="col-12 form-group mg-t-8">
                                                            <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                                                       
                                                            <a href="{{url('School/subscription/list/all')}}" class="btn-fill-lg bg-blue-dark btn-hover-yellow">
                                                                Subscription List</a>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    All Institute
                                <div>

                                <form action="{{url('branch/all')}}" method="GET" align="right">
                                    <div class="row">
                                        <div class="col-md-8"></div>
                                        <div class="searchInput col-md-4 d-flex form-group">
                                                <input type="search" name="search_branch" id="form1" class="form-control" style="font-size:20px" placeholder="Enter Institute Name"/>
                                            <button type="submit" style="font-size:20px" class="btn btn-primary" data-mdb-ripple-init>
                                                <i class="fas fa-search"></i>
                                              </button>
                                        </div>
                                    </div>
                                </form>
                                </div>

                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                          <th scope="col">Sl No</th>
                                          <th scope="col">Branch Name</th>
                                          <th scope="col">Propietor Name</th>
                                          <th scope="col">Mobile Number</th>
                                          <th scope="col">Email</th>
                                          <th scope="col">Address</th>
                                             <th scope="col">Status</th>
                                          <th scope="col">Action</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                         @if ($branchSearch!==null)
                                         @foreach ($branchSearch as $branches)
                                         @php
                                                $branchdtls=App\Models\BranchDetails::where('branch_id',$branches->id)->first();
                                          @endphp
                                         <tr>

                                             <td>{{$loop->iteration}}</td>
                                             <td>{{$branches->institute_name}}</td>
                                             <td>{{$branches->Propietor_Name}}</td>
                                              <td>{{$branchdtls->mobile_number}}</td>
                                              <td>{{$branchdtls->e_mail}}</td>
                                             <td>{{$branches->division->name}},{{$branches->district->district_name}},{{$branches->address}}</td>
                                             <td><button type="button" class="btn btn-outline-success disabled" style="width: 100%;font-size:15px">{{$branches->status}}</button></td>
                                             <td style="display: flex">

                                                    <a href="{{url('Branch/info',$branches->id)}}" class="btn btn-info btn-lg" style="font-size:15px; margin-right:4%;height:100%"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                    <a href="{{url('Branch/edit',$branches->id)}}" class="btn btn-info btn-lg" style="font-size:15px;margin-right:4%;height:100%"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                    <form action="{{url('Branch/delete',$branches->id)}}"  method="post"  style="margin-left:4%">
                                                        @csrf
                                                     <button type="submit" class="btn btn-danger btn-lg" onclick="return confirm('Are you sure to delete this item?')" style="font-size:15px"><i class="fas fa-trash"></i></button>
                                                 </form>








                                              </td>
                                           </tr>
                                         @endforeach



                                         @endif



                                      </tbody>
                                  </table>
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

