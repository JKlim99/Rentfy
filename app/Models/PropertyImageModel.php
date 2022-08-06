<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyImageModel extends Model
{
    use HasFactory;
    protected $table = 'properties_image';

    public $timestamps = false;

    protected $fillable = [
        'property_id',
        'image_url'
    ];
}
