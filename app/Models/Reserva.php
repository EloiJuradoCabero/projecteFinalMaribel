<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'id',
        'id_joc',
        'id_user',
        'id_empleat',
        'telefon',
        'day',
        'hour',
        'pais',
        'organitzacio',
        'isConfirmed'

    ];

    protected $attributes =[
        'id_joc',
        'id_user',
        'telefon',
        'pais',
        'organitzacio'
    ];

}
