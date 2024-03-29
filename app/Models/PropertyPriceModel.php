<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyPriceModel extends Model
{
    use HasFactory;
    protected $table = 'properties_price';

    public $timestamps = false;

    protected $fillable = [
        'property_id',
        'interval',
        'price'
    ];
}
