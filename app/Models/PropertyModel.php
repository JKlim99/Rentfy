<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyModel extends Model
{
    use HasFactory;
    protected $table = 'properties';

    protected $fillable = [
        'building_type',
        'area_size',
        'name',
        'address1',
        'address2',
        'address3',
        'city',
        'state',
        'postcode',
        'country',
        'description',
        'user_id',
        'image_url',
        'number_of_bedroom',
        'number_of_bathroom',
        'listing_status'
    ];
}
