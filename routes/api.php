<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnidadesController;
use App\Http\Controllers\ColaboradoresController; 
use App\Http\Controllers\CargosController; 


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/unidades',UnidadesController::class);


Route::apiResource('/colaboradores',ColaboradoresController::class);

Route::apiResource('/cargos', CargosController::class);
Route::get('/export/colaboradores', [ColaboradoresController::class, 'exportColaboradores']);
Route::get('/export/total-colaboradores-unidade', [ColaboradoresController::class, 'exportTotalColaboradoresUnidade']);
Route::get('/export/ranking-colaboradores', [ColaboradoresController::class, 'exportRankingColaboradores']);
