<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipamentoController;

Route::get('/', [EquipamentoController::class,'index']);

Route::resource('equipamentos', EquipamentoController::class);
