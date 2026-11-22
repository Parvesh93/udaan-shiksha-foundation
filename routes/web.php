<?php
use App\Http\Controllers\PageController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
Route::get('/',[PageController::class,'home'])->name('home');
Route::get('/about',[PageController::class,'about'])->name('about');
Route::get('/programs',[PageController::class,'programs'])->name('programs');
Route::get('/impact',[PageController::class,'impact'])->name('impact');
Route::get('/get-involved',[PageController::class,'getInvolved'])->name('get-involved');
Route::get('/contact',[PageController::class,'contact'])->name('contact');
Route::post('/enquiries',[InquiryController::class,'store'])->middleware('throttle:5,1')->name('enquiries.store');
Route::middleware('guest')->group(function(){Route::get('/admin/login',[AdminController::class,'loginForm'])->name('admin.login');Route::post('/admin/login',[AdminController::class,'login'])->middleware('throttle:5,1')->name('admin.login.submit');});
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function(){Route::get('/',[AdminController::class,'dashboard'])->name('dashboard');Route::patch('/enquiries/{inquiry}',[AdminController::class,'update'])->name('enquiries.update');Route::post('/logout',[AdminController::class,'logout'])->name('logout');});
