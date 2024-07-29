@extends('Backend.admin.include.master')

@section('content')
    <div class="dashboard-content-one">
        <!-- Breadcubs Area Start Here -->
        <div class="breadcrumbs-area">
            <h3> BRANCH Information</h3>
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>Branch Information</li>
            </ul>
        </div>
        <div>

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="dashboard-content-one">
                            <!-- Breadcubs Area Start Here -->

                            <!-- Breadcubs Area End Here -->
                            <!-- Student Details Area Start Here -->
                            <div class="card height-auto">
                                <div class="card-body">
                                    <div class="heading-layout1">
                                        <div class="item-title">
                                            <h3>Branch Details</h3>
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
                                    <div class="single-info-details">

                                        <div class="item-content">
                                            <div class="header-inline item-header">
                                                <h3 class="text-dark-medium font-medium">{{$branch->institute_name}}</h3>
                                                <div class="header-elements">
                                                    <ul>
                                                        <li><a href="#"><i class="far fa-edit"></i></a></li>
                                                        <li><a href="#"><i class="fas fa-print"></i></a></li>
                                                        <li><a href="#"><i class="fas fa-download"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="info-table table-responsive">
                                                <table class="table text-nowrap">
                                                    <tbody>

                                                        <tr>
                                                            <td>Registration Id:</td>
                                                            <td class="font-medium text-dark-medium">{{$branch->registration_id}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Institute Name:</td>
                                                            <td class="font-medium text-dark-medium">{{$branch->institute_name}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Status:</td>
                                                            <td class="font-medium text-dark-medium"><button type="button" class="btn-fill text-orange-peel border-orange-peel">{{$branch->status}}</button></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Email:</td>
                                                            <td class="font-medium text-dark-medium">{{$branch_details->e_mail}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Mobile:</td>
                                                            <td class="font-medium text-dark-medium">{{$branch_details->mobile_number}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Address:</td>
                                                            <td class="font-medium text-dark-medium">Division: {{ $branch->division->name}},District: {{ $branch->district->district_name}},Local Address: {{$branch->address}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Active Package:</td>
                                                            <td class="font-medium text-dark-medium">{{$subscription->plan->name}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Total Amount:</td>
                                                            <td class="font-medium text-dark-medium">{{$subscription->plan->price}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Paying Amount:</td>
                                                            <td class="font-medium text-dark-medium">{{0.0}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Due Amount:</td>
                                                            <td class="font-medium text-dark-medium">{{0.0}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Date Of Start:</td>
                                                            <td class="font-medium text-dark-medium">{{$subscription->starting_date}}</td>
                                                        </tr>

                                                        <tr>
                                                            <td>Date Of Expired:</td>
                                                            <td class="font-medium text-dark-medium">{{$subscription->expired_date}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Last Upgrade Date</td>
                                                            <td class="font-medium text-dark-medium">{{$subscription->updated_at}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

