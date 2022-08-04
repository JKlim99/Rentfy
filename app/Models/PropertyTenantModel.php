<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyTenantModel extends Model
{
    use HasFactory;
    protected $table = 'properties_tenant';

    protected $fillable = [
        'property_id',
        'user_id',
        'price_id',
        'interval',
        'pay_amount',
        'started_at',
        'end_at',
        'status',
    ];
}
