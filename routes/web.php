<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', [IdeaController::class, 'index'])->name('idea.index');
Route::get('/show/{idea:slug}', [IdeaController::class, 'show'])->name('idea.show');
Route::get('/create', [IdeaController::class, 'create'])->name('idea.create');


// Google login

Route::get('/auth/google/redirect',[LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/auth/google/callback',[LoginController::class, 'handleGoogleCallback']);

// facebook login

Route::get('/auth/facebook/redirect',[LoginController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('/auth/facebook/callback',[LoginController::class, 'handleFacebookCallback']);



