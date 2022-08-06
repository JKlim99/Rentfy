@extends('tenant.public')
@section('title', 'Billing and Payment')
@section('content')

<section class="main container" id="dashboard">
    <div>
        <div class="text-center">
            <h2 class="mb-3">Rented Properties</h2>
        </div>
        <div class="row">
            @foreach($rentals as $rental)
			<div class="col-sm-6">
				<div class="card mb-3">
					<img src="{{$rental->image_url}}" class="card-img-top properties-list-img" alt="room-image">
					<div class="card-body">
						<h5 class="card-title"><a href="/property/{{$rental->property_id}}">{{ucfirst($rental->name)}} ({{ucfirst($rental->building_type)}})</a></h5>
						<div class="icon">
							<i class='bx bxs-bed'><span>{{$rental->number_of_bedroom}}</span></i>
							<i class='bx bxs-bath'><span>{{$rental->number_of_bathroom}}</span></i>
							<i class='bx bx-shape-square'><span>{{$rental->area_size}}</span></i>
						</div>
						<span class="badge bg-secondary @if($rental->status == 'renting') bg-success @endif">{{ucfirst($rental->status)}}</span>
						<p class="card-text">{{ucfirst($rental->city)}}, {{ucfirst($rental->state)}}</p>
						<p class="card-text">{{$rental->interval}} month(s) contract - RM {{$rental->pay_amount}}/month</p>
						<p class="card-text"><small class="text-muted">Contract validity: {{\Carbon\Carbon::parse($rental->created_at)->format('d M Y')}} - {{\Carbon\Carbon::parse($rental->created_at)->addMonths($rental->interval)->format('d M Y')}}</small>
							<br/><small class="text-muted">Owner: <a href="/profile/{{$rental->owner_id}}">{{$rental->first_name.' '.$rental->last_name}}</a></small></p>
						@if($rental->status == 'renting')
						<a href="/terminate/rent/{{$rental->rental_id}}" class="btn btn-danger form-control" onclick="return confirm('Are you sure you want to terminate the rental?');">Terminate</a>
						@elseif($rental->status == 'pending')
						<a href="/cancel/rent/{{$rental->rental_id}}" class="btn btn-secondary form-control" onclick="return confirm('Are you sure you want to cancel the rental request?');">Cancel</a>
						@endif
					</div>
				</div>
			</div>
			@endforeach
        </div>
    </div>
</section>
@endsection