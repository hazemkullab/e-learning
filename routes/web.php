<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\VideoController;
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


    // Videos routes
    Route::get('videos/trash', [VideoController::class, 'trash'])->name('videos.trash');
    Route::get('videos/{id}/restore', [VideoController::class, 'restore'])->name('videos.restore');
    Route::delete('videos/{id}/forcedelete', [VideoController::class, 'forceDelete'])->name('videos.forceDelete');
    Route::resource('videos', VideoController::class);

});

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    Route::get('/', [MainController::class, 'index'])->name('website.index');
    Route::get('/category/{slug}', [MainController::class, 'category'])->name('website.category');
    Route::get('/about', [MainController::class, 'about'])->name('website.about');
    Route::get('/contact', [MainController::class, 'contact'])->name('website.contact');
    Route::get('/courses', [MainController::class, 'courses'])->name('website.courses');
    Route::get('/courses/{slug}', [MainController::class, 'courses_single'])->name('website.courses_single');
    Route::get('/buy-course/{course:slug}', [MainController::class, 'buy_course'])->name('website.buy_course');
    Route::get('/buy-course/{id}/thanks', [MainController::class, 'buy_course_thanks'])->name('website.buy_course_thanks');
    Route::get('/user/login', [MainController::class, 'login'])->name('website.login');


    Route::post('test-data', [MainController::class, 'test_data'])->name('test_data');
});

// Route::prefix(LaravelLocalization::setLocale())->group(function(){
//     Route::get('/', [MainController::class, 'index'])->name('website.index');
// });



// Route::get('{ffffff}', function() {
//     return redirect('/');
// });
