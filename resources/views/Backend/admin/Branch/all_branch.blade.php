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
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">Serial No</th>
                                        <th scope="col">Branch Name</th>
                                        <th scope="col">Propietor Name</th>
                                        <th scope="col">Mobile Number</th>
                                        <th scope="col">Emial</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Acction</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($branches as $branches)
                                        <tr>

                                            <td>{{$loop->iteration}}</td></td>
                                            <td>{{$branches->institute_name}}</td>
                                            <td>{{$branches->Propietor_Name}}</td>
                                            {{-- <td>{{$branches->branch_details->mobile_number}}</td> --}}
                                            <td>{{$branches->brance_d->fathers_name}}</td>
                                            <td>{{$branches->division->name}}-{{$branches->district->district_name}}</td>

                                          </tr>
                                        @endforeach


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


