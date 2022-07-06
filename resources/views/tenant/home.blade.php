@extends('tenant.public')
@section('title', 'Home')
@section('content')
<style>
	body{
		color: var(--text-color);
		background-image: url(../images/img2.jpg);
		background-size: cover;
		background-position: center
	}
</style>
<section class="main container" id="main">
	<div class="searchbar">
		<br><h2 class="home-title">Have a rental property in mind?<br>Search here</h2>
		<div class="container">
			<div class="row">
				<div class="col-xs-8 col-xs-offset-2">
					<form action="/search" method="get" id="searchForm" class="input-group">
						
						<div class="input-group-btn search-panel">
							<select name="state" id="state" class="search-dropdown btn btn-default dropdown-toggle" data-toggle="dropdown">
								<option value="">All States</option>
								<option value="selangor">Selangor</option>
								<option value="kuala lumpur">Kuala Lumpur</option>
								<option value="johor">Johor</option>
								<option value="penang">Penang</option>
								<option value="perak">Perak</option>
								<option value="negeri sembilan">Negeri Sembilan</option>
								<option value="melaka">Melaka</option>
								<option value="pahang">Pahang</option>
								<option value="sabah">Sabah</option>
								<option value="sarawak">Sarawak</option>
								<option value="kedah">Kedah</option>
								<option value="putrajaya">Putrajaya</option>
								<option value="kelatan">Kelatan</option>
								<option value="terengganu">Terengganu</option>
								<option value="perlis">Perlis</option>
								<option value="labuan">Labuan</option>
							</select>
						</div>
						<input type="text" class="form-control" name="value" placeholder="Search by Locations or Property name">
						<span class="input-group-btn">
							<button class="button btn btn-default" type="submit">
								Search
							</button>
						</span>
					</form><!-- end form -->     
				</div><!-- end col-xs-8 -->       
			</div><!-- end row -->  
		</div><!-- end container -->
	</div>
</section>
@endsection