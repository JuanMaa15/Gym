<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hora extends Model
{
    use HasFactory;

    protected $table = 'personal';

    public function personal() {
        return $this->belongsTo('App\Models\Personal', 'personal_id');
    }
}
