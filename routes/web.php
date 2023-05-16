<?php

use App\Models\Categorey;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\frontend\MenuController as FrontendMenuController;
use App\Http\Controllers\frontend\CategoryController as FrontendCategoryController;
use App\Http\Controllers\frontend\ReservationController as FrontendReservationController;
use App\Http\Controllers\frontend\WelcomeController;

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

Route::get('/',[WelcomeController::class , 'index']);
//frontend routes
Route::get('/categorie' ,[FrontendCategoryController::class , 'index'] )->name('categorie.index');
Route::get('/categorie/{category}' ,[FrontendCategoryController::class , 'show'] )->name('categories.show');
Route::get('/menu' , [FrontendMenuController::class ,'index'] )->name('menu.index');
Route::get('/reservations/step-one' ,[FrontendReservationController::class , 'stepOne'] )->name('reservations.step.one');
Route::post('/reservations/step-one' ,[FrontendReservationController::class , 'storeStepOne'] )->name('reservations.store.step.one');
Route::get('/reservations/step-tow' ,[FrontendReservationController::class , 'stepTow'] )->name('reservations.step.tow');
Route::post('/reservations/step-tow' ,[FrontendReservationController::class , 'storeStepTow'] )->name('reservations.store.step.tow');
Route::get('/thanks',[WelcomeController::class , 'thanks'])->name('thanks');



//////////////////

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth','admin'])->name('admin.')->prefix('admin')->group(function(){

Route::get('/',[AdminController::class,'index'])->name('index');
Route::resource('/menu' ,MenuController::class);
Route::resource('/categories' ,CategoryController::class);
Route::resource('/tables',TableController::class);
Route::resource('/reservation' ,ReservationController::class);

});

require __DIR__.'/auth.php';
