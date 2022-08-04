@extends('tenant.public')
@section('title', 'User Profile')
@section('content')

<?php
$my_profile = false;
$loggedInUser = session('id') ?? null;
if($user->id == $loggedInUser){
    $my_profile = true;
}
?>
<form method="POST" action="/editprofile">
    @csrf
    <section class="main container" id="profile">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                            class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-3" id="nickname">{{ucfirst($user->first_name)}}</h5>
                        <p class="text-muted mb-1">
                            <select name="user_type" id="user_type" class="form-control">
                                <option>- Select User Type * -</option>
                                <option value="tenant" @if($user->user_type=='tenant')selected @endif>Tenant</option>
                                <option value="landlord" @if($user->user_type=='landlord')selected @endif>Landlord</option>
                            </select>    
                        </p>
                        <p class="text-muted mb-4">
                            <select name="state" id="state" class="form-control">
                                <option value="">- Select State -</option>
                                <option value="selangor" @if($user->state=='selangor')selected @endif>Selangor</option>
                                <option value="kuala lumpur" @if($user->state=='kuala lumpur')selected @endif>Kuala Lumpur</option>
                                <option value="johor" @if($user->state=='johor')selected @endif>Johor</option>
                                <option value="penang" @if($user->state=='penang')selected @endif>Penang</option>
                                <option value="perak" @if($user->state=='perak')selected @endif>Perak</option>
                                <option value="negeri sembilan" @if($user->state=='negeri sembilan')selected @endif>Negeri Sembilan</option>
                                <option value="melaka" @if($user->state=='melaka')selected @endif>Melaka</option>
                                <option value="pahang" @if($user->state=='pahang')selected @endif>Pahang</option>
                                <option value="sabah" @if($user->state=='sabah')selected @endif>Sabah</option>
                                <option value="sarawak" @if($user->state=='sarawak')selected @endif>Sarawak</option>
                                <option value="kedah" @if($user->state=='kedah')selected @endif>Kedah</option>
                                <option value="putrajaya" @if($user->state=='putrajaya')selected @endif>Putrajaya</option>
                                <option value="kelatan" @if($user->state=='kelatan')selected @endif>Kelatan</option>
                                <option value="terengganu" @if($user->state=='terengganu')selected @endif>Terengganu</option>
                                <option value="perlis" @if($user->state=='perlis')selected @endif>Perlis</option>
                                <option value="labuan" @if($user->state=='labuan')selected @endif>Labuan</option>
                            </select>
                        </p>
                        <div class="d-flex justify-content-center mb-2">
                            <button type="submit" class="btn btn-outline-primary ms-1">Update profile</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">First Name</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">
                                    <input type="text" id="first_name" name="first_name" class="form-control" placeholder="First Name *" value="{{old('first_name', $user->first_name)}}" required oninput="updateNickname()"/>    
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Last Name</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">
                                    <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last Name *" value="{{old('last_name', $user->last_name)}}" required/>    
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">
                                    {{$user->email}}  
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Phone</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">
                                    <input type="tel" id="phone_number" name="phone_number" class="form-control" placeholder="Phone Number (without dash)" value="{{old('phone_number', $user->phone_number)}}" pattern="[0-9]+"/>    
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-4">
            <p style="color:red">{{$errors->first() ?? null}}</p>
        </div>
    </section>
</form>
<script>
    var input = document.getElementById('first_name');
    var output = document.getElementById('nickname');
    function updateNickname(){
        console.log('test')
        output.innerHTML = input.value;
    }
</script>
@endsection