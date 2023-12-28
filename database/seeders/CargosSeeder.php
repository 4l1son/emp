<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CargosSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Cargo::factory()->count(10)->create();
    }
}
