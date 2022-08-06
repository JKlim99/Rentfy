@extends('tenant.public')
@section('title', 'Service Ordering')
@section('content')
<section class ="service container main" id="service">
	<a onclick="history.back()" class="button">Back</a>
	<h2 class="text-center">Choose your property</h2>
	<br/>
	<div class="row d-flex flex-row flex-nowrap overflow-x">
		@foreach($properties as $property)
		<div class="col-sm-4">
			<a href="/service/type?type={{$_GET['type']}}&provider={{$_GET['provider']}}&property={{$property->id}}">
				<div class="card text-center">
					<div class="card-header chosen">
						Choose
					</div>
					<div class="card-body">
						<div class="mx-auto mx-25">
							<i class='bx bx-home icon-size'></i>
							<h5 class="card-title">{{$property->name}}</h5>
							<p class="card-text">{{$property->city}}, {{$property->state}}</p>
						</div>
					</div>
				</div>
			</a>
		</div>
		@endforeach
	  </div>
</section>
@endsection