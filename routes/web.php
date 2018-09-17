<?php

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
    return view('welcome', [
    	'articles' => \App\Article::latest()->wherePublished("1")->take(6)->get()
    ]);
});

Auth::routes();
Route::match(['post', 'get'], 'register', function(){
	Auth::logout();
	return redirect('/');
})->name('register');

Route::get('/home', 'HomeController@index')->name('home');




// AsAdmin
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth'] ], function () {
   Route::get('/', 'DashboardController@dashboard')->name('admin.index');
   Route::resource('/category', 'CategoryController', ['as'=>'admin']);
   Route::resource('/article', 'ArticleController', ['as'=>'admin']);
});


Route::get('/article/{slug}', 'PageController@articleShow')->name('articleShow');
Route::get('/articles', 'PageController@articles')->name('articles');
Route::get('/tag/{tag}', 'PageController@tag')->name('tag');
Route::get('/category/{slug}', 'PageController@category')->name('category');


Route::post('/uploadfile', 'HomeController@uploadfile')->name('uploadFile');
Route::get('/files', 'HomeController@files')->name('files');
Route::post('/uploadphoto', 'HomeController@uploadphoto')->name('uploadImage');
Route::get('/photos', 'HomeController@photos')->name('images');