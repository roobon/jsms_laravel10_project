<?php

use App\Http\Controllers\backend\AdminHomeController;
use App\Http\Controllers\backend\AjaxController;
use App\Http\Controllers\backend\DoctorController;
use App\Http\Controllers\backend\SpecialistController;
use App\Http\Controllers\backend\CompanyController;
use App\Http\Controllers\backend\EmployeeController;
use App\Http\Controllers\backend\InvestmentController;
use App\Http\Controllers\backend\PaymentController;
use App\Http\Controllers\backend\PointController;
use App\Http\Controllers\backend\ReportController;
use App\Http\Controllers\backend\RetailerController;
use App\Http\Controllers\backend\SalesController;
use App\Http\Controllers\backend\TargetController;
use App\Http\Controllers\frontend\AppointmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\backend\StockController;
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

// Admin Login
Route::middleware('guest:admin')->prefix('admin')->group(function () {

    Route::get('login', [App\Http\Controllers\Auth\Admin\LoginController::class, 'login'])->name('admin.login');
    Route::post('login', [App\Http\Controllers\Auth\Admin\LoginController::class, 'check_user']);
});

// Admin Dashboard
Route::middleware('auth:admin')->prefix('admin')->group(function () {

    Route::post('logout', [App\Http\Controllers\Auth\Admin\LoginController::class, 'logout'])->name('admin.logout');

    Route::get('/dashboard', [AdminHomeController::class, 'index']);
    Route::resource('/specialist', SpecialistController::class);
    Route::resource('/doctor', DoctorController::class);
    Route::resource('/company', CompanyController::class);
    Route::resource('/retailer', RetailerController::class);
    Route::resource('/points', PointController::class);
    Route::resource('/employee', EmployeeController::class);
    Route::resource('/sales', SalesController::class);
    Route::resource('/received', RetailerController::class);
    Route::resource('/payment', PaymentController::class);
    Route::resource('/investment', InvestmentController::class);
    Route::resource('/insentive', RetailerController::class);
    Route::resource('/slab', RetailerController::class);
    Route::resource('/display_center', RetailerController::class);
    Route::resource('/expired', RetailerController::class);
    Route::resource('/claim', RetailerController::class);
    Route::resource('/report/companywise', ReportController::class);
    Route::resource('/target', TargetController::class);
    Route::resource('/stock', StockController::class);
    // Route::get('/report/{id}', [ReportController::class, 'companyReport'])->name('compRR');
    // Route::get('/report/{id}', [ReportController::class, 'retailerReport']);
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


Route::get('/info', [AjaxController::class, 'retailerInfo'])->name('info');
