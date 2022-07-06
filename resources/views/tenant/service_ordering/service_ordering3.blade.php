@extends('tenant.public')
@section('title', 'Service Ordering')
@section('content')
<section class ="service container main" id="service">
	<a onclick="history.back()" class="button">Back</a>
	<h2 class="text-center">Choose your property</h2>
	<br/>
	<div class="row d-flex flex-row flex-nowrap overflow-x">
		<div class="col-sm-4">
			<a href="/service/type">
				<div class="card text-center">
					<div class="card-header chosen">
						Choose
					</div>
					<div class="card-body">
						<div class="mx-auto mx-25">
							<i class='bx bx-user icon-size'></i>
							<h5 class="card-title">Property 1</h5>
							<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
						</div>
					</div>
				</div>
			</a>
		</div>
		<div class="col-sm-4">
			<a href="/service/type">
				<div class="card text-center">
					<div class="card-header chosen">
						Choose
					</div>
					<div class="card-body">
						<div class="mx-auto mx-25">
							<i class='bx bx-user icon-size'></i>
							<h5 class="card-title">Property 2</h5>
							<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
						</div>
					</div>
				</div>
			</a>
		</div>
		<div class="col-sm-4">
			<a href="/service/type">
				<div class="card text-center">
					<div class="card-header chosen">
						Choose
					</div>
					<div class="card-body">
						<div class="mx-auto mx-25">
							<i class='bx bx-user icon-size'></i>
							<h5 class="card-title">Property 2</h5>
							<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
						</div>
					</div>
				</div>
			</a>
		</div>
		<div class="col-sm-4">
			<a href="/service/type">
				<div class="card text-center">
					<div class="card-header chosen">
						Choose
					</div>
					<div class="card-body">
						<div class="mx-auto mx-25">
							<i class='bx bx-user icon-size'></i>
							<h5 class="card-title">Property 2</h5>
							<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
						</div>
					</div>
				</div>
			</a>
		</div>
		<div class="col-sm-4">
			<a href="/service/type">
				<div class="card text-center">
					<div class="card-header chosen">
						Choose
					</div>
					<div class="card-body">
						<div class="mx-auto mx-25">
							<i class='bx bx-user icon-size'></i>
							<h5 class="card-title">Property 3</h5>
							<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
						</div>
					</div>
				</div>
			</a>
		</div>
	  </div>
</section>
@endsection