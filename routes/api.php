<?php

use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\ComputoController;
use App\Http\Controllers\Admin\ConceptoController;
use App\Http\Controllers\Admin\ConfiguracionController;
use App\Http\Controllers\Admin\DeclaracionJuradaController;
use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\Admin\JurisdiccionController;
use App\Http\Controllers\Admin\OrganismoController;
use App\Http\Controllers\Admin\TipocodigoController;
use App\Http\Controllers\Admin\DeclaracionJuradaLinesController;
use App\Http\Controllers\Admin\EstadoController;
use App\Http\Controllers\Admin\LiquidacionController;
use App\Http\Controllers\Admin\OrigenController;
use App\Http\Controllers\Admin\PeriodoController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SubtipocodigoController;
use App\Http\Controllers\Admin\TipoLiquidacionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ItemController;
use Spatie\Permission\Models\Role;
use App\Models\Categoria;
use App\Models\Clase;
use App\Models\Concepto;
use App\Models\Configuracion;
use App\Models\DeclaracionJurada;
use App\Models\DeclaracionJuradaLines;
use App\Models\Jurisdiccion;
use App\Models\Liquidacion;
use App\Models\Organismo;
use App\Models\Origen;
use App\Models\Tipocodigo;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/tokens/create', function (Request $request) {

    //return $request;
    $token = User::find(1)->createToken($request->token_name);
    return ['token' => $token->plainTextToken];
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
    //return User::find(1)->tokenable;
});

Route::middleware('auth:sanctum')->group(function () {
    /** codigos */
    Route::get('/codigos', [TipocodigoController::class, 'getCodigos'])->name('codigos.get');
    Route::post('/codigos/search', [TipocodigoController::class, 'searchTipoCodigo'])->name('codigos.search');
    Route::post('/codigos/order-by', [TipocodigoController::class, 'orderTipoCodigo'])->name('codigos.order');

    /**subcodigos */
    Route::get('/subcodigos', [SubtipocodigoController::class, 'getSubcodigos'])->name('subcodigos.get');


    /** Files */
    Route::get('/files/{id}', [FileController::class, 'getFiles'])->name('files.get');
    Route::post('/files/create', [FileController::class, 'store'])->name('files.store');
    Route::post('/files/update/{id}', [FileController::class, 'update'])->name('files.update');
    Route::post('files/download', [FileController::class, 'download'])->name('files.download');
    Route::post('files/filter', [FileController::class, 'filter'])->name('files.filter');

    /**--- Declaraciones Juradas */
    Route::get('/declaraciones-juradas', [DeclaracionJuradaController::class, 'getDeclarcionesJuradas'])->name('ddjj.get');
    Route::post('/declaraciones-juradas/create', [DeclaracionJuradaController::class, 'store'])->name('ddjj.store');
    Route::put('/declaraciones-juradas/update/{id}', [DeclaracionJuradaController::class, 'update'])->name('ddjj.update');
    Route::get('/declaraciones-juradas/{id}', [DeclaracionJuradaController::class, 'show'])->name('ddjj.show');
    Route::post('/declaraciones-juradas/filter', [DeclaracionJuradaController::class, 'filter'])->name('ddjj.filter');

    /**--- Declaraciones Juradas Lines */
    Route::get('/declaraciones-juradas-lines/{id}', [DeclaracionJuradaLinesController::class, 'getDeclarcionesJuradasLines'])->name('ddjjLines.get');

    /**--- Organismos */
    Route::get('/organismos', [OrganismoController::class, 'getOrganismos'])->name('organismos.get');
    Route::put('/organismos/update/{id}', [OrganismoController::class, 'update'])->name('organismos.update');


    /**--- Jurisdicciones */
    Route::get('/jurisdicciones', [JurisdiccionController::class, 'getJurisdicciones'])->name('jurisdicciones.get');
    Route::put('/jurisdicciones/update/{id}', [JurisdiccionController::class, 'update'])->name('jurisdicciones.update');
    Route::post('/jurisdicciones/search', [JurisdiccionController::class, 'search'])->name('jurisdicciones.search');
    Route::post('/jurisdicciones/filter', [JurisdiccionController::class, 'filter'])->name('jurisdicciones.filter');

    /**--- Origenes */
    Route::middleware('auth:sanctum')->get('/origenes', [OrigenController::class, 'getOrigenes'])->name('origenes.get');
    Route::put('/origenes/update/{id}', [OrigenController::class, 'update'])->name('origenes.update');
    Route::post('/origenes/filter', [OrigenController::class, 'filter'])->name('origenes.filter');

    /**--- Tipo Liquidaciones */
    Route::get('/tipo-liquidaciones', [TipoLiquidacionController::class, 'getTipos'])->name('tipos.get');


    /**--- Liquidaciones */
    Route::get('/liquidaciones', [LiquidacionController::class, 'getLiquidaciones'])->name('liquidaciones.get');
    Route::post('/liquidaciones/filter', [LiquidacionController::class, 'filter'])->name('liquidaciones.filter');

    /**--- Users */
    Route::post('/users/filter', [UserController::class, 'filter'])->name('users.filter');
    Route::delete('/users/delete/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/users/notifications/{id}', [UserController::class, 'notifications'])->name('users.notifications');
    Route::post('/users/notifications/mark-as-read', [UserController::class, 'markAsRead'])->name('users.markAsRead');
    Route::get('/users/notifications/user/{id}', [UserController::class, 'notReadNotifications'])->name('users.notReadNotifications');
    /**--- Periodos */
    Route::get('/periodos', [PeriodoController::class, 'getPeriodos'])->name('periodos.get');
    Route::post('/periodos/create', [PeriodoController::class, 'store'])->name('periodos.store');
    Route::post('/periodos/filter', [PeriodoController::class, 'filter'])->name('periodos.filter');


    /**--- Roles */
    Route::get('/roles', [RoleController::class, 'getRoles'])->name('roles.get');

    /**--- Computos */
    Route::post('/computos/filter', [ComputoController::class, 'filter'])->name('computos.filter');


    /**--- Categorias */
    Route::put('/categorias/update/{id}', [CategoriaController::class, 'update'])->name('categorias.update');
    Route::post('/categorias/filter', [CategoriaController::class, 'filter'])->name('categorias.filter');

    /**--- Conceptos */
    Route::get('/conceptos', [ConceptoController::class, 'getConceptos'])->name('conceptos.get');

    /**--- Configuracion */
    Route::get('/configuraciones', [ConfiguracionController::class, 'getConfiguraciones'])->name('configuraciones.get');
    Route::put('/configuraciones/update/{id}', [ConfiguracionController::class, 'update'])->name('configuraciones.update');
    Route::get('/configuraciones/audit', [ConfiguracionController::class, 'getAudit'])->name('configuraciones.getAudit');

    
    
});
Route::get('/periodos', [PeriodoController::class, 'getPeriodos'])->name('periodos.get');
Route::post('/items/create', [ItemController::class, 'store'])->name('items.store');
Route::get('/estados', [EstadoController::class, 'getEstados'])->name('estados.get');




Route::get('/test', function (Request $request) {

    return User::find(1)->roles;
})->name('test');
