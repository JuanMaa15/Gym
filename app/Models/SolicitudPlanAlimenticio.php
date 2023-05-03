<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudPlanAlimenticio extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'solicitudes_planes_alimenticios';

    protected $fillable = [
        'cliente_id',
        'peso',
        'edad',
        'alergias',
        'objetivo',
        'asignado'
    ];

    public function clientes() {
        return $this->belongsTo('App\Models\Cliente', 'cliente_id');
    }
}
