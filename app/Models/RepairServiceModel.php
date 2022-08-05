<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepairServiceModel extends Model
{
    use HasFactory;
    protected $table = 'repair_service';

    protected $fillable = [
        'user_id',
        'service_name',
        'service_type',
        'contact_name',
        'contact_number',
        'website'
    ];
}
