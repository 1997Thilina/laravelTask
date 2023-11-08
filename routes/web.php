<?php

use App\Http\Controllers\AddUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\SKUController;
use App\Http\Controllers\TerritoryController;
use App\Http\Controllers\ZoneController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get('/zone', [ZoneController::class, 'viewZone'])->name('view.zone');
Route::post('/zone/add', [ZoneController::class, 'storeZone'])->name('zone.store');

Route::get('/region', [RegionController::class, 'viewRegion'])->name('region');
Route::post('/region/add', [RegionController::class, 'storeRegion'])->name('region.store');

Route::get('/territory', [TerritoryController::class, 'viewTerritory'])->name('territory');
Route::post('/territory/add', [TerritoryController::class, 'storeTerritory'])->name('teritory.store');

Route::get('/sku', [SKUController::class, 'viewSku'])->name('view.sku');
Route::post('/sku/add', [SKUController::class, 'skuZone'])->name('sku.store');

Route::get('/addUser', [AddUserController::class, 'addUser'])->name('view.addUser');
Route::post('/addUser/add', [AddUserController::class, 'storeUser'])->name('addUser.store');

require __DIR__.'/auth.php';