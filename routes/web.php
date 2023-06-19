<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EturoController;
use App\Http\Controllers\EsalinController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\EglobalController;
use App\Http\Controllers\ElinangController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EsaliksikController;
use App\Http\Controllers\ForgotPasswordController;

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

Route::get('/', [HomeController::class, 'home']);

Route::get('/eturo', [EturoController::class, 'eturo']);

Route::get('/esaliksik', [EsaliksikController::class, 'esaliksik']);

Route::get('/eglobal', [EglobalController::class, 'eglobal']);

Route::get('/linang', [ElinangController::class, 'elinang']);

Route::get('/esalin', [EsalinController::class, 'esalin']);

Route::get('/signin', [SigninController::class, 'signin'])->name('login');
Route::post('/user/authenticate', [SigninController::class, 'authenticate']);
Route::post('/logout', [SigninController::class, 'logout']);
Route::get('/emailsignin', [SigninController::class, 'emailSignin']);
Route::post('/emailauthenticate', [SigninController::class, 'emailAuthenticate']);

Route::get('/signup', [SignupController::class, 'signup']);
Route::post('/users', [SignupController::class, 'store']);

Route::get('/resetpassword', [ForgotPasswordController::class, 'forgotPassword']);
Route::post('/resetpassword', [ForgotPasswordController::class, 'resetPassword']);

Route::get('/reset/password/{token}', [ForgotPasswordController::class, 'updatePassword']);
Route::post('/reset/password/{token}', [ForgotPasswordController::class, 'postReset']);

Route::get('/profile', [ProfileController::class, 'profile'])->middleware('auth');
Route::get('/personal', [ProfileController::class, 'personal'])->middleware('auth');
Route::get('/modules', [ProfileController::class, 'modules'])->middleware('auth');
Route::get('/notes', [ProfileController::class, 'notes'])->middleware('auth');
Route::put('/profile', [ProfileController::class, 'update']);
Route::put('/personal', [ProfileController::class, 'updatePersonal']);
Route::post('/notes', [ProfileController::class, 'note']);
Route::get('/note/{note}', [ProfileController::class, 'singleNote'])->name('note.show');
Route::delete('/note/{note}', [ProfileController::class, 'destroy'])->name('note.destroy');
Route::put('/note/{note}', [ProfileController::class, 'updateNote'])->name('note.update');








