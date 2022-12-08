<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
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
    return abort(403, 'A superior should send you the link.');
});

// Registration Admin
Route::get('/registration/{department}', [RegistrationController::class, 'create'])->name('registration.create');
Route::post('/registration/{department}', [RegistrationController::class, 'store'])->name('registration.store');

Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Registration Admin
    Route::get('/registrations', [RegistrationController::class, 'index'])->name('registration.index');
    Route::delete('/registration/{registration}', [RegistrationController::class, 'destroy'])->name('registration.destroy');

    Route::get('/departments', [DepartmentController::class, 'index'])->name('department.index');

});

require __DIR__.'/auth.php';
