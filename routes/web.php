<?php

use App\Http\Controllers\CasalController;
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
    return redirect()->route('casal.index');
});

//Casal Routes
Route::get('/casals', [CasalController::class, "index"])->name("casal.index");

Route::get('/casals/create', [CasalController::class, "create"])->name("casal.create");

Route::post('/casals/store', [CasalController::class, "store"])->name("casal.store");

Route::get('/casals/{id}', [CasalController::class, "show"])->name("casal.show");

Route::get('/casals/edit/{id}', [CasalController::class, "edit"])->name("casal.edit");

Route::post('/casals/update/{id}', [CasalController::class, "update"])->name("casal.update");

Route::post('/casals/destroy/{id}', [CasalController::class, "destroy"])->name("casal.destroy");