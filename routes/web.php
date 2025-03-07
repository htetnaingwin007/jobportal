<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('posts',App\Http\Controllers\Jobs\PostController::class);

Route::group(['prefix' => 'jobs'],function(){
    Route::get('single/{id}', [App\Http\Controllers\Jobs\JobsController::class, 'single'])->name('single.job');
    Route::post('save', [App\Http\Controllers\Jobs\JobsController::class, 'saveJob'])->name('save.job');
    Route::post('apply', [App\Http\Controllers\Jobs\JobsController::class, 'applyJob'])->name('apply.job');
    Route::any('search', [App\Http\Controllers\Jobs\JobsController::class, 'search'])->name('search.job');

});


Route::group(['prefix' => 'categories'],function(){
    Route::get('single/{id}', [App\Http\Controllers\Categories\CategoriesController::class, 'singleCatgory'])->name('categories.single');
});


Route::group(['prefix' => 'companies'],function(){
    Route::get('company-profile/{id}', [App\Http\Controllers\Companies\CompanyController::class, 'companyProfile'])->name('company.profile');
    Route::get('company-profile-edit', [App\Http\Controllers\Companies\CompanyController::class, 'companyProfileEdit'])->name('company.profileEdit');
    Route::post('company-profile-update', [App\Http\Controllers\Companies\CompanyController::class, 'companyProfileUpdate'])->name('company.profileUpdate');
});





Route::group(['prefix'=>'backend','as'=>'backend.'],function(){
    Route::get('/',[App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('post',App\Http\Controllers\Admin\JobPostController::class);
    Route::resource('category',App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('region',App\Http\Controllers\Admin\RegionController::class);
    Route::resource('user',App\Http\Controllers\Admin\UserController::class);
    Route::resource('company',App\Http\Controllers\Admin\CompanyController::class);
    Route::resource('seeker',App\Http\Controllers\Admin\SeekerController::class);
    
});