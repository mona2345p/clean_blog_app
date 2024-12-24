<?php
//namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\{contactcontroller,postscontroller,sitecontroller,Aboutcontroller};



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
Route::get('/',[sitecontroller::class,'home'])->name('home');
Route::get('/about',[Aboutcontroller::class,'index']);
Route::get('/contact',[Contactcontroller::class,'index']);
Route::post('/send-message',[Contactcontroller::class,'sendMessage']);
Route::get('/posts',[postscontroller::class,'index']);

Route::get('/posts/{post}',[postscontroller::class,'show']);
//authentication
//
Route::get('/register', [AuthController::class, 'register'])->name('register')->middleware('auth.mid');
Route::post('/register', [AuthController::class, 'storeUser'])->name('store.user')->middleware('auth.mid');;
Route::get('/login-page', [AuthController::class, 'login'])->name('login')->middleware('auth.mid');;
Route::post('/login-page', [AuthController::class, 'loginUser'])->name('login.user')->middleware('auth.mid');;
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::get('/', [Homecontroller::class,'index'] );

// Route::get('/about', [Homecontroller::class,'about'] );
// Route::get('/contact', [Homecontroller::class,'contact'] ); 
   
   


