<?php

use App\Http\Controllers\BicycleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("/bicycles", [BicycleController::class, "index"])->name("bicycles.index");
Route::get("/bicycles/{id}", [BicycleController::class, "show"])->name("bicycles.show")->whereNumber("id");
Route::delete("/bicycles/{id}", [BicycleController::class, "destroy"])->name("bicycles.destroy")->whereNumber("id");
Route::put("/bicycles/{id}", [BicycleController::class, "update"])->name("bicycles.update")->whereNumber("id");
Route::post("/bicycles", [BicycleController::class, "store"])->name("bicycles.store");