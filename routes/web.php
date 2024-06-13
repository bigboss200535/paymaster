<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\InterviewController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductPricingController;
use App\Http\Controllers\SalesController;
use App\Models\ProductCategory;
use App\Models\User;


// use App\Models\Employee;
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

Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route::get('/users', [ProfileController::class, 'index']); //fetch users

    Route::get('/users', function(){
        $users = User::all();
        return view('profile.index', compact('users'));
    }); 
    
    // Route::resource('employees', 'EmployeeController');
    //fetch users
    Route::get('/interviews', [InterviewController::class, 'index']); //fetch interview list
    Route::get('/salaries', [SalaryController::class, 'index']); //fetch salaries
    Route::get('/employees', [EmployeeController::class, 'index']); //fetch employee
    Route::get('/addemployee', [EmployeeController::class, 'create']); //add employee
    Route::get('/applications', [EmployeeController::class, 'applications']); //list applications
    Route::post('storeemployee', [EmployeeController::class, 'store'])->name('employee.store'); 
    Route::get('/dashboard', [GeneralController::class, 'dashboard']); //display dashboard
    Route::get('/category', [ProductCategoryController::class, 'index']); 
    Route::get('/products', [ProductController::class, 'index']); 
    Route::get('/prices', [ProductPricingController::class, 'index']); 
    Route::get('/purchases', [ProductController::class, 'purchases']); 
    Route::get('/sales', [SalesController::class, 'index']); 
    Route::get('/add-product', [ProductController::class, 'create']); 
    // Route::get('/payer/{PayerId}/details', [PayerController::class, 'showone'])
    // ->name('payer.details');
    Route::get('employee/details/{employee_id}', [EmployeeController::class, 'show'])->name('employee.show');
    // Route::get('employee/{employee_id}/details', [EmployeeController::class, 'showone']); //fetch modify
    Route::get('/modify-user', [ProfileController::class, 'viewedit']); //fetch modify
    Route::get('/password-change', [ProfileController::class, 'editpassword']); //fetch users
    Route::get('/profile-details', [ProfileController::class, 'profiledetails']); //fetch users
});

require __DIR__.'/auth.php';
