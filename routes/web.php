<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->name('admin.')->middleware('auth', 'admin')->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    // Categories routes
    Route::get('categories/trash', [CategoryController::class, 'trash'])->name('categories.trash');
    Route::get('categories/{id}/restore', [CategoryController::class, 'restore'])->name('categories.restore');
    Route::delete('categories/{id}/forcedelete', [CategoryController::class, 'forceDelete'])->name('categories.forceDelete');
    Route::resource('categories', CategoryController::class);


    // Courses roues
    Route::get('courses/trash', [CourseController::class, 'trash'])->name('courses.trash');
    Route::get('courses/{id}/restore', [CourseController::class, 'restore'])->name('courses.restore');
    Route::delete('courses/{id}/forcedelete', [CourseController::class, 'forceDelete'])->name('courses.forceDelete');
    Route::resource('courses', CourseController::class);

});

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    Route::get('/', [MainController::class, 'index'])->name('website.index');
});

// Route::prefix(LaravelLocalization::setLocale())->group(function(){
//     Route::get('/', [MainController::class, 'index'])->name('website.index');
// });



// Route::get('{ffffff}', function() {
//     return redirect('/');
// });
