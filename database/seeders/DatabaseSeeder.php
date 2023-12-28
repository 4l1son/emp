<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Seed para a tabela 'unidades'
        $unidades = [];
        for ($i = 1; $i <= 100; $i++) {
            $unidades[] = [
                'nome_fantasia' => "Unidade $i",
                'razao_social' => "Empresa $i",
                'cnpj' => $faker->unique()->numerify('123456789012##'),
            ];
        }
        DB::table('unidades')->insertOrIgnore($unidades);

        // Seed para a tabela 'cargos'
        $cargos = [];
        for ($i = 1; $i <= 10; $i++) {
            $cargos[] = [
                'cargo' => "Cargo $i",
            ];
        }
        DB::table('cargos')->insertOrIgnore($cargos);

        // Seed para a tabela 'colaboradores'
        $colaboradores = [];
        for ($i = 1; $i <= 100; $i++) {
            $colaboradores[] = [
                'unidade_id' => $faker->numberBetween(1, 100),
                'nome' => "Colaborador $i",
                'cpf' => $faker->unique()->numerify('###########'),
                'email' => "colaborador_$i@example.com",
            ];
        }
        DB::table('colaboradores')->insertOrIgnore($colaboradores);

        // Seed para a tabela 'cargo_colaborador'
        $cargoColaborador = [];
        for ($i = 1; $i <= 100; $i++) {
            $cargoColaborador[] = [
                'cargo_id' => $faker->numberBetween(1, 10),
                'colaborador_id' => $i,
                'nota_desempenho' => $faker->numberBetween(0, 10),
            ];
        }
        DB::table('cargo_colaborador')->insertOrIgnore($cargoColaborador);
    }
}
