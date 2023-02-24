<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteUrl;
use Spatie\Browsershot\Browsershot;
use App\Models\Datas\Infog\Tables\RessourceImage;
use App\Http\Controllers\DataCommuneController;
use App\Http\Controllers\SujetController;
use App\Http\Controllers\ContactController;
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
Route::get('veilleCitoyenne', function () {
  
  return view('veilleCitoyenne');
})->name("veilleCitoyenne");

/*login*/
Route::get('home', function () {
    $datas = App\Models\Datas\Data::orderBy('id', 'DESC')->get();
    return view('home', compact('datas'));
  })->middleware(['auth'/*,'verified'*/])->name('home');

  Route::get('profile', function () {
    return view('profile');
  })->middleware('auth')->name('profile');

  /*Route::get('test', function () {
    return 'Vue de test';
  })->middleware(['verified']);*/



/*********************************************/
Route::get('home/data', function () {
  return view('home');
})->middleware(['auth'/*,'verified'*/])->name('home.data');

Route::get('home/create', function () {
  return view('home');
})->middleware(['auth'/*,'verified'*/])->name('home.create');

/*********************************************/

Route::get('actualites', [SiteUrl::class, 'actualites'])->name('actualites');
Route::get('detail', [SiteUrl::class, 'actualiteDetail'])->name('detail');
/*Data view*/
Route::get('datas/view', [DataCommuneController::class, 'datasView'])->name('datas.view');
Route::get('datas/info/{slug?}', [SiteUrl::class, 'datasInfo'])->name('datas.info');
Route::get('datas/pcd/{slug?}', [SiteUrl::class, 'datasPcd'])->name('datas.pcd');
Route::get('datas/budget/{slug?}', [SiteUrl::class, 'datasBudget'])->name('datas.bg');
Route::get('datas/budget/mbudget/{slug?}', [SiteUrl::class, 'getBudget'])->name('budget');
Route::get('datas/budget/mbudgetn/{slug?}', [SiteUrl::class, 'getBudgetN'])->name('budgetn');

Route::get('datas/tdb/{tdbType?}/{slug?}', [SiteUrl::class, 'datasTdb'])->name('datas.tdb');
Route::get('datas/cmp', [SiteUrl::class, 'Compare'])->name('datas.cmp');
Route::get('datas/cmpdt', [SiteUrl::class, 'datasCompare'])->name('datas.cmpdt');
Route::get('datas/{id}', [SiteUrl::class, 'getDatasCompare']);


/*user*/
//Route::get('login', [SiteUrl::class, 'login'])->name('login');
//Route::get('sign', [SiteUrl::class, 'signup'])->name('signup');
//Route::get('forum', [SiteUrl::class, 'forum'])->name('forum');
Route::resource('forum', SujetController::class);
Route::get('forumdetail/{slug}', [SujetController::class, 'forumDetail'])->name('forumDetail');
Route::post('commenter', [SujetController::class, 'commentaire'])->name('commenter');
Route::get('forumS', [SujetController::class, 'forumSujet'])->name('forumS');
Route::get('forumd/{slug}', [SujetController::class, 'forumDelete'])->name('forumd');


//Route::get('contact', [SiteUrl::class, 'contact'])->name('contact');
Route::get('about', [SiteUrl::class, 'about'])->name('about');
Route::get('test', [SiteUrl::class, 'test'])->name('test');
Route::get('role', [SiteUrl::class, 'userRole'])->name('userRole');
Route::get('getdata', [SiteUrl::class, 'getdata'])->name('getdata');

Route::get('country/{country_id}', [SiteUrl::class, 'getCountryRegion']);
Route::get('region/{region_id}', [SiteUrl::class, 'getCountryRegionProvince']);
Route::get('province/{province_id}', [SiteUrl::class, 'getCountryRegionProvinceCommune']);
Route::get('commune', [SiteUrl::class, 'getCommune'])->name('commune');

Route::get('/pdf', [SiteUrl::class, 'pdf'])->name('pdf');
Route::resource('data', DataCommuneController::class)->middleware(['auth'/*,'verified'*/]);
Route::put('data/terminer/{data}', [DataCommuneController::class, 'terminer'])->middleware(['auth'/*,'verified'*/])->name('data.terminer');
Route::put('data/publier/{data}', [DataCommuneController::class, 'publier'])->middleware(['auth'/*,'verified'*/])->name('data.publier');
Route::put('data/encour/{data}', [DataCommuneController::class, 'encour'])->middleware(['auth'/*,'verified'*/])->name('data.encour');
Route::get('data/deleteImg/{id?}', [DataCommuneController::class, 'deleteImg'])->middleware(['auth'/*,'verified'*/])->name('deleteImg');
Route::get('image/{slug}', [DataCommuneController::class, 'image']);
Route::post('data/updateCommune/{id?}', [DataCommuneController::class, 'updateCommune'])->middleware(['auth'/*,'verified'*/])->name('data.updateCommune');
Route::get('h_list', [DataCommuneController::class, 'h_list'])->middleware(['auth'/*,'verified'*/])->name('data.h_list');





Route::post('make_pdf', [SiteUrl::class, 'makePdf'])->name('make_pdf');
Route::get('make_file_exporte/{route}/{file}/{slug}', [SiteUrl::class, 'makeFileExporte'])->name('make_file_exporte');



Route::get('policies', function () {
  return view('pages.policies');
})->name('policies');
Route::get('apropos', function () {
  return view('pages.apropos');
})->name('apropos');

Route::get('/contact', [ContactController::class, 'createForm'])->name('contact');
Route::post('/contact', [ContactController::class, 'ContactUsForm'])->name('contact.store');
