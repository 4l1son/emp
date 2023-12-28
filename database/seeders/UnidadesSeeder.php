<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnidadesSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Unidade::factory()->count(100)->create();
    }
}
