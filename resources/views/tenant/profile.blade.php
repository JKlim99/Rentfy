@extends('tenant.public')
@section('title', 'User Profile')
@section('content')

<?php
$my_profile = false;
$loggedInUser = session('id') ?? null;
if($user->id == $loggedInUser){
    $my_profile = true;
}
?>
<section class="main container" id="profile">
    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body text-center">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                        class="rounded-circle img-fluid" style="width: 150px;">
                    <h5 class="my-3">{{ucfirst($user->first_name)}}</h5>
                    <p class="text-muted mb-1">{{ucfirst($user->user_type)}}</p>
                    <p class="text-muted mb-4">{{ucfirst($user->state)}}</p>
                    <div class="d-flex justify-content-center mb-2">
                        @if($my_profile)
                        <a type="button" class="btn btn-outline-primary ms-1" href="/editprofile">Edit profile</a>
                        @else
                        <a type="button" class="btn btn-outline-primary ms-1" href="https://wa.me/{{$user->phone_number}}" target="_blank">Message</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Full Name</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ucfirst($user->first_name).' '.ucfirst($user->last_name)}}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Email</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><a href="mailto:{{$user->email}}">{{$user->email}}</a></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Phone</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><a href="tel:{{$user->phone_number}}">{{$user->phone_number}}</a></p>
                        </div>
                    </div>
                </div>
            </div>
            @if($user->user_type == 'landlord')
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4 mb-md-0">
                        <div class="card-body">
                            <p class="mb-4"><span class="text-primary font-italic me-1">Properties</span>
                            </p>
                            @foreach($properties as $property)
                            <h5 class="card-title">{{ucfirst($property->name)}} ({{ucfirst($property->building_type)}})</h5>
							<div class="icon">
								<i class='bx bxs-bed'><span>{{$property->number_of_bedroom}}</span></i>
								<i class='bx bxs-bath'><span>{{$property->number_of_bathroom}}</span></i>
                                <i class='bx bx-shape-square'><span>{{$property->area_size}}</span></i>
							</div>
							<p class="card-text">{{ucfirst($property->city)}}, {{ucfirst($property->state)}}</p>
							<p class="card-text"><small class="text-muted">Published on {{\Carbon\Carbon::parse($property->created_at)->format('d M Y')}}</small></p>
                            <a class="btn btn-primary" href="/property/{{$property->id}}">View more</a>
                            <hr/>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if($user->user_type == 'tenant')
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4 mb-md-0">
                        <div class="card-body">
                            <p class="mb-4"><span class="text-primary font-italic me-1">Reviews</span>
                            </p>
                            {{-- add review loop --}}
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    </div>
</section>
@endsection