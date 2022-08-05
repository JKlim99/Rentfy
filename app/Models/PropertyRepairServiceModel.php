<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RepairServiceModel;

class PropertyRepairServiceModel extends Model
{
    use HasFactory;
    protected $table = 'properties_repair_service';

    public function detail()
    {
        return $this->belongsTo(RepairServiceModel::class, 'repair_service_id');
    }
}
