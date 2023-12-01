<?php

use App\Http\Controllers\AddUserController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DefineFreeController;
use App\Http\Controllers\DiscountDefineController;
use App\Http\Controllers\PlaceFreeOrderController;
use App\Http\Controllers\POrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\SKUController;
use App\Http\Controllers\TerritoryController;
use App\Http\Controllers\ZoneController;
use App\Models\DiscountDefine;
use App\Models\PlaceFreeOrder;
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


Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('/zone', [ZoneController::class, 'viewZone'])->name('view.zone');
    Route::post('/zone/add', [ZoneController::class, 'storeZone'])->name('zone.store');

    Route::get('/region', [RegionController::class, 'viewRegion'])->name('region');
    Route::post('/region/add', [RegionController::class, 'storeRegion'])->name('region.store');

    Route::get('/territory', [TerritoryController::class, 'viewTerritory'])->name('territory');
    Route::post('/territory/add', [TerritoryController::class, 'storeTerritory'])->name('territory.store');

    Route::get('/sku', [SKUController::class, 'viewSku'])->name('view.sku');
    Route::post('/sku/add', [SKUController::class, 'skustore'])->name('sku.store');

    Route::get('/addUser', [AddUserController::class, 'addUser'])->name('view.addUser');
    Route::post('/addUser', [RegisteredUserController::class, 'storeDistributor'])->name('addUser.store');

    Route::get('/dashboard/admin', [AddUserController::class, 'adminDashboard'])->name('view.admin');

    Route::get('/defineFreeIssues', [DefineFreeController::class, 'viewDefineFree'])->name('view.defineFree');
    Route::post('/defineFreeIssues/add', [DefineFreeController::class, 'addDefineFree'])->name('DefineFree.store');

    Route::get('/defineDiscount', [DiscountDefineController::class, 'viewDiscountDefine'])->name('view.defineDiscount');
    Route::post('/defineDiscount/add', [DiscountDefineController::class, 'addDiscount'])->name('defineDiscount.store');
    

    Route::get('/viewOder', [POrderController::class, 'viewOrder'])->name('order.view');


});

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/addOder', [POrderController::class, 'createOrder'])->name('order.add');
    Route::post('/addOrder/add', [POrderController::class, 'storeOrder'])->name('purchase.order.store');
    Route::get('/viewOder', [POrderController::class, 'viewOrder'])->name('order.view');

    Route::get('/viewOderDetails', [POrderController::class, 'viewOrderDetails'])->name('orderDetais.view');

    Route::post('/addFreeOrder/add', [PlaceFreeOrderController::class, 'storeFreeOrder'])->name('freeOrder.store');
    Route::get('/viewFreeOder', [PlaceFreeOrderController::class, 'ViewcreateOrderFree'])->name('freeOrder.view');

    Route::get('/download/orderDetails', [POrderController::class, 'downloadOrderDetails'])->name('orderDetails.download');



    
});

