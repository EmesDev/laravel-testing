<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRecords extends Model
{
    protected $table = 'service_records';
    protected $primaryKey = 'id';
    protected $fillable = [
        'vehicle_id',
        'service_date',
        'service_description',
        'cost',
    ];
    use HasFactory;
}
