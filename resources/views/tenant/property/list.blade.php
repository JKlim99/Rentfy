@extends('tenant.public')
@section('title', 'Property List')
@section('content')
<?php
$state = $_GET['state'] ?? null;
?>
<section class="properties container" id="properties">
	<div class="searchbar">
		<br>
		<div class="container desktop-searchbar">
			<div class="row">
				<div class="col-xs-8 col-xs-offset-2">
					<form action="/search" method="get" id="searchForm" class="input-group">
						<div class="input-group-btn search-panel">
							<select name="state" id="state" class="search-dropdown btn btn-default dropdown-toggle" data-toggle="dropdown">
								<option value="">All States</option>
								<option value="selangor" @if($state=='selangor') selected @endif>Selangor</option>
								<option value="kuala lumpur" @if($state=='kuala lumpur') selected @endif>Kuala Lumpur</option>
								<option value="johor" @if($state=='johor') selected @endif>Johor</option>
								<option value="penang" @if($state=='penang') selected @endif>Penang</option>
								<option value="perak" @if($state=='perak') selected @endif>Perak</option>
								<option value="negeri sembilan" @if($state=='negeri sembilan') selected @endif>Negeri Sembilan</option>
								<option value="melaka" @if($state=='melaka') selected @endif>Melaka</option>
								<option value="pahang" @if($state=='pahang') selected @endif>Pahang</option>
								<option value="sabah" @if($state=='sabah') selected @endif>Sabah</option>
								<option value="sarawak" @if($state=='sarawak') selected @endif>Sarawak</option>
								<option value="kedah" @if($state=='kedah') selected @endif>Kedah</option>
								<option value="putrajaya" @if($state=='putrajaya') selected @endif>Putrajaya</option>
								<option value="kelatan" @if($state=='kelatan') selected @endif>Kelatan</option>
								<option value="terengganu" @if($state=='terengganu') selected @endif>Terengganu</option>
								<option value="perlis" @if($state=='perlis') selected @endif>Perlis</option>
								<option value="labuan" @if($state=='labuan') selected @endif>Labuan</option>
							</select>
						</div>
						<input type="text" class="form-control" name="value" placeholder="Search by Locations or Property name" value="{{$_GET['value']?? null}}">
						<span class="input-group-btn">
							<button class="button btn btn-default" type="submit">
								Search
							</button>
						</span>
					</form>
				</div><!-- end col-xs-8 -->       
			</div><!-- end row -->  
		</div><!-- end container -->
		<div class="mobile-searchbar">
			<form action="/search" method="get" id="searchForm">
				<div class="search-panel">
					<select name="state" id="state" class="form-control" data-toggle="dropdown">
						<option value="">All States</option>
						<option value="selangor" @if($state=='selangor') selected @endif>Selangor</option>
						<option value="kuala lumpur" @if($state=='kuala lumpur') selected @endif>Kuala Lumpur</option>
						<option value="johor" @if($state=='johor') selected @endif>Johor</option>
						<option value="penang" @if($state=='penang') selected @endif>Penang</option>
						<option value="perak" @if($state=='perak') selected @endif>Perak</option>
						<option value="negeri sembilan" @if($state=='negeri sembilan') selected @endif>Negeri Sembilan</option>
						<option value="melaka" @if($state=='melaka') selected @endif>Melaka</option>
						<option value="pahang" @if($state=='pahang') selected @endif>Pahang</option>
						<option value="sabah" @if($state=='sabah') selected @endif>Sabah</option>
						<option value="sarawak" @if($state=='sarawak') selected @endif>Sarawak</option>
						<option value="kedah" @if($state=='kedah') selected @endif>Kedah</option>
						<option value="putrajaya" @if($state=='putrajaya') selected @endif>Putrajaya</option>
						<option value="kelatan" @if($state=='kelatan') selected @endif>Kelatan</option>
						<option value="terengganu" @if($state=='terengganu') selected @endif>Terengganu</option>
						<option value="perlis" @if($state=='perlis') selected @endif>Perlis</option>
						<option value="labuan" @if($state=='labuan') selected @endif>Labuan</option>
					</select>
				</div>
				<br/>
				<input type="text" class="form-control" name="value" placeholder="Search by Locations or Property name" value="{{$_GET['value']?? null}}">
				<br/>
				<div class="text-center">
					<button class="btn btn-primary" type="submit">
						Search
					</button>
				</div>
			</form>   
		</div>
	</div>
	<br>
	<div class="properties-container container">
		<div class="row">
			@foreach($properties as $property)
			<div class="col-sm-6 d-flex align-items-stretch">
				<a href="/property/{{$property->id}}">
					<div class="card mb-3">
						<img src="{{$property->image_url}}" class="card-img-top properties-list-img" alt="room-image">
						<div class="card-body">
							<h5 class="card-title">{{ucfirst($property->name)}} ({{ucfirst($property->building_type)}})</h5>
							<div class="icon">
								<i class='bx bxs-bed'><span>{{$property->number_of_bedroom}}</span></i>
								<i class='bx bxs-bath'><span>{{$property->number_of_bathroom}}</span></i>
								<i class='bx bx-shape-square'><span>{{$property->area_size}}</span></i>
							</div>
							<p class="card-text">{{ucfirst($property->city)}}, {{ucfirst($property->state)}}</p>
							<p class="card-text"><small class="text-muted">Published on {{\Carbon\Carbon::parse($property->created_at)->format('d M Y')}}</small></p>
						</div>
					</div>
				</a>
			</div>
			@endforeach
			@if(count($properties) < 1)
			<div class="d-flex align-items-center justify-content-center vh-100">
				<div class="text-center">
					<p class="fs-3"> <span class="text-danger">Opps!</span> Result not found.</p>
					<p class="lead">
						We could not find the property you're looking for.
					  </p>
				</div>
			</div>
			@endif
		</div>
	</div>
</section>
@endsection