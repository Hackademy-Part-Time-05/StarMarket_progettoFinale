<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\FrontController;
use App\Models\Announcement;
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

Route::get('/',[FrontController::class, 'welcome'] )->name('welcome');
Route::get('announcements',[AnnouncementController::class,'create'])->name('announcement.create')->middleware('auth');
Route::get('/categoria/{category}',[FrontController::class, 'categoryShow'])->name('categoryShow');
Route::get('announcements/{announcement}',[AnnouncementController::class,'show'])->name('announcement.show');
Route::get('/tutti/annunci}',[AnnouncementController::class,'index'])->name('announcement.index');