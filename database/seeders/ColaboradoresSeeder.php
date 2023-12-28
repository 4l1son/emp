<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColaboradoresSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Colaborador::factory()->count(100)->create();
    }
}
