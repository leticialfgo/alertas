<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EquipamentoController;

Route::get('/ips', [EquipamentoController::class,'ips']);
Route::post('/ping', [EquipamentoController::class,'ping']);
