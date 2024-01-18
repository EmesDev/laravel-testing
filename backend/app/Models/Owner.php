<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Owner extends Model
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $table = 'owners';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'cpf',
        'address',
        'phone',
        'email',
        'password',
        'date'
    ];
    use HasFactory;
}
