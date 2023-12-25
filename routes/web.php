<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\HostingController;
use App\Http\Controllers\LienheController;
use Egulias\EmailValidator\Parser\CommentStrategy\DomainComment;
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
Route::controller(AboutController::class)->group(function () {
    Route::get('/about', 'show')->name('show.about');
});
Route::controller(ServiceController::class)->group(function () {
    Route::get('/service', 'show')->name('show.service');
});
Route::controller(PricingController::class)->group(function () {
    Route::get('/pricing', 'show')->name('show.pricing');
});
Route::controller(HostingController::class)->group(function () {
    Route::get('/hosting', 'show')->name('show.hosting');
});
Route::controller(DemoController::class)->group(function () {
    Route::get('/demo', 'show')->name('show.demo');
});
Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'show')->name('show.contact');
});
Route::controller(LienheController::class)->group(function () {
    Route::get('/lienhe', 'show')->name('show.lienhe');
});
Route::controller(DomainController::class)->group(function () {
    Route::get('/domain', 'show')->name('show.domain');
});


Route::get('/admin', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
