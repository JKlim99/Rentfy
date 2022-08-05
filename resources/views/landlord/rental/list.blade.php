@extends('tenant.public')
@section('title', 'Dashboard')
@section('content')

<section class="main container" id="dashboard">
    <div>
        <div class="text-center">
            <h2>Rental Information</h2>
            <h5 class="text-muted mb-3">Hi {{ucfirst($user->first_name)}}</h5>
        </div>
        <div class="d-flex justify-content-center mb-4">
            <a type="button" class="btn btn-outline-primary ms-1" href="/dashboard">Dashboard</a>
            <a type="button" class="btn btn-outline-primary ms-1" href="/manage/property">Manage Properties</a>
            <a type="button" class="btn btn-outline-primary ms-1" href="/manage/service">Manage Repair Services</a>
            <a type="button" class="btn btn-primary ms-1" href="/rental">View Rental</a>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Property Name</th>
                                    <th scope="col">Tenant Name</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">Duration</th>
                                    <th scope="col">Payment Per Month</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rentals as $rental)
                                <tr onclick="window.location='/rental/{{$rental->id}}'" style="cursor:pointer">
                                    <th scope="row">{{$rental->id}}</th>
                                    <td>{{$rental->name}}</td>
                                    <td>{{$rental->first_name}} {{$rental->last_name}}</td>
                                    <td>{{$rental->started_at}}</td>
                                    <td>{{$rental->interval}} months</td>
                                    <td>RM {{$rental->pay_amount}}</td>
                                    <td>{{ucfirst($rental->status)}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection