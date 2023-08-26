<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    //para indicar que 1 categoria tiene muchas peliculas
    public function movies(){
        return $this->hasMany('App\Models\Movie');
    }
}
