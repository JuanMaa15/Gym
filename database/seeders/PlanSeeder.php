<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::insert([
            [
                'plan' => '1 Mes',
                'dias' => 30,
                'precio' => 70000,
                'descripcion' => 'Incluye varios servicios'
            ],

            [
                'plan' => '3 Meses',
                'dias' => 90,
                'precio' => 180000,
                'descripcion' => 'Incluye varios servicios'
            ]
        ]);
    }
}
