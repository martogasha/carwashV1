<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
Route::post('Login', [AuthController::class, 'login'])->name('Login');
Route::get('cars', [IndexController::class, 'cars']);
Route::get('washers', [IndexController::class, 'washers']);
Route::get('users', [IndexController::class, 'users']);
Route::get('deleteUser', [IndexController::class, 'deleteUser']);
Route::get('editUser/{id}', [IndexController::class, 'editUser']);
Route::get('addUsers', [IndexController::class, 'addUsers']);
Route::get('payments', [IndexController::class, 'payments']);
Route::get('washerDetail/{id}', [IndexController::class, 'washerDetail']);
Route::get('charges', [IndexController::class, 'charges']);
Route::get('filterDate', [IndexController::class, 'filterDate']);
Route::get('filterD', [IndexController::class, 'filterD']);
Route::get('profile', [IndexController::class, 'profile']);
Route::get('filterWasher', [IndexController::class, 'filterWasher']);
Route::get('payCar', [IndexController::class, 'payCar']);
Route::get('editCharge', [IndexController::class, 'editCharge']);
Route::get('deleteWasher', [IndexController::class, 'deleteWasher']);
Route::get('deleteCarlist', [IndexController::class, 'deleteCarlist']);
Route::get('editRate', [IndexController::class, 'editRate']);
Route::get('editWasher', [IndexController::class, 'editWasher']);
Route::get('getAmount', [IndexController::class, 'getAmount']);
Route::get('getWasher', [IndexController::class, 'getWasher']);
Route::get('getName', [IndexController::class, 'getName']);
Route::post('addWashers', [IndexController::class, 'addWashers']);
Route::post('addCar', [IndexController::class, 'addCar']);
Route::post('eWashers', [IndexController::class, 'eWashers']);
Route::post('eRate', [IndexController::class, 'eRate']);
Route::post('eCharge', [IndexController::class, 'eCharge']);
Route::post('addCharge', [IndexController::class, 'addCharge']);
Route::post('pCar', [IndexController::class, 'pCar']);
Route::post('storeUser', [IndexController::class, 'storeUser']);
Route::post('editUsers', [IndexController::class, 'editUsers']);
Route::post('deleteUser', [IndexController::class, 'deleteU']);
Route::post('deleteCar', [IndexController::class, 'deleteCar']);
Route::post('dWashers', [IndexController::class, 'dWashers']);
Route::post('updateProfile', [IndexController::class, 'updateProfile']);
