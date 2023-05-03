<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanAlimenticio extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'planes_alimenticios';

    protected $fillable = [
        'personal_id',
        'solicitud_plan_alimenticio_id',
        'fecha_inicio',
        'fecha_fin',
        'descripcion',
        'estado_id'
    ];

    public function personal() {
        return $this->belongsTo('App\Models\personal', 'personal_id');
    }

    public function solicitudesPlanesAlimenticios() {
        return $this->belongsTo('App\Models\SolicitudPlanAlimenticio', 'solicitud_plan_alimenticio_id');
    }
}
