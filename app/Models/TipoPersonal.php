<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPersonal extends Model
{
    use HasFactory;

    protected $table = 'tipos_personal';

    public function roles() {
        return $this->belongsTo('App\Models\Rol', 'rol_id');
    }

    public const recepcion = 1;
    public const personalizado = 2;
    public const nutricion = 3; 
}
