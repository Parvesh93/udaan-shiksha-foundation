<?php
use App\Http\Controllers\PageController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminProjectController;
use App\Http\Controllers\AdminDonationController;
use App\Http\Controllers\PublicDonationController;
Route::get('/',[PageController::class,'home'])->name('home');
Route::get('/about',[PageController::class,'about'])->name('about');
Route::get('/programs',[PageController::class,'programs'])->name('programs');
Route::get('/impact',[PageController::class,'impact'])->name('impact');
Route::get('/get-involved',[PageController::class,'getInvolved'])->name('get-involved');
Route::get('/contact',[PageController::class,'contact'])->name('contact');
Route::get('/donate',[PublicDonationController::class,'index'])->name('donate');
Route::post('/donate',[PublicDonationController::class,'store'])->middleware('throttle:3,1')->name('donate.store');
Route::post('/enquiries',[InquiryController::class,'store'])->middleware('throttle:5,1')->name('enquiries.store');
Route::middleware('guest')->group(function(){Route::get('/admin/login',[AdminController::class,'loginForm'])->name('admin.login');Route::post('/admin/login',[AdminController::class,'login'])->middleware('throttle:5,1')->name('admin.login.submit');});
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function(){Route::get('/',[AdminController::class,'dashboard'])->name('dashboard');Route::patch('/enquiries/{inquiry}',[AdminController::class,'update'])->name('enquiries.update');Route::post('/logout',[AdminController::class,'logout'])->name('logout');});

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function(){
 Route::resource('projects',AdminProjectController::class)->except(['show']);
 Route::get('/donations',[AdminDonationController::class,'index'])->name('donations.index');
 Route::post('/donations',[AdminDonationController::class,'store'])->name('donations.store');
 Route::patch('/donations/{donation}',[AdminDonationController::class,'update'])->name('donations.update');
});
