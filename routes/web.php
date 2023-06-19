<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\CategoryController;

use App\Http\Controllers\front\FrontController;
use App\Http\Controllers\AuthorController;
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

Route::get('/', function () {
    return view('welcome');
});


// Route::resource('category', CategoryController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['perfix'=>'admin','middleware'=>['auth','superAdmin']],function () {


    Route::resource("managers", App\Http\Controllers\ManagerController::class); 
    // Route::resource('category', CategoryController::class);

    Route::resource("managers", App\Http\Controllers\ManagerController::class);
});


Route::controller('App\Http\Controllers\AuthorController')->middleware(['auth','superAdmin'])->prefix('authors')->group(function(){
    Route::get('create','create')->name('author.create');
    Route::post('store','store')->name('author.store');
    Route::get('index','index')->name('author.index');
    Route::get('{id}/edit','edit')->name('author.edit');
    Route::put('update/{id}','update')->name('author.update');
    Route::delete('destroy/{id}','destroy')->name('author.destroy');
});

Route::get('dash-board', function() {
    return view('dash');
})->middleware(['auth', 'superAdmin']);

Route::get('/category', [App\Http\Controllers\front\FrontController::class, 'frontCategory']);

Route::get('/authors', [App\Http\Controllers\front\FrontController::class,'frontAuthor'])->name('author.front');
// Route::get('/users',[HomeController::class,'users']) ->name('users');
