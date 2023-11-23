<?php

namespace App\Models;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Kanoa extends Model implements Authenticatable
{
    use HasFactory;
    protected $table = 'kanoas'; 
    protected $fillable = [
        'Email',
        'Prenom',
        'Nom',
        'Naissance',
        'password',
        'password_confirmation',
        'accept_term',
        'nombre',
        'photo',
        'image',
        'nom',
        'dates',
        'horaires',
        'message',
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
        'lieu'
    ];

    use AuthenticatableTrait;

 public function getAuthIdentifierName()
{
    return 'id'; // Le nom de la colonne qui sert d'identifiant
}

public function getAuthIdentifier()
{
    return $this->getKey(); // La valeur de l'identifiant, généralement l'ID
}

public function getAuthPassword()
{
    return $this->password; // Le nom de la colonne du mot de passe
}
}
    

 


