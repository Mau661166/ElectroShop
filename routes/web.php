<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacturasController;
use App\Http\Controllers\EmpleadosController;

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

////////////FACTURAS/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

route::get('mensaje',[FacturasController::class,'mensaje']);
route::get('controlpago',[FacturasController::class,'pago']);
route::get('nomina/{diast}/{pago}',[FacturasController::class,'nomina']);

route::get('muestrasaludo',[FacturasController::class,'saludo']);

route::get('admin',[FacturasController::class,'index']);

route::get('altafactura',[FacturasController::class,'altafactura'])->name('altafactura');

route::post('guardarfactura',[FacturasController::class,'guardarfactura'])->name('guardarfactura');

route::get('reportefactura',[FacturasController::class,'reportefactura'])->name('reportefactura');

route::get('desactivafactura/{idf}',[FacturasController::class,'desactivafactura'])->name('desactivafactura');

route::get('activafactura/{idf}',[FacturasController::class,'activafactura'])->name('activafactura');

route::get('borrafactura/{idf}',[FacturasController::class,'borrafactura'])->name('borrafactura');


route::get('modificafactura/{idf}',[FacturasController::class,'modificafactura'])->name('modificafactura');

route::post('guardacambios',[FacturasController::class,'guardacambios'])->name('guardacambios');

//////EMPLEADOS/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
route::get('altaempleado',[EmpleadosController::class,'altaempleado'])->name('altaempleado');

route::post('guardarempleado',[EmpleadosController::class,'guardarempleado'])->name('guardarempleado');

route::get('reporteempleado',[EmpleadosController::class,'reporteempleado'])->name('reporteempleado');

route::get('desactivaempleado/{idem}',[EmpleadosController::class,'desactivaempleado'])->name('desactivaempleado');

route::get('activaempleado/{idem}',[EmpleadosController::class,'activaempleado'])->name('activaempleado');

route::get('borraempleado/{idem}',[EmpleadosController::class,'borraempleado'])->name('borraempleado');


route::get('modificaempleado/{idem}',[EmpleadosController::class,'modificaempleado'])->name('modificaempleado');

route::post('guardarcambios',[EmpleadosController::class,'guardarcambios'])->name('guardarcambios');


route::get('pruebaempleado/{idem}',[EmpleadosController::class,'pruebaempleado'])->name('pruebaempleado');

route::post('guardarecambios',[EmpleadosController::class,'guardarecambios'])->name('guardarecambios');
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

route::get('eloquent',[FacturasController::class,'eloquent'])->name('eloquent');

Route::get('/', function () {
    return view('welcome');
});







































