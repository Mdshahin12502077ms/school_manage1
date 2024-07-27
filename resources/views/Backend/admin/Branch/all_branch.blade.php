@extends('Backend.admin.include.master')

@section('content')
    <div class="dashboard-content-one">
        <!-- Breadcubs Area Start Here -->
        <div class="breadcrumbs-area">
            <h3>All BRANCH</h3>
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>All Branch</li>
            </ul>
        </div>
        <div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                All Branch
                                <form action="{{url('branch/all')}}" method="GET" align="right">
                                    <div class="row">
                                        <div class="col-md-8"></div>
                                        <div class="searchInput col-md-4 d-flex">
                                                <input type="search" name="search_branch" id="form1" class="form-control" style="font-size:15px" placeholder="Enter Institute Name"/>
                                            <button type="submit" class="btn btn-primary" data-mdb-ripple-init>
                                                <i class="fas fa-search"></i>
                                              </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                          <th scope="col">Serial No</th>
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

                                             <td>{{$loop->iteration}}</td></td>
                                             <td>{{$branches->institute_name}}</td>
                                             <td>{{$branches->Propietor_Name}}</td>
                                              <td>{{$branchdtls->mobile_number}}</td>
                                              <td>{{$branchdtls->e_mail}}</td>
                                             <td>{{$branches->division->name}},{{$branches->district->district_name}},{{$branches->address}}</td>
                                             <td><button type="button" class="btn btn-outline-success disabled" style="width: 100%;font-size:15px">{{$branches->status}}</button></td>
                                             <td class="d-flex">
                                                <div>
                                                    <a href="{{url('Branch/info',$branches->id)}}" class="btn btn-info btn-lg"><i class="fa-solid fa-hurricane"></i></a>
                                                    <a href="{{url('Branch/edit',$branches->id)}}" class="btn btn-info btn-lg"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                </div>
                                                <div>
                                                    <form action="{{url('Branch/delete',$branches->id)}}"  method="post"  style="margin-left:4%">
                                                        @csrf
                                                     <button type="submit" class="btn btn-danger btn-lg" onclick="return confirm('Are you sure to delete this item?')"><i class="fas fa-trash"></i></button>
                                                 </form>
                                                </div>



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

