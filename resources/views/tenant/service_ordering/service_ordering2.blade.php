@extends('tenant.public')
@section('title', 'Service Ordering')
@section('content')
<section class ="service container main" id="service">
	<a onclick="history.back()" class="button">Back</a>
	<h2 class="text-center">Choose your service provider</h2>
	<br/>
	<div class="row">
		@foreach($providers as $provider)
		@if($provider->type == $_GET['type'])
		<div class="col-sm-4">
			<a href="/service/property?type={{$_GET['type']}}&provider={{$provider->id}}">
				<div class="card text-center">
					<div class="card-header chosen">
						Choose
					</div>
					<div class="card-body">
						<div class="mx-auto mx-25">
							<i class='bx bx-user icon-size'></i>
							<h5 class="card-title">{{$provider->name}}</h5>
							<p class="card-text">{{$provider->description}}</p>
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