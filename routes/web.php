<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/home/export', [App\Http\Controllers\HomeController::class, 'export'])->name('export');

Route::get('/test', function (Request $request) {



    // $total = Liquidacion::whereHas('declaracionjurada', function ($ddjj) {
    //     $ddjj->whereHas('organismo', function ($organismo) {
    //         $organismo->where('id', 1);
    //     });
    // })->select(
    //     DB::raw('SUM(bruto) as total_bruto'),
    //     DB::raw('SUM(basico) as total_basico'),
    //     DB::raw('SUM(antiguedad) as total_antiguedad'),
    //     DB::raw('SUM(aporte_personal) as total_aporte_personal'),
    //     DB::raw('SUM(haberes_con_aporte) as total_haberes_con_aporte'),
    //     DB::raw('SUM(remunerativo) as total_remunerativo'),
    //     DB::raw('SUM(bonificable) as total_bonificable'),
    //     DB::raw('SUM(no_bonificable) as total_no_bonificable'),
    //     DB::raw('SUM(no_remunerativo) as total_no_remunerativo'),
    //     DB::raw('SUM(adicionales) as total_adicionales'),
    //     DB::raw('SUM(familiar) as total_familiar'),
    //     DB::raw('SUM(descuento) as total_descuento'),
    // )
    //     ->groupByRaw('bruto , basico, antiguedad, aporte_personal, haberes_con_aporte, remunerativo, bonificable , no_bonificable, no_remunerativo, adicionales, familiar, descuento')->first();

    // $computos = Liquidacion::whereHas('declaracionjurada', function ($ddjj) {
    //     $ddjj->whereHas('organismo', function ($organismo) {
    //         $organismo->where('id', 1);
    //     });
    // })->get();

    // return response()->json(['total' => $total, 'computos' => $computos]);

    // $cod_organismo = 1;
    // $existConcepto = Concepto::whereHas('organismos', function ($organismos) use ($cod_organismo) {
    //     $organismos->where('organismos.codigo', $cod_organismo);
    // })->where('codigo', $value['codigo']);

    // return $existConcepto;

    // $origen = Origen::find(1);
    // foreach ($origen->jurisdicciones as $jurisdiccion) {
    //     foreach ($jurisdiccion->organismos as $organismo) {
    //         foreach ($organismo->declaracionesjuradas as $ddjj) {
    //             foreach ($ddjj->liquidaciones as $liquidacion) {
    //                 foreach ($liquidacion->agentes as $agente) {
    //                     echo $agente;
    //                 }
    //             }
    //         }
    //     }
    // }

    //return request()->routeIs('test');

    return User::find(1)->roles;


})->name('test');
