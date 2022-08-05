@extends('tenant.public')
@section('title', 'Rent Now')
@section('content')
<?php
$state = $_GET['state'] ?? null;
$i = 0;
$service_count = 0;
?>
<section class="properties container" id="property">
	<a onclick="history.back()" class="button">Back</a>
	<h2 class="text-center">Rent Now</h2>
	<br/>
	<div class="row">
		<div class="col-lg-6 d-flex align-items-stretch">
			<div class="card mb-4">
				<div class="card-header">
					SELECTED PROPERTY
				</div>
				<img src="{{$property->image_url}}" class="card-img-top" alt="property screenshot">
				<div class="card-body">
					<h2>{{$property->name}} ({{$property->building_type}})</h2>
					<div class="icon">
						<i class='bx bxs-bed'><span>{{$property->number_of_bedroom}}</span></i>
						<i class='bx bxs-bath'><span>{{$property->number_of_bathroom}}</span></i>
						<i class='bx bx-shape-square'><span>{{$property->area_size}}</span></i>
					</div>
					<p class="card-text">{{ucfirst($property->city)}}, {{ucfirst($property->state)}}</p>
				</div>
			</div>
		</div>
		<div class="col-lg-6 align-items-stretch">
			<div class="card mb-4">
				<div class="card-header">
					PROPERTY OWNER
				</div>
				<div class="card-body text-center">
					<h5 class="my-3">{{ucfirst($owner->first_name)}}</h5>
					<p class="text-muted mb-4">{{ucfirst($owner->state)}}</p>
					<div class="d-flex justify-content-center mb-2">
						<a type="button" class="btn btn-primary ms-1" href="/profile/{{$owner->id}}">View Profile</a>
						<a type="button" class="btn btn-outline-primary ms-1" href="https://wa.me/{{$owner->phone_number}}" target="_blank">Message</a>
					</div>
				</div>
			</div>
			<div class="card mb-4">
                <div class="card-body">
					<form method="POST" action="/rent">
						@csrf
						<input type="hidden" name="property_id" value="{{$property->id}}"/>
						<div class="row mb-4">
							<div class="col-sm-4">
								<p class="mb-0">Rental option</p>
							</div>
							<div class="col-sm-8">
								<p class="text-muted mb-0">
									<select class="form-select" name="price_id">
									@foreach($prices as $price)
										<option value="{{$price->id}}">{{$price->interval}} month(s) - RM {{$price->price}}/month</option>
									@endforeach
									</select>
								</p>
							</div>
						</div>
						<div class="row mb-4">
							<div class="col-sm-4">
								<p class="mb-0">Move in date (optional)</p>
							</div>
							<div class="col-sm-8">
								<p class="text-muted mb-0">
									<input type="date" id="date" name="date" class="form-control" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}"/>
								</p>
							</div>
						</div>
						<div class="row mb-4">
							<div class="col-sm-4">
								<p class="mb-0">Email Address</p>
							</div>
							<div class="col-sm-8">
								<p class="text-muted mb-0">
									<input type="text" id="email" name="email" class="form-control" placeholder="Email Address *" value="{{old('email', $user->email)}}" required/>
								</p>
							</div>
						</div>
						<div class="row mb-4">
							<div class="col-sm-4">
								<p class="mb-0">Contact Number</p>
							</div>
							<div class="col-sm-8">
								<p class="text-muted mb-0">
									<input type="tel" id="phone_number" name="phone_number" class="form-control" placeholder="Phone Number (without dash)" value="{{old('phone_number', $user->phone_number)}}" pattern="[0-9]+"/>    
								</p>
							</div>
						</div>
						<div class="d-flex justify-content-center mb-2">
							<button type="submit" class="btn btn-primary ms-1">Rent Now</button>
						</div>
					</form>
                </div>
            </div>
		</div>
	</div>
</section>
@endsection