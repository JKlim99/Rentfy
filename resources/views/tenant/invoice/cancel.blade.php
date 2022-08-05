@extends('tenant.public')
@section('title', 'Payment Cancelled')
@section('content')
<div class="d-flex align-items-center justify-content-center vh-100">
    <div class="text-center">
        <h1 class="display-1 fw-bold">Payment Cancelled</h1>
        <p class="fs-3">You have cancelled your payment</p>
        <p class="lead">
            You may go back to Billing and Payment page to make the payment again.
        </p>
        <a href="/bills" class="btn btn-primary">Billing and Payment</a>
    </div>
</div>
@endsection