<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    // add Owner_id; Name; CPF; Address; Phone; Email; Date_of_Birth; to fillable
    protected $fillable = [
        'Owner_id',
        'Name',
        'CPF',
        'Address',
        'Phone',
        'Email',
        'Date_of_Birth',
    ];
}
