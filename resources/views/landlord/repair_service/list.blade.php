@extends('tenant.public')
@section('title', 'Repair Service Information')
@section('content')

<section class="main container" id="dashboard">
    <div>
        <div class="text-center">
            <h2>Repair Service Information</h2>
            <h5 class="text-muted mb-3">Hi {{ucfirst($user->first_name)}}</h5>
        </div>
        <div class="d-flex justify-content-center mb-4">
            <a type="button" class="btn btn-outline-primary ms-1" href="/dashboard">Dashboard</a>
            <a type="button" class="btn btn-outline-primary ms-1" href="/manage/property">Manage Properties</a>
            <a type="button" class="btn btn-primary ms-1" href="/manage/service">Manage Repair Services</a>
            <a type="button" class="btn btn-outline-primary ms-1" href="/rental">View Rental</a>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="text-end">
                            <a href="/create/service" class="btn btn-primary">Create Repair Service</a>
                        </div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Service Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($services as $service)
                                <tr onclick="window.location='/service/{{$service->id}}'" style="cursor:pointer">
                                    <th scope="row">{{$service->id}}</th>
                                    <td>{{$service->service_name}}</td>
                                    <td>{{$service->service_type}}</td>
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