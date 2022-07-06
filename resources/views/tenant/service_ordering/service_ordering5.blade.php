@extends('tenant.public')
@section('title', 'Service Ordering')
@section('content')
<section class="main container" id="service">
	<div class="service">
		<a onclick="history.back()" class="button">Back</a>
		<br><h2 class="text-center">Book now</h2>
		<form action="/service/submit" method="post">
			@csrf
			<div class="mb-3">
				<label class="form-label" for="date">Date:</label>
				<input class="form-control" type="date" name="date" required>
			</div>
			<div class="mb-3">
				<label class="form-label" for="time">Time:</label>
				<input class="form-control" type="time" name="time" required>
			</div>
			<input type="submit" value="Submit Quatation" class="btn btn-primary form-control">
		</form>
	</div>
</section>
@endsection