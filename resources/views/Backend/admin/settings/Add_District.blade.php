@extends('Backend.admin.include.master')

@section('content')
    <div class="dashboard-content-one">
        <!-- Breadcubs Area Start Here -->
        <div class="breadcrumbs-area">
            <h3>ADD DISTRICT</h3>
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>District</li>
            </ul>
        </div>
<div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                <div class="card-header">
                    Add District
                </div>
                <div class="card-body">
                    <form class="mb-5" action="{{ url('add_district/insert') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Division Name</label>
                            <br>
                         <select name="division_id" id="" class="form-select form-select-lg mb-3 form-controll">
                            <option value=""selected>Select Division</option>
                            @foreach ($get_division as $division)
                            <option value="{{ $division->id }}">{{$division->name  }}</option>
                            @endforeach
                         </select>
                          </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label"> District Name</label>
                          <input type="text" name="district_name"class="form-control" placeholder="Enter sub District Name">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
              </div>
            </div>

            <div class="col-md-6">
                <div class="card">
               <table class="table">
                <thead>
                    <th>Serial No</th>
                    <th>Division Name</th>
                    <th>District Name</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($get_all as $district)
                     <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $district->division->name }}</td>
                        <td>{{ $district->district_name}}</td>
                        <td>
                            <a href="{{ url('edit/district',$district->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ url('district/delete',$district->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                     </tr>
                    @endforeach
                </tbody>
               </table>
              </div>
            </div>
        </div>
    </div>

</div>
        <!-- Social Media End Here -->
    @endsection
