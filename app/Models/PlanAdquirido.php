<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanAdquirido extends Model
{
    use HasFactory;

    protected $table = 'planes_adquiridos';

    public $timestamps = false;

    protected $fillable = [
        'cliente_id',
        'plan_id',
        'fecha_inicio',
        'fecha_fin',
        'estado_id',
    ];

    public function clientes() {
        return $this->belongsTo('App\Models\Cliente', 'cliente_id');
    }

    public function planes() {
        return $this->belongsTo('App\Models\Plan', 'plan_id');
    }

    public function estados() {
        return $this->belongsTo('App\Models\Estado', 'estado_id');
    }
}
