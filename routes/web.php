<?php

use App\Http\Controllers\BalanceGeneralController;
use App\Http\Controllers\CuentaController;
use App\Http\Controllers\CuentaPeriodoController;
use App\Http\Controllers\CuentaSistemaController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EstadoResultadoController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\GeneralRController;
use Illuminate\Support\Facades\Route;

//Agregamos controladores
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VinculacionController;
use App\Models\balance_general;
use App\Models\cuenta_sistema;
use App\Models\vinculacion;
use Spatie\Permission\Contracts\Role;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// * Periodo
Route::get('/periodo_guardar', [PeriodoController::class, 'guardar'])->name('periodo.guardar');

Route::get('/balance_general/crear/{periodo_id}', [BalanceGeneralController::class, 'crear']);

// * Vinculacion
Route::get('vinculacion/guardar', [VinculacionController::class, 'guardar'])->name('vinculacion.guardar');

Route::get('balance/guardar', [CuentaPeriodoController::class, 'guardar'])->name('balance.guardar');

// * Analisis horizontal
Route::get('/analisis_h_i', [GeneralController::class, 'analisis_horizontal_index'])->name('horizontal.index');
Route::post('/analisis_h', [GeneralController::class, 'analisis_horizontal'])->name('horizontal');

// * Analisis vertical
Route::get('/analisis_v_i', [GeneralController::class, 'analisis_vertical_index'])->name('vertical.index');
Route::post('/analisis_v', [GeneralController::class, 'analisis_vertical'])->name('vertical');

// * Descargar plantilla catalogo
Route::get('download/excel',[CuentaController::class,'descargarExcel'])->name('catalogo.download');

// * Cargar plantilla catalogo
Route::post('carga/excel',[CuentaController::class,'cargarExcel'])->name('upload');

// * Confirmar catalogo
Route::post('catalogo/confirmar',[CuentaController::class,'confirmarCatalogo'])->name('catalogo.confirmar');


// * Ratios
Route::get('/ratios', [GeneralRController::class, 'ratios_empresa'])->name('ratios.index');
Route::get('/ratios/comparacion', [GeneralRController::class, 'comparacion'])->name('ratios.comparacion');

// * Estado de resultado
Route::get('/estado_de_resultado/{periodo_id}', [EstadoResultadoController::class, 'crear'])->name('estado.crear');

// * Prueba
// Route::get('/prueba', [GeneralRController::class, 'ratios_empresa']);

//graficos
Route::get('/graficos_index', [CuentaController::class, 'graficos'])->name('graficos.index');
Route::get('/grafico_de_cuenta/{id}', [\App\Http\Controllers\CuentaController::class, 'graficoDeCuenta'])->name('graficoDeCuenta');

Route::group(['middleware'=>['auth']], function(){
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('empresa', EmpresaController::class);
    Route::resource('catalogo', CuentaController::class);
    Route::resource('cuenta_sistema', CuentaSistemaController::class);
    Route::resource('vinculacion', VinculacionController::class);
    Route::resource('periodo',PeriodoController::class);
    Route::resource('sector', SectorController::class);
    Route::resource('balance_general', BalanceGeneralController::class);
    Route::resource('cuenta_periodo', CuentaPeriodoController::class);
    Route::resource('estado', EstadoResultadoController::class);
});