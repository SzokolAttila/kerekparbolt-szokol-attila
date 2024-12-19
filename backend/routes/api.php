<?php

use App\Http\Controllers\BicycleController;
use App\Http\Controllers\ManufacturerController;
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

Route::get("/manufacturers", [ManufacturerController::class, "index"])->name("manufacturers.index");
Route::get("/manufacturers/{id}", [ManufacturerController::class, "show"])->name("manufacturers.show")->whereNumber("id");
Route::put("/manufacturers/{id}", [ManufacturerController::class, "update"])->name("manufacturers.update")->whereNumber("id");
Route::delete("/manufacturers/{id}", [ManufacturerController::class, "destroy"])->name("manufacturers.destroy")->whereNumber("id");
Route::post("/manufacturers", [ManufacturerController::class, "store"])->name("manufacturers.store");
