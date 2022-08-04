@extends('tenant.public')
@section('title', 'Registration')
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
    <form class="login-form" method="POST" action="/register">
        @csrf
		<div class="text-center">
			<h1>RENTFY</h1>
			<br>
		</div>

        <div class="mb-4">
            <select name="user_type" id="user_type" class="form-select">
                <option>- Select User Type * -</option>
                <option value="tenant" @if(old('user_type')=='tenant')selected @endif>Tenant</option>
                <option value="landlord" @if(old('user_type')=='landlord')selected @endif>Landlord</option>
            </select>
        </div>

        <div class="mb-4">
            <input type="text" id="first_name" name="first_name" class="form-control" placeholder="First Name *" value="{{old('first_name')}}" required/>
        </div>

        <div class="mb-4">
            <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last Name *" value="{{old('last_name')}}" required/>
        </div>

        <div class="mb-4">
            <input type="email" id="email" name="email" class="form-control" placeholder="Email Address *" value="{{old('email')}}" required/>
        </div>

        <div class="mb-4">
            <input type="tel" id="phone_number" name="phone_number" class="form-control" placeholder="Phone Number (without dash)" value="{{old('phone_number')}}" pattern="[0-9]+"/>
        </div>

        <div class="mb-4">
            <select name="state" id="state" class="form-select">
                <option value="">- Select State -</option>
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

        <div class="mb-4">
            <div class="input-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password *" required/>
                <div class="input-group-append">
                    <div class="input-group-text" id="togglePassword">Show</div>
                </div>
            </div>
        </div>
        
        <div class="mb-4">
            <div class="input-group">
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password *" required/>
                <div class="input-group-append">
                    <div class="input-group-text" id="toggleConfirmPassword">Show</div>
                </div>
            </div>
        </div>

        <div class="mb-4">
            <p style="color:red">{{$errors->first() ?? null}}</p>
        </div>
		
		<button type="submit" class="btn btn-primary btn-block form-control">Register</button>
		
        <div class="text-center">
            <p>Already have an account? <a href="/login">Login Now</a></p>
        </div>
    </form>
</section>
<script>
    const togglePassword = document.querySelector("#togglePassword");
    const password = document.querySelector("#password");

    togglePassword.addEventListener("click", function () {
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);
        
        if(type == "password"){
            this.innerHTML  = "Show";
        }
        else{
            this.innerHTML  = "Hide";
        }
    });

    const toggleConfirmPassword = document.querySelector("#toggleConfirmPassword");
    const confirm_password = document.querySelector("#confirm_password");

    toggleConfirmPassword.addEventListener("click", function () {
        // toggle the type attribute
        const type = confirm_password.getAttribute("type") === "password" ? "text" : "password";
        confirm_password.setAttribute("type", type);
        
        if(type == "password"){
            this.innerHTML  = "Show";
        }
        else{
            this.innerHTML  = "Hide";
        }
    });
</script>
@endsection