<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteUrl;
use Spatie\Browsershot\Browsershot;


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

Route::get('/', [SiteUrl::class, 'index'])->name('acceuil');

/*login*/
Route::get('home', function () {
    $datas = App\Models\Datas\Data::all();
    return view('home', compact('datas'));
  })->middleware(['auth','verified'])->name('home');

  Route::get('profile', function () {
    return view('profile');
  })->middleware('auth')->name('profile');

  Route::get('test', function () {
    return 'Vue de test';
  })->middleware(['verified']);

  Route::get('test12', function () {
    return 'Vue de test';
  })->middleware(['auth', 'password.confirm']);
  
/*********************************************/
Route::get('home/data', function () {
  return view('home');
})->middleware(['auth','verified'])->name('home.data');

Route::get('home/create', function () {
  return view('home');
})->middleware(['auth','verified'])->name('home.create');

/*********************************************/

Route::get('actu', [SiteUrl::class, 'actu'])->name('actu');
Route::get('actuc', [SiteUrl::class, 'actuContent'])->name('actuc');
/*Data view*/
Route::get('datas/view', [App\Http\Controllers\DataCommuneController::class, 'datasView'])->name('datas.view');
Route::get('datas/info/{slug?}', [SiteUrl::class, 'datasInfo'])->name('datas.info');
Route::get('datas/pcd/{slug?}', [SiteUrl::class, 'datasPcd'])->name('datas.pcd');
Route::get('datas/budget/{slug?}', [SiteUrl::class, 'datasBudget'])->name('datas.bg');
Route::get('datas/budget/mbudget/{slug?}', [SiteUrl::class, 'getBudget'])->name('budget');
Route::get('datas/budget/mbudgetn/{slug?}', [SiteUrl::class, 'getBudgetN'])->name('budgetn');

Route::get('datas/tdb/{slug?}', [SiteUrl::class, 'datasTdb'])->name('datas.tdb');
Route::get('datas/cmp', [SiteUrl::class, 'Compare'])->name('datas.cmp');
Route::get('datas/cmpdt', [SiteUrl::class, 'datasCompare'])->name('datas.cmpdt');

/*user*/
//Route::get('login', [SiteUrl::class, 'login'])->name('login');
//Route::get('sign', [SiteUrl::class, 'signup'])->name('signup');
Route::get('forum', [SiteUrl::class, 'forum'])->name('forum');
Route::get('contact', [SiteUrl::class, 'contact'])->name('contact');
Route::get('about', [SiteUrl::class, 'about'])->name('about');
Route::get('test', [SiteUrl::class, 'test'])->name('test');
Route::get('getdata', [SiteUrl::class, 'getdata'])->name('getdata');

//Route::delete('films/force/{id}', [FilmController::class, 'forceDestroy'])->name('films.force.destroy');
Route::get('country/{country_id}', [SiteUrl::class, 'getCountryRegion']);
Route::get('region/{region_id}', [SiteUrl::class, 'getCountryRegionProvince']);
Route::get('province/{province_id}', [SiteUrl::class, 'getCountryRegionProvinceCommune']);

Route::get('/pdf', [SiteUrl::class, 'pdf'])->name('pdf');
Route::resource('data', App\Http\Controllers\DataCommuneController::class)->middleware(['auth','verified']);
Route::put('data/terminer/{data}', [App\Http\Controllers\DataCommuneController::class, 'terminer'])->middleware(['auth','verified'])->name('data.terminer');
Route::put('data/encour/{data}', [App\Http\Controllers\DataCommuneController::class, 'encour'])->middleware(['auth','verified'])->name('data.encour');

Route::post('make_pdf', [SiteUrl::class, 'makePdf'])->name('make_pdf');