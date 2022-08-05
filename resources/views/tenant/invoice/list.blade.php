@extends('tenant.public')
@section('title', 'Billing and Payment')
@section('content')

<section class="main container" id="dashboard">
    <div>
        <div class="text-center">
            <h2 class="mb-3">Billing and Payment</h2>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
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
                                    <td>@if($invoice->payment_date) PAID @else <a href="/pay/{{$invoice->id}}">PAY NOW</a>@endif</td>
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