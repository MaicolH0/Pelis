<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'quality',
        'image',
        'release_year',
        'reproduction_number',
        'language',
        'video_link',
        'download_link',
        'user_id',
        'category_id',
    ];

    //para indicar que 1 pelucula tiene 1 usuario
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    //para indicar que 1 pelicula tiene muchos usuarios
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
}
