<?php

use App\Http\Controllers\BbsController;
use App\Http\Controllers\RubricsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessagesController;

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

Route::controller(App\Http\Controllers\HomeController::class)->group(function () {
    Route::get('/home', 'index')->name('home');
    Route::name("bb.")->group(function () {
        Route::get("/home/create",  'create')->name("create");
        Route::post("/home",  "store")->name("store");
        Route::middleware("can:update,bb")->group(function(){
            Route::get("home/{bb}/edit",  "edit")->name("edit")->whereNumber("bb");
            Route::post("home/{bb}",  "update")->name("update")->whereNumber("bb");

        });
        Route::middleware("can:destroy,bb")->group(function () {
            Route::get("home/{bb}/delete", "delete")->name("delete")->where("bb","[0-9]+");
            Route::delete("home/{bb}",  "destroy")->name("destroy")->where("bb","[0-9]+");
        });
    });
});

Route::controller(MessagesController::class)->name("message.")->prefix("message")->group(function (){
    Route::get("/create/{user}", "create")->name("create");
    Route::post("/send", "send")->name("send");
    Route::get("/show","show")->name("show");
});



Route::get("/rubrics",[RubricsController::class,"index"])->name("rubrics_index");
Route::get("/rubrics/{rubric}/bbs", [RubricsController::class, "showBbs"])->name("rubric_show_bbs");
Route::get("/rubrics/{parentRubric}",[RubricsController::class,"show"])->name("rubrics_show");


Route::fallback([BbsController::class, "index"]);


Route::get("/{bb}", [BbsController::class, "detail"])->name("detail");

