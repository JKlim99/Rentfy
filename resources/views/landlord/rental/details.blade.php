@extends('tenant.public')
@section('title', 'Dashboard')
@section('content')

<section class="main container" id="dashboard">
    <div>
        <div class="text-center">
            <h2>Rental Details</h2>
            <h5 class="text-muted mb-3">Hi {{ucfirst($user->first_name)}}</h5>
        </div>
        <div class="d-flex justify-content-center mb-4">
            <a type="button" class="btn btn-outline-primary ms-1" href="/dashboard">Dashboard</a>
            <a type="button" class="btn btn-outline-primary ms-1" href="/manage/property">Manage Properties</a>
            <a type="button" class="btn btn-outline-primary ms-1" href="/manage/service">Manage Repair Services</a>
            <a type="button" class="btn btn-primary ms-1" href="/rental">View Rental</a>
        </div>
        <div class="mb-4">
            <a onclick="history.back()" class="button">Back</a>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        Rental #{{$rental->id}}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Tenant Name</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ucfirst($rental->first_name).' '.ucfirst($rental->last_name)}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Property Name</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ucfirst($rental->name)}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Rental Option</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{$rental->interval}} month(s) - RM {{$rental->pay_amount}}/month</p>
                            </div>
                        </div>
                        <hr>
                        <form method="POST" action="/acceptrental/{{$rental->id}}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Start Date</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><input type="date" class="form-control" name="started_at" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}" required @if($rental->status != 'pending') disabled @endif/></p>
                                </div>
                            </div>
                            @if($rental->status == 'pending')
                            <hr>
                            <div class="text-center">
                                <input type="submit" class="btn btn-primary" value="Accept"/>
                                <a class="btn btn-danger" href="/rejectrental/{{$rental->id}}">Reject</a>
                            </div>
                            @elseif($rental->status == 'renting')
                            <hr>
                            <div class="text-center">
                                <a class="btn btn-danger" href="/terminaterental/{{$rental->id}}">Terminate</a>
                            </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        Billing and Payment
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Invoice</th>
                                    <th scope="col">Property</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Issue Date</th>
                                    <th scope="col">Paid On</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($invoices as $invoice)
                                <tr>
                                    <td>INV-{{$invoice->id}}</td>
                                    <td>{{$invoice->property->name}}</td>
                                    <td>RM {{$invoice->amount}}</td>
                                    <td>@if($invoice->payment_date) PAID @else NOT PAID @endif</td>
                                    <td>{{\Carbon\Carbon::parse($invoice->created_at)->format('d M Y')}}</td>
                                    @if($invoice->payment_date)
                                    <td>{{\Carbon\Carbon::parse($invoice->payment_date)->format('d M Y')}}</td>
                                    @else
                                    <td>-</td>
                                    @endif
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