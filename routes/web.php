<?php

use App\Http\Controllers\ArrayController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\StringController;
use App\Http\Controllers\UserController;
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

// Task 3: Array Operations
Route::get('merge-arrays', [ArrayController::class, 'mergeArrays'])->name('merge-arrays');

Route::get('filter-odd-numbers', [ArrayController::class, 'filterOddNumbers'])->name('filter-odd-numbers');

Route::get('calculate-average', [ArrayController::class, 'calculateAverage'])->name('calculate-average');

Route::get('find-common-elements', [ArrayController::class, 'findCommonElements'])->name('find-common-elements');


//Task 4: String Manipulation (OPTIONAL TASK)
Route::get('reverse-string', [StringController::class, 'reverseString'])->name('reverse-string');

Route::get('count-vowels', [StringController::class, 'countVowels'])->name('count-vowels');

Route::get('truncate-text', [StringController::class, 'truncateText'])->name('truncate-text');

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::resource('users', UserController::class);

    Route::get('/roles', [RolePermissionController::class, 'index'])->name('roles.index');
    Route::get('/roles/create', [RolePermissionController::class, 'create'])->name('roles.create');
    Route::post('/roles/store', [RolePermissionController::class, 'store'])->name('roles.store');
    Route::post('/roles/update', [RolePermissionController::class, 'updateRoles'])->name('roles.updateRole');


    Route::get('/home', [HomeController::class, 'index'])->name('home');
});


