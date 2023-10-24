<?php

use App\Http\Controllers\ColaboradorController;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\UnidadeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/unidades', [UnidadeController::class, 'list']);
Route::get('/unidades/create', [UnidadeController::class, 'create'])->name('unidades.create');
Route::post('/unidades', [UnidadeController::class, 'store'])->name('unidades.store');

Route::get('/colaboradores', [ColaboradorController::class, 'list']);
Route::get('/colaboradores/create', [ColaboradorController::class, 'create'])->name('colaboradores.create');
Route::post('/colaboradores', [ColaboradorController::class, 'store'])->name('colaboradores.store');
Route::put('/colaboradores/{colaborador}', [ColaboradorController::class, 'atualizarNota'])->name('atualizarNota');

Route::get('/relatorios', function () {
    return view('relatorios.dashboard');
})->name('relatorios');

Route::get('/relatorio/colaboradores', [ColaboradorController::class, 'relatorioColaboradores'])->name('relatorio.colaboradores');
Route::get('/relatorio/total_colaboradores_por_unidade', [UnidadeController::class, 'relatorioTotalColaboradoresPorUnidade'])->name('relatorio.total_colaboradores_por_unidade');
Route::get('/relatorio/ranking_melhores_avaliados', [ColaboradorController::class, 'relatorioRankingMelhoresAvaliados'])->name('relatorio.ranking_melhores_avaliados');