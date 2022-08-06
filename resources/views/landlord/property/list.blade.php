@extends('tenant.public')
@section('title', 'Properties Information')
@section('content')

<?php
$state = $_GET['state'] ?? null;
?>

<section class="main container" id="dashboard">
    <div>
        <div class="text-center">
            <h2>Properties Information</h2>
            <h5 class="text-muted mb-3">Hi {{ucfirst($user->first_name)}}</h5>
        </div>
        <div class="d-flex justify-content-center mb-4">
            <a type="button" class="btn btn-outline-primary ms-1" href="/dashboard">Dashboard</a>
            <a type="button" class="btn btn-primary ms-1" href="/manage/property">Manage Properties</a>
            <a type="button" class="btn btn-outline-primary ms-1" href="/manage/service">Manage Repair Services</a>
            <a type="button" class="btn btn-outline-primary ms-1" href="/rental">View Rental</a>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="/manage/property" method="get" id="searchForm">
                            <div class="row">
                                <div class="col-sm-4">
                                    <select name="state" id="state" class="form-select" data-toggle="dropdown">
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
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="value" placeholder="Search by Locations or Property name" value="{{$_GET['value']?? null}}">
                                </div>
                                <div class="col-sm-2">
                                    <button class="btn btn-primary" type="submit">
                                        Search
                                    </button>
                                </div>
                            </div>
                        </form>
                        <br>
                        <div class="text-end">
                            <a href="/create/properties" class="btn btn-primary">Create New Property</a>
                        </div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Building Type</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Created On</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($properties as $property)
                                <tr onclick="window.location='/properties/{{$property->id}}'" style="cursor:pointer">
                                    <th scope="row">{{$property->id}}</th>
                                    <td>{{$property->name}}</td>
                                    <td>{{$property->building_type}}</td>
                                    <td>{{ucfirst($property->listing_status)}}</td>
                                    <td>{{\Carbon\Carbon::parse($property->created_at)->format('d M Y')}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection