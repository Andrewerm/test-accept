<?php

use App\Http\Controllers\UserSettings\UserSettingsController;
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
    return view('welcome');
});

// endpoint для приложений, требующих смену настроек пользователя
Route::post('/change-settings/{id}',[UserSettingsController::class,'edit'])->name('change');
// endpoint для сервисов подтверждения (Телеграмм, Email, SMS)
Route::post('/accept/{id}',[UserSettingsController::class,'accept'])->name('accept');
