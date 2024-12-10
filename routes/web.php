<?php

use App\Http\Controllers\backend\DoctorController;
use App\Http\Controllers\backend\SpecialistController;
use App\Http\Controllers\backend\CompanyController;
use App\Http\Controllers\backend\RetailerController;
use App\Http\Controllers\frontend\AppointmentController;
use App\Http\Controllers\ProfileController;
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
    return view('login');
});
Route::get('/about', function () {
    return view('frontend.about');
});
Route::get('/appointment', [AppointmentController::class, 'create'])->name('appointment.create');
Route::post('/appointment', [AppointmentController::class, 'store'])->name('appointment.store');
// Admin Dashboard
// Route::get('/admin/dashboard', function () {
//     return view('backend.admin_dashboard');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// Admin Routes
Route::middleware('guest:admin')->prefix('admin')->group(function () {

    Route::get('login', [App\Http\Controllers\Auth\Admin\LoginController::class, 'login'])->name('admin.login');
    Route::post('login', [App\Http\Controllers\Auth\Admin\LoginController::class, 'check_user']);
});

Route::middleware('auth:admin')->prefix('admin')->group(function () {

    Route::post('logout', [App\Http\Controllers\Auth\Admin\LoginController::class, 'logout'])->name('admin.logout');

    Route::view('/dashboard', 'backend.admin_dashboard');
    Route::resource('/specialist', SpecialistController::class);
    Route::resource('/doctor', DoctorController::class);
    Route::resource('/company', CompanyController::class);
    Route::resource('/retailer', RetailerController::class);
    Route::resource('/point', RetailerController::class);
    Route::resource('/employee', RetailerController::class);
    Route::resource('/user_permission', RetailerController::class);
    Route::resource('/sales', RetailerController::class);
    Route::resource('/received', RetailerController::class);
    Route::resource('/payments', RetailerController::class);
    Route::resource('/investments', RetailerController::class);
    Route::resource('/insentives', RetailerController::class);
    Route::resource('/slabs', RetailerController::class);
    Route::resource('/display_centers', RetailerController::class);
    Route::resource('/expires', RetailerController::class);
    Route::resource('/claims', RetailerController::class);
});

// Doctor Routes
Route::middleware('guest:doctor')->prefix('doctor')->group(function () {

    Route::get('login', [App\Http\Controllers\Auth\Doctor\LoginController::class, 'login'])->name('doctor.login');
    Route::post('login', [App\Http\Controllers\Auth\Doctor\LoginController::class, 'check_user']);
});
Route::middleware('auth:doctor')->prefix('doctor')->group(function () {

    Route::post('logout', [App\Http\Controllers\Auth\Doctor\LoginController::class, 'logout'])->name('doctor.logout');

    Route::view('/dashboard', 'backend.doctor_dashboard');
});
