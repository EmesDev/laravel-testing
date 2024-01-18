<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Called extends Model
{
    protected $table = 'called';
    protected $primaryKey = 'id';
    protected $fillable = [
        'owner_id',
        'title',
        'description',
    ];
    use HasFactory;
}
