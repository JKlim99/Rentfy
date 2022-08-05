<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InvoiceModel;
use App\Models\PaymentModel;

use \Carbon\Carbon;

class Invoice extends Controller
{
    public function billingList()
    {
        $user_id = session('id');
        $invoices = InvoiceModel::where('user_id', $user_id)->get();

        return view('tenant.invoice.list')->with(['invoices' => $invoices]);
    }

    public function payBill($id)
    {
        $invoice = InvoiceModel::find($id);
        \Stripe\Stripe::setApiKey(env('stripe_secret_key'));

        $checkout_session = \Stripe\Checkout\Session::create([
            'success_url' => 'http://localhost:8000/success?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => 'http://localhost:8000/cancel',
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'myr',
                        'product_data' => [
                            'name' => 'INV-'.$invoice->id.' | '.$invoice->property->name,
                        ],
                        'unit_amount' => $invoice->amount*100,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'client_reference_id' => $invoice->id
        ]);

        return redirect($checkout_session->url);
    }

    public function success(Request $request)
    {
        $stripe_ref_id = $_GET['session_id'];
        \Stripe\Stripe::setApiKey(env('stripe_secret_key'));
        $session = \Stripe\Checkout\Session::retrieve($stripe_ref_id);
        $invoice_id = $session->client_reference_id;
        $amount = $session->amount_total /100;
        InvoiceModel::where('id', $invoice_id)->update(['payment_date'=>Carbon::now()]);
        PaymentModel::create([
            'invoice_id' => $invoice_id,
            'ref_id' => $stripe_ref_id,
            'amount' => $amount,
            'status' => 'success'
        ]);

        return view('tenant.invoice.success');
    }

    public function cancel()
    {
        return view('tenant.invoice.cancel');
    }
}
