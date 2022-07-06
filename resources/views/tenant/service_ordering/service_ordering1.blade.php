@extends('tenant.public')
@section('title', 'Service Ordering')
@section('content')
<section class ="service container main" id="service">
	<h2 class="text-center">Choose a service</h2>
	<br/>
	<div class="row">
		<div class="col-sm-6">
			<a href="/service/provider">
				<div class="card text-center">
					<div class="card-header chosen">
						Choose
					</div>
					<div class="card-body">
						<div class="mx-auto mx-25">
							<i class='bx bx-user icon-size'></i>
							<h5 class="card-title">Cleaning Services</h5>
							<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
						</div>
					</div>
				</div>
			</a>
		</div>
		<div class="col-sm-6">
			<a href="/service/provider">
				<div class="card text-center">
					<div class="card-header chosen">
						Choose
					</div>
					<div class="card-body">
						<div class="mx-auto mx-25">
							<i class='bx bx-car icon-size'></i>
							<h5 class="card-title">Move in/Move out services</h5>
							<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
						</div>
					</div>
				</div>
			</a>
		</div>
	  </div>
</section>
@endsection