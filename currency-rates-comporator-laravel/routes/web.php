<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurrencyRateController;

Route::get('/', [CurrencyRateController::class, 'setMinCurrencyArray']);