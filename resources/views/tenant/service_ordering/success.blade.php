@extends('tenant.public')
@section('title', '404 Not Found')
@section('content')
<div class="d-flex align-items-center justify-content-center vh-100">
    <div class="text-center">
        <h1 class="display-1 fw-bold">Quotation Submitted</h1>
        <p class="fs-3">You have successfully submit the service quotation</p>
        <p class="lead">
            We have redirect your quotation to the service provider, you will be contacted shortly by them.
          </p>
        <a href="/" class="btn btn-primary">Go Home</a>
    </div>
</div>
@endsection