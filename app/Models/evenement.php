<?php

namespace App\Models;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class evenement extends Model 
{
    use HasFactory;
    protected $table = 'evenement'; 
    protected $fillable = [
        'image',
        'nom',
        'prix',
        'lieu',
        'jourDebut',
        'moisDebut',
        'jourFin',
        'moisFin',
        'heuresDebut',
        'minutesDebut',
        'heuresFin',
        'minutesFin',
        'Devise',
    ];

}