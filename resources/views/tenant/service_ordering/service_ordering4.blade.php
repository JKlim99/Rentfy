@extends('tenant.public')
@section('title', 'Service Ordering')
@section('content')
<section class ="service container main" id="service">
	<a onclick="history.back()" class="button">Back</a>
	<h2 class="text-center">Choose a service type</h2>
	<br/>
	<div class="row">
		@foreach($services as $service)
		@if($service->provider_id == $_GET['provider'])
		<div class="col-sm-6">
			<a href="/service/form?type={{$_GET['type']}}&provider={{$_GET['provider']}}&property={{$_GET['property']}}&service={{$service->id}}">
				<div class="card text-center">
					<div class="card-header chosen">
						Choose
					</div>
					<div class="card-body">
						<div class="mx-auto mx-25">
							<i class='bx bx-user icon-size'></i>
							<h5 class="card-title">{{$service->name}}</h5>
							<p class="card-text">{{$service->description}}</p>
						</div>
					</div>
				</div>
			</a>
		</div>
		@endif
		@endforeach
	  </div>
</section>
@endsection