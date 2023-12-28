<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CargoColaboradorSeeder extends Seeder
{
    public function run()
    {
        \App\Models\CargoColaborador::factory()->count(100)->create();
    }
}
