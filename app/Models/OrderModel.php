<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    use HasFactory;
    protected $table = 'orders';

    protected $fillable = [
        'service_id',
        'provider_id',
        'user_id',
        'address1',
        'address2',
        'address3',
        'city',
        'state',
        'postcode',
        'country',
        'type',
        'service_date',
        'service_time',
        'service_type',
        'service_provider',
        'user_first_name',
        'user_last_name',
        'user_phone_number',
        'user_email',
        'building_type',
        'area_size'
    ];
}
