@extends('tenant.public')
@section('title', 'Login')
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
    <form class="login-form" method="POST" action="/login">
        @csrf
		<div class="text-center">
			<h1>RENTFY</h1>
			<br>
		</div>

        <div class="mb-4">
            <input type="email" id="email" name="email" class="form-control" placeholder="Email Address" value="{{old('email')}}"/>
        </div>

        <div class="mb-4">
            <div class="input-group">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password"/>
                <div class="input-group-append">
                    <div class="input-group-text" id="togglePassword">Show</div>
                </div>
            </div>
        </div>
        
        <div class="mb-4">
            <p style="color:red">{{$errors->first()?? null}}</p>
        </div>
		
		<button type="submit" class="btn btn-primary btn-block form-control">Log in</button>
		
        <div class="text-center">
            <p>Don't have an account? <a href="/register">Register Now</a></p>
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
</script>
@endsection