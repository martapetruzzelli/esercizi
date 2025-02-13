<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $fillable = ['name', 'descripton', 'price','available'];
    public function ingredients(){
        return $this->belongsToMany(Ingredient::class)->withTimestamps();
    }
}
