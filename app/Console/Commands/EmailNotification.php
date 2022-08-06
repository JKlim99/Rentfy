<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Command;
use App\Models\InvoiceModel;
use App\Models\UserModel;
use App\Models\PropertyModel;
use \Carbon\Carbon;

class EmailNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:notice';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Email notification';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $invoices = InvoiceModel::where('next_payment_date', Carbon::now()->format('Y-m-d'))->get();
        for($i=0; $i<count($invoices); $i++){
            InvoiceModel::create([
                'property_id' => $invoices[$i]->property_id,
                'user_id' => $invoices[$i]->user_id,
                'amount' => $invoices[$i]->amount,
                'type' => 'rental',
                'next_payment_date' => Carbon::createFromFormat('Y-m-d', $invoices[$i]->next_payment_date)->addMonth(),
                'payment_date' => null,
                'rental_id' => $invoices[$i]->rental_id
            ]);
            $tenant = UserModel::find($invoices[$i]->user_id);
            $property = PropertyModel::find($invoices[$i]->property_id);

            $data = array('greet' => 'Hi '.$tenant->first_name.', ', 'messages' => 'Your next billing on "'.$property->name.'" is now available. ', 'uri' => '/bills');
            $to_email = $tenant->email;
            $mailSubject = "Rentfy | Rental Billing Notification";
            Mail::send('emails.mail', $data, function($message) use ($to_email, $mailSubject) {
                $message->to($to_email)
                        ->subject($mailSubject);
            });
        }
        $invoices = InvoiceModel::whereNull('payment_date')->where('created_at', '<', Carbon::now()->addDays(-14)->format('Y-m-d'))->get();
        for($i=0; $i<count($invoices); $i++){
            $tenant = UserModel::find($invoices[$i]->user_id);
            $property = PropertyModel::find($invoices[$i]->property_id);

            $data = array('greet' => 'Hi '.$tenant->first_name.', ', 'messages' => 'Your billing INV-'.$invoices[$i]->id.' on "'.$property->name.'" is overdue. Please make your payment as soon as possible. ', 'uri' => '/bills');
            $to_email = $tenant->email;
            $mailSubject = "Rentfy | Overdue Payment Notification";
            Mail::send('emails.mail', $data, function($message) use ($to_email, $mailSubject) {
                $message->to($to_email)
                        ->subject($mailSubject);
            });
        }
    }
}
