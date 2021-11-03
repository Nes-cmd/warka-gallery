<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\EmailVerificationController;


Route::get('clear', [\App\Http\Controllers\ArtisanCommandController::class, 'index']);
Route::get('route-cache', [\App\Http\Controllers\ArtisanCommandController::class,'routeCache']);

Route::view('', 'welcome');
Route::view('dashboard', 'dashboard')->name('dashboard')->middleware(['auth:sanctum']);
Route::view('faq', 'section.faq');
Route::view('notifications', 'section.notifications')->middleware('auth');

Route::view('payment/submited', 'payment.submitted')->middleware('auth')->name('payment.submited');
Route::middleware('auth')->namespace('App\Http\Livewire\\')->prefix('files')->name('files.')->group( function(){
    Route::get('photo/index', Photo::class)->name('photo.index');
    Route::get('photo/setting',Settings::class)->name('photo.setting');
    Route::get('other/index', OtherFiles::class)->name('other.index');
});//Midlewire 'payed' can be applied to above group to prevent free plan users.
Route::middleware('auth')->namespace('App\Http\Livewire\\')->group(function(){
    Route::get('files/photo/pass', Photo::class)->name('files.photo.pass');
    Route::get('payment/start/{skip?}', Payment::class)->name('payment.start');
    Route::get('payment/method/{selected}',Methods::class)->name('payment.method');
});
Route::namespace('\App\Http\Livewire\\')->prefix('admin/')->name('admin.')->group(function(){
    Route::get('plans/index', Plans::class)->name('plans.index')->middleware(['auth','can:manage-users']);
    Route::get('users/index', UserControl::class)->name('users.index')->middleware(['auth','can:manage-users']);
});
Route::prefix('email')->name('verification.')->group(function(){
    Route::get('verify', [EmailVerificationController::class,'notice'])->name('notice');
    Route::post('verification-notification', [EmailVerificationController::class,'sendEmail'])->middleware('throttle:6,1')->name('send');
    Route::get('verify/{id}/{hash}', [EmailVerificationController::class,'verify'])->middleware('signed')->name('verify');
});
?>