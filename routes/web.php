<?php
use App\Http\Controllers\ProcessController;
use App\Http\Controllers\TimesheetController;
use App\Http\Controllers\FeesController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DashboardController;
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// });
require __DIR__.'/auth.php';
Route::get('process/create',[ProcessController::class,'create'])->name('process.create');
Route::post('process/store',[ProcessController::class,'store'])->name('process.store');
Route::get('process/index',[ProcessController::class,'index'])->name('process.index');
Route::get('process/edit/{id}',[ProcessController::class,'edit'])->name('process.edit');
Route::post('process/update/{id}',[ProcessController::class,'update'])->name('process.update');
Route::get('process/delete/{id}',[ProcessController::class,'delete'])->name('process.delete');


Route::get('timesheet/create',[TimesheetController::class,'create'])->name('timesheet.create');
Route::post('timesheet/store',[TimesheetController::class,'store'])->name('timesheet.store');
Route::get('timesheet/index',[TimesheetController::class,'index'])->name('timesheet.index');
Route::get('timesheet/edit/{id}',[TimesheetController::class,'edit'])->name('timesheet.edit');
Route::post('timesheet/update/{id}',[TimesheetController::class,'update'])->name('timesheet.update');
Route::get('timesheet/delete/{id}',[TimesheetController::class,'delete'])->name('timesheet.delete');



Route::get('fees/create',[FeesController::class,'create'])->name('fees.create');
Route::post('fees/store',[FeesController::class,'store'])->name('fees.store');
Route::get('fees/index',[FeesController::class,'index'])->name('fees.index');
Route::get('fees/edit/{id}',[FeesController::class,'edit'])->name('fees.edit');
Route::post('fees/update/{id}',[FeesController::class,'update'])->name('fees.update');
Route::get('fees/delete/{id}',[FeesController::class,'delete'])->name('fees.delete');



Route::get('project/create',[ProjectController::class,'create'])->name('project.create');
Route::post('project/store',[ProjectController::class,'store'])->name('project.store');
Route::get('project/index',[ProjectController::class,'index'])->name('project.index');
Route::get('project/edit/{id}',[ProjectController::class,'edit'])->name('project.edit');
Route::post('project/update/{id}',[ProjectController::class,'update'])->name('project.update');
Route::get('project/delete/{id}',[ProjectController::class,'delete'])->name('project.delete');


Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
