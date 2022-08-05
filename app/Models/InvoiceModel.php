<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PropertyModel;

class InvoiceModel extends Model
{
    use HasFactory;
    protected $table = 'invoice';

    protected $fillable = [
        'property_id',
        'user_id',
        'amount',
        'type',
        'next_payment_date',
        'payment_date',
        'rental_id'
    ];

    public function property()
    {
        return $this->belongsTo(PropertyModel::class, 'property_id');
    }
}
