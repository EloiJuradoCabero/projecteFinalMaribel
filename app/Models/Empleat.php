<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleat extends User
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_user',
        'isEmpleat' => 1
    ];

    protected $attributes =[
        'id_user',
        'isEmpleat' => 1
    ];
}
