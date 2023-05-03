<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialPlan extends Model
{
    use HasFactory;

    protected $table = 'historial_planes';

    public function planesAdquiridos() {
        return $this->belongsTo('App\Models\PlanAdquirido', 'plan_adquirido_id');
    }
}
