@extends('Backend.admin.include.master')

@section('content')
    <div class="dashboard-content-one">
        <!-- Breadcubs Area Start Here -->
        <div class="breadcrumbs-area">
            <h3>ADD DIVISION</h3>
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>Division</li>
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
                    <form class="mb-5" action="{{ url('add_division/insert') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Division Name</label>
                          <input type="text" name="name"class="form-control" placeholder="Enter District Name">
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
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($get_division as $division)
                     <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $division->name }}</td>
                        <td>
                            <a href="{{ url('edit/division',$division->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ url('division/delete',$division->id) }}"  class="btn btn-danger">Delete</a>
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
