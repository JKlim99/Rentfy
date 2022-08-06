@extends('tenant.public')
@section('title', 'Service Ordering')
@section('content')
<section class="main container" id="service">
	<div class="service">
		<a onclick="history.back()" class="button">Back</a>
		<br><h2 class="text-center">Book now</h2>
		<form action="/service/submit" method="post">
			@csrf
			<input type="hidden" name="type" value="{{$_GET['type']}}"/>
			<input type="hidden" name="provider" value="{{$_GET['provider']}}"/>
			<input type="hidden" name="property" value="{{$_GET['property']}}"/>
			<input type="hidden" name="service" value="{{$_GET['service']}}"/>
			<div class="mb-3">
				<label class="form-label" for="date">Date:</label>
				<input class="form-control" type="date" name="date" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}" required>
			</div>
			<div class="mb-3">
				<label class="form-label" for="time">Time:</label>
				<input class="form-control" type="time" name="time" value="{{\Carbon\Carbon::now()->format('H:i')}}" required>
			</div>
			<input type="submit" value="Submit Quatation" class="btn btn-primary form-control">
		</form>
	</div>
</section>
@endsection