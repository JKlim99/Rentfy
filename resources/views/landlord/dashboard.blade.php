@extends('tenant.public')
@section('title', 'Dashboard')
@section('content')

<section class="main container" id="dashboard">
    <div>
        <div class="text-center">
            <h2>Landlord Dashboard</h2>
            <h5 class="text-muted mb-3">Hi {{ucfirst($user->first_name)}}</h5>
        </div>
        <div class="d-flex justify-content-center mb-4">
            <a type="button" class="btn btn-primary ms-1" href="/dashboard">Dashboard</a>
            <a type="button" class="btn btn-outline-primary ms-1" href="/manage/property">Manage Properties</a>
            <a type="button" class="btn btn-outline-primary ms-1" href="/manage/service">Manage Repair Services</a>
            <a type="button" class="btn btn-outline-primary ms-1" href="/rental">View Rental</a>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <i class="fa fa-file dashboard-icon my-4"></i>
                        <h5 class="">Total Active Rental</h5>
                        <p class="text-muted mb-4 dashboard-icon">{{$tenant_count}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <i class="fa fa-money dashboard-icon my-4"></i>
                        <h5 class="">Total Income Per Month</h5>
                        <p class="text-muted mb-4 dashboard-icon">RM {{$total_income[0]->total_income ?? '0.00'}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <i class="fa fa-house dashboard-icon my-4"></i>
                        <h5 class="">Total Property</h5>
                        <p class="text-muted mb-4 dashboard-icon">{{$property_count}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <i class="fa fa-user dashboard-icon my-4"></i>
                        <h5 class="">Pending Rental Request</h5>
                        <p class="text-muted mb-4 dashboard-icon">{{$rental_request_count}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection