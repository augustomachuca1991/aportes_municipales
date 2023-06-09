<?php

use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\ComputoController;
use App\Http\Controllers\Admin\ConfiguracionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\TipocodigoController;
use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\Admin\DeclaracionJuradaController;
use App\Http\Controllers\Admin\OrganismoController;
use App\Http\Controllers\Admin\JurisdiccionController;
use App\Http\Controllers\Admin\OrigenController;
use App\Http\Controllers\Admin\LiquidacionController;
use App\Http\Controllers\Admin\PeriodoController;
use App\Http\Controllers\Admin\UserController;

Route::middleware(['auth', 'role:admin', 'admin'])->group(function () {

    /** Controlador Dashboard Admin */
    Route::get('/', [HomeController::class, 'index'])->name('admin');

    /** Controlador Tipo Codigos */
    Route::get('/codigos', [TipocodigoController::class, 'index'])->name('codigos.index');

    /** Controlador Importar Archivo */
    Route::get('/files', [FileController::class, 'index'])->name('files.index');
    
    /** Controlador Declaraciones Juradas */
    Route::get('/declaraciones-juradas', [DeclaracionJuradaController::class, 'index'])->name('ddjj.index');
    
    /** Controlador Organismos */
    Route::get('/organismos', [OrganismoController::class, 'index'])->name('organismos.index');
    
    /** Controlador jurisdicciones */
    Route::get('/jurisdicciones', [JurisdiccionController::class, 'index'])->name('jurisdicciones.index');

    /** Controlador jurisdicciones */
    Route::get('/origenes', [OrigenController::class, 'index'])->name('origenes.index');
    
    /** Controlador Liquidaciones */
    Route::get('/liquidaciones', [LiquidacionController::class, 'index'])->name('liquidaciones.index');

    /** Controlador Users */
    Route::get('/users', [UserController::class, 'index'])->name('users.index');

    /** Controlador Periodos */
    Route::get('/periodos', [PeriodoController::class, 'index'])->name('periodos.index');

    /** Controlador Computos */
    Route::get('/computos', [ComputoController::class, 'index'])->name('computos.index');

    /** Controlador Categorias */
    Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');

    /** Controlador Configuración */
    Route::get('/configuraciones', [ConfiguracionController::class, 'index'])->name('configuraciones.index');

    /** Controlador Configuración */
    Route::get('/configuraciones/auditoria', [ConfiguracionController::class, 'audit'])->name('configuraciones.auditoria');
});
