@extends('tenant.public')
@section('title', 'Property Details')
@section('content')
<?php
$state = $_GET['state'] ?? null;
$i = 0;
$service_count = 0;

$owner = false;
$loggedInUser = session('id') ?? null;
if($user->id == $loggedInUser){
    $owner = true;
}

?>
<section class="properties container" id="property">
	<div class="row">
		<div class="col-lg-12">
			<div class="card mb-4">
				<div class="card-body">
					<p class="card-text"><small class="text-muted">Published on {{\Carbon\Carbon::parse($property->created_at)->format('d M Y')}}</small></p>
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
	</div>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
			@foreach($images as $image)
			<?php $i++; ?>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$i}}"
                aria-label="Slide {{$i}}"></button>
			@endforeach
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{$property->image_url}}" class="d-block w-100" alt="property screenshots">
            </div>
			@foreach($images as $image)
            <div class="carousel-item">
                <img src="{{$image->image_url}}" class="d-block w-100" alt="property screenshot">
            </div>
			@endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
	<br/>
	<div class="row">
		<div class="col-lg-8">
			<div class="card mb-4">
				<div class="card-body">
					<h3>Description</h3>
					<p>{{$property->description}}</p>
				</div>
			</div>
			<div class="card mb-4">
				<div class="card-body">
					<h3>Pricing</h3>
					@foreach($prices as $price)
					{{$price->interval}} month(s) contract: RM {{$price->price}}/month <br/>
					@endforeach
				</div>
			</div>
			<div class="card mb-4">
				<div class="card-body">
					<h3>Suggested Repair Services</h3>
					@foreach($services as $service)
					{{$service->detail->service_name}} ({{$service->detail->service_type}})
					<br/>
					Website: <a href="{{$service->detail->website}}" target="_blank">{{$service->detail->website}}</a>
					<br/>
					Contact: <a href="https://wa.me/{{$service->detail->contact_number}}" target="_blank">{{$service->detail->contact_number}}</a>
					<?php $service_count++; ?>
					@if($service_count != count($services))
					<hr/>
					@endif
					@endforeach
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			@if(!$owner)
				@if($rent_information)
				<div class="mb-4">
					<a class="btn btn-primary form-control">{{ucfirst($rent_information->status)}}</a>
				</div>
				@else
					@if($rent_information_by_others)
					<a class="btn btn-primary form-control">Not Available</a>
					@else
					<div class="mb-4">
						<a class="btn btn-primary form-control" href="/rent/{{$property->id}}">Rent Now</a>
					</div>
					@endif
				@endif
			@endif
			<div class="card mb-4">
				<div class="card-header">
					Listed by
				</div>
				<div class="card-body text-center">
					<img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
						class="rounded-circle img-fluid" style="width: 150px;">
					<h5 class="my-3">{{ucfirst($user->first_name)}} @if($owner) (You) @endif</h5>
					<p class="text-muted mb-4">{{ucfirst($user->state)}}</p>
					<div class="d-flex justify-content-center mb-2">
						<a type="button" class="btn btn-primary ms-1" href="/profile/{{$user->id}}">View Profile</a>
						<a type="button" class="btn btn-outline-primary ms-1" href="https://wa.me/{{$user->phone_number}}" target="_blank">Message</a>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</section>
@endsection