<?php

namespace Database\Seeders;

use App\Models\TipoPersonal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoPersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoPersonal::insert([
            ['tipo' => 'recepcion', 'rol_id' => 2],
            ['tipo' => 'personalizado', 'rol_id' => 1],
            ['tipo' => 'nutricion', 'rol_id' => 1]
        ]);
    }
}
