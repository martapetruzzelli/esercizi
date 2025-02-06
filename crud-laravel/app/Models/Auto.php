<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    protected $fillable = ['marca', 'modello', 'prezzo'];
}
