<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Vol_stanController;
use App\Http\Controllers\Vol_allftController;

use App\Http\Controllers\DataController;

use App\Http\Controllers\ProfileController;


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
})->middleware(['auth'])->name("dashboard");
Route::get('/import',[DataController::class,'import'])->name('data.import');
Route::get('/download',[DataController::class,'downloadfile'])->name('data.downloadfile');

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
	
	Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
	Route::get('/product', [ProductController::class, 'index'])->name('product.index');
	Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
	Route::post('/product', [ProductController::class, 'store'])->name('product.store');
	Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
	Route::put('/product/{product}/update', [ProductController::class, 'update'])->name('product.update');
	Route::delete('/product/{product}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');

	Route::get('/vol_stan', [Vol_stanController::class, 'index'])->name('vol_stan.index');
	Route::get('/vol_stan/create', [Vol_stanController::class, 'create'])->name('vol_stan.create');
	Route::post('/vol_stan', [Vol_stanController::class, 'store'])->name('vol_stan.store');
	Route::get('/vol_stan/{vol_stan}/edit', [Vol_stanController::class, 'edit'])->name('vol_stan.edit');
	Route::put('/vol_stan/{vol_stan}/update', [Vol_stanController::class, 'update'])->name('vol_stan.update');
	Route::delete('/vol_stan/{vol_stan}/destroy', [Vol_stanController::class, 'destroy'])->name('vol_stan.destroy');

	Route::get('/vol_allft/index/{id?}', [Vol_allftController::class, 'index'])->name('vol_allft.index');
	Route::get('/vol_allft/create', [Vol_allftController::class, 'create'])->name('vol_allft.create');
	Route::post('/vol_allft/index', [Vol_allftController::class, 'store'])->name('vol_allft.store');
	Route::get('/vol_allft/{vol_allft}/edit', [Vol_allftController::class, 'edit'])->name('vol_allft.edit');
	Route::put('/vol_allft/{vol_allft}/update', [Vol_allftController::class, 'update'])->name('vol_allft.update');
	Route::delete('/vol_allft/{vol_allft}/destroy', [Vol_allftController::class, 'destroy'])->name('vol_allft.destroy');


	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
	Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.updates');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
	Route::get('icons', ['as' => 'pages.icons', 'uses' => 'App\Http\Controllers\PageController@icons']);
	Route::get('maps', ['as' => 'pages.maps', 'uses' => 'App\Http\Controllers\PageController@maps']);
	Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'App\Http\Controllers\PageController@notifications']);
	Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'App\Http\Controllers\PageController@rtl']);
	Route::get('tables', ['as' => 'pages.tables', 'uses' => 'App\Http\Controllers\PageController@tables']);
	Route::get('typography', ['as' => 'pages.typography', 'uses' => 'App\Http\Controllers\PageController@typography']);
	Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'App\Http\Controllers\PageController@upgrade']);
});



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Auth::routes();

// Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

// Route::group(['middleware' => 'auth'], function () {
// 		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'App\Http\Controllers\PageController@icons']);
// 		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'App\Http\Controllers\PageController@maps']);
// 		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'App\Http\Controllers\PageController@notifications']);
// 		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'App\Http\Controllers\PageController@rtl']);
// 		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'App\Http\Controllers\PageController@tables']);
// 		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'App\Http\Controllers\PageController@typography']);
// 		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'App\Http\Controllers\PageController@upgrade']);
// });

// Route::group(['middleware' => 'auth'], function () {
// 	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
// 	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
// 	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
// 	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.updates');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });