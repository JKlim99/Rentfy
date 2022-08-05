@extends('tenant.public')
@section('title', 'Create Repair Service')
@section('content')

<section class="main container" id="dashboard">
    <div>
        <div class="text-center">
            <h2>Create Repair Service</h2>
            <h5 class="text-muted mb-3">Hi {{ucfirst($user->first_name)}}</h5>
        </div>
        <div class="d-flex justify-content-center mb-4">
            <a type="button" class="btn btn-outline-primary ms-1" href="/dashboard">Dashboard</a>
            <a type="button" class="btn btn-outline-primary ms-1" href="/manage/property">Manage Properties</a>
            <a type="button" class="btn btn-primary ms-1" href="/manage/service">Manage Repair Services</a>
            <a type="button" class="btn btn-outline-primary ms-1" href="/rental">View Rental</a>
        </div>
        <div class="mb-4">
            <a onclick="history.back()" class="button">Back</a>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        Creating Repair Service
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/create/service">
                        @csrf
                        <input type="hidden" name="user_id" value="{{$user->id}}"/>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Service Name</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">
                                    <input type="text" id="service_name" name="service_name" class="form-control" placeholder="Service Name *" value="{{old('service_name')}}" required/>    
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Service Type</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">
                                    <input type="text" id="service_type" name="service_type" class="form-control" placeholder="Service Type *" value="{{old('service_type')}}" required/>    
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Contact Name</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">
                                    <input type="text" id="contact_name" name="contact_name" class="form-control" placeholder="Contact Name *" value="{{old('contact_name')}}" required/>    
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Contact Number</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">
                                    <input type="tel" id="contact_number" name="contact_number" class="form-control" placeholder="Contact Number * (without dash)" value="{{old('contact_number')}}" pattern="[0-9]+"/>    
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Website</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">
                                    <input type="text" id="website" name="website" class="form-control" placeholder="Website" value="{{old('website')}}" required/>    
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="text-center">
                            <input type="submit" class="btn btn-primary" value="Create"/>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection