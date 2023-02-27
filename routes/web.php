<?php

use App\Http\Controllers\BbsController;
use App\Http\Controllers\RubricsController;
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

Route::get('/', [BbsController::class,"index"]
)->name("index");


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get("/home/create", [App\Http\Controllers\HomeController::class, 'create'])->name("bb-create");
Route::post("/home", [App\Http\Controllers\HomeController::class, "store"])->name("bb.store");
Route::get("home/{bb}/edit", [App\Http\Controllers\HomeController::class, "edit"])->name("bb.edit")->middleware("can:update,bb")->whereNumber("bb");
Route::post("home/{bb}", [App\Http\Controllers\HomeController::class, "update"])->name("bb.update")->middleware("can:update,bb")->whereNumber("bb");
Route::get("home/{bb}/delete", [App\Http\Controllers\HomeController::class, "delete"])->name("bb.delete")->middleware("can:destroy,bb")->where("bb","[0-9]+");
Route::delete("home/{bb}", [App\Http\Controllers\HomeController::class, "destroy"])->name("bb.destroy")->middleware("can:destroy,bb")->where("bb","[0-9]+");

Route::get("/rubrics",[RubricsController::class,"index"])->name("rubrics_index");
Route::get("/rubrics/{parentRubric}",[RubricsController::class,"show"])->name("rubrics_show");

Route::fallback([BbsController::class, "index"]);


Route::get("/{bb}", [BbsController::class, "detail"])->name("detail");

