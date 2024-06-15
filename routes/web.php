<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Vol_stanController;
use App\Http\Controllers\Vol_allftController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\FlightStatisticsController;
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
	$firstFiveFlights = DB::table('vol_allfts')->select('call_sign', 'a_dep', 'a_des', 'heure_de_reference', 'immatriculation')->orderBy('id')->limit(5)->get();
    $total_departures = DB::table('vol_allfts')->where('a_dep', 'LFPG')->count();
    $total_arrivals = DB::table('vol_allfts')->where('a_des', 'LFPG')->count();
    $total_operations = DB::table('vol_allfts')->count();
    $total_ABI = DB::table('vol_allfts')->where('typePlnRDVC', 'ABI')->count();
    $total_APL = DB::table('vol_allfts')->where('typePlnRDVC', 'APL')->count();
    $total_RPL = DB::table('vol_allfts')->where('typePlnRDVC', 'RPL')->count();
    $total_pln_finale = DB::table('vol_allfts')->where('typePlnStan', 'FPL')->count();

    return view('welcome', [
        'total_departures' => $total_departures,
        'total_arrivals' => $total_arrivals,
        'total_operations' => $total_operations,
        'total_ABI' => $total_ABI,
        'total_APL' => $total_APL,
        'total_RPL' => $total_RPL,
        'total_pln_finale' => $total_pln_finale,
    ]);
})->middleware(['auth'])->name("dashboard");


Auth::routes();
Route::group(['middleware' => 'auth'], function () {
	Route::get('/downloads-pdf', [FlightStatisticsController::class, 'downloadsPDF']);
	Route::get('/download-pdf', [FlightStatisticsController::class, 'downloadPDF']);
	Route::get('/eurocontrol', [FlightStatisticsController::class, 'index'])->name('eurocontrol');
	Route::get('/download-txt/{date}', [FlightStatisticsController::class, 'datetxt']);
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
	Route::get('/vol_allft/index/{vol_allft}/edit', [Vol_allftController::class, 'edit'])->name('vol_allft.edit');
	Route::put('/vol_allft/index/{vol_allft}/update', [Vol_allftController::class, 'update'])->name('vol_allft.update');
	Route::delete('/vol_allft/{vol_allft}/destroy', [Vol_allftController::class, 'destroy'])->name('vol_allft.destroy');
	Route::get('/vol_allft/import', [Vol_allftController::class, 'showImportForm'])->name('vol_allft.importForm');
	Route::post('/vol_allft/import', [Vol_allftController::class, 'import'])->name('vol_allft.import');


	Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
	// Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
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
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
