<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    use HasFactory;

    protected $table = 'publicaciones';

    protected $fillable = [
        'descripcion',
        'imagen',
        'personal_id'
    ];

    public function personal() {
        return $this->belongsTo('App\Models\Personal', 'personal_id');
    }
}
