<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntrenamientoPersonalizado extends Model
{
    protected $table = 'entrenamientos_personalizados';

    public $timestamps = false;

    protected $fillable = [
        'cliente_id',
        'fecha',
        'hora_id',
        'incapacidades',
        'descripcion'
    ];

    public function clientes() {
        return $this->belongsTo('App\Models\Cliente', 'cliente_id');
    }

    public function horas() {
        return $this->belongsTo('App\Models\Hora', 'hora_id');
    }
}
