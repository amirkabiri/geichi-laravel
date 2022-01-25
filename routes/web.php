<?php

use Illuminate\Support\Facades\Route;


Route::any('/', function (){
   return redirect()->route('shops.index');
});

Route::resource('shops', \App\Http\Controllers\ShopController::class);
Route::resource('shops.barbers', \App\Http\Controllers\BarberController::class);
