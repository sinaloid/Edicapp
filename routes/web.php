<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteUrl;
use Spatie\Browsershot\Browsershot;
use App\Models\Datas\Infog\Tables\RessourceImage;
use App\Http\Controllers\DataCommuneController;
use App\Http\Controllers\SujetController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\VeilleCitoyenneController;
use App\Http\Controllers\VeilleCitoyennePrecaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ActualiteController;
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
Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/home/profile', [HomeController::class, 'profile'])->name('profile');
Route::get('/home/users', [HomeController::class, 'allUser'])->name('users');
Route::post('/home/users', [HomeController::class, 'createUser'])->name('create.user');
Route::post('/home/profile/password', [HomeController::class, 'editPassword'])->name('edit.password');
Route::delete('/home/users', [HomeController::class, 'deleteUser'])->name('delete.user');
Route::post('/home/users/role', [HomeController::class, 'setRole'])->name('setRole');
Route::get('/home/veilles', [HomeController::class, 'veilles'])->name('veilles');
Route::get('/home/veilles/status/{slug?}', [HomeController::class, 'statusVeille'])->name('status.veille');
Route::get('/home/forum', [HomeController::class, 'forums'])->name('home.forums');

/**Actualité */
Route::get('/home/actualites', [ActualiteController::class, 'actualites'])->name('home.actualites');
Route::post('/home/actualites', [ActualiteController::class, 'createActualite'])->name('create.actualites');
Route::put('/home/actualites', [ActualiteController::class, 'updateActualite'])->name('update.actualites');
Route::get('/home/actualites/status/{slug?}', [ActualiteController::class, 'statusActualite'])->name('status.actualite');
Route::delete('/home/actualites', [ActualiteController::class, 'deleteActualite'])->name('delete.actualite');


Route::get('actualites', [SiteUrl::class, 'actualites'])->name('actualites');
Route::get('detail/{slug?}', [SiteUrl::class, 'actualiteDetail'])->name('detail');

//Route::get('preca-veille-citoyenne', [SiteUrl::class, 'veilleCitoyennePreca'])->name('veilleCitoyennePreca');
//Route::get('preca-veille-citoyenne/{slug?}', [SiteUrl::class, 'veilleCitoyennePrecaDetail'])->name('veilleCitoyennePrecaDetail');

/**PRéCA */
Route::get('/home/preca', [VeilleCitoyennePrecaController::class, 'index'])->name('preca.index');
Route::post('/home/preca', [VeilleCitoyennePrecaController::class, 'create'])->name('preca.create');
Route::put('/home/preca', [VeilleCitoyennePrecaController::class, 'update'])->name('preca.update');
Route::get('/home/preca/status/{slug?}', [VeilleCitoyennePrecaController::class, 'status'])->name('preca.status');
Route::delete('/home/preca', [VeilleCitoyennePrecaController::class, 'delete'])->name('preca.delete');


Route::get('veille-citoyenne-preca', [SiteUrl::class, 'veilleCitoyennePreca'])->name('veilleCitoyenne.preca');
Route::get('veille-citoyenne-preca/{slug?}', [SiteUrl::class, 'veilleCitoyennePrecaDetail'])->name('precaVeilleDetail');
//Route::resource('preca-veille-citoyenne', VeilleCitoyennePrecaController::class);

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
Route::resource('/veilleCitoyenne', VeilleCitoyenneController::class);
