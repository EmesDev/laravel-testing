<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $table = 'owners';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'cpf',
        'address',
        'phone',
        'email',
        'date'
    ];
    use HasFactory;
}
