<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table = 'vehicles';
    protected $primaryKey = 'id';
    protected $fillable = [
        'owner_id',
        'brand',
        'model',
        'year',
        'plate',
        'color',
        'chassis',
    ];
    use HasFactory;
}
