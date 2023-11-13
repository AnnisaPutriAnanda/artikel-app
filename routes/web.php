<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
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
})->name('welcome');

Route::get('/dashboard', function () {
       if(Auth::id()){

        $usertype = auth()->user()->usertype;
        $id = auth()->user()->id;

        if($usertype == 'user'){
            return view('user.dashboard');
        }elseif($usertype == 'admin' || $usertype == 'super_admin'){
            return view('admin.dashboard');
        }else{
            abort(401);
        }
       }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth', 'user')->group(function(){
    Route::get('/postContent', function (){
        return view('user.postContent');
    });
    Route::get('/1', [ArticleController::class, 'displayAll'])->name('1.displayAll');
    Route::get('/2/{id}', [ArticleController::class, 'display'])->name('2.display');
    Route::post('/3', [ArticleController::class, 'post'])->name('3.post');
    Route::delete('/4/{id}', [ArticleController::class, 'destroy'])->name('4.destroy');
});

Route::middleware('auth', 'admin')->group(function(){
    Route::get('/admin', function () {
        return 'hanya admin';
    });
});

Route::middleware('auth', 'super_admin')->group(function(){
    Route::get('/super_admin', function () {
        return 'hanya super_admin';
    });
});

require __DIR__.'/auth.php';
