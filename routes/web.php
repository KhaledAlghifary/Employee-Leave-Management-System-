<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\leaveTypeController;

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

Route::prefix('/admin/dashboard')->middleware(['auth', 'verified'])->group(function () {
    Route::get('', [ManageController::class,'index'])->name('admin.dashboard');

    Route::get('/manage',[ManageController::class,'manage'])->name('admin.manage');
    Route::get('/employees',[ManageController::class,'getEmployees'])->name('admin.employees');
    Route::get('/leave',[ManageController::class,'leave'])->name('admin.leave');
    
    Route::resource('leave/types', leaveTypeController::class);

    Route::get('/leave/manage/{status}/{user_id}/{leave}',[ManageController::class,'manageLeaveModal'])->name('admin.manageLeaveModal');
    Route::post('/leave/manage/{leave}',[ManageController::class,'manageLeave'])->name('admin.manageLeave');








});
    


Route::prefix('/employee/dashboard')->middleware(['auth', 'verified'])->group(function () {
    Route::get('', [EmployeeController::class,'index'])->name('employee.dashboard');
    Route::get('/leave/apply',[EmployeeController::class,'leaveApply'])->name('employee.leaveApply');
    Route::post('/leave/apply',[EmployeeController::class,'storeLeave'])->name('employee.storeLeave');

  







});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/manage');
});

require __DIR__.'/auth.php';
