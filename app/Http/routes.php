<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'home\IndexController@index');
Route::get('/cate/{cate_id}', 'home\IndexController@cate');
Route::get('/article/{art_id}', 'home\IndexController@article');


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::match(['post','get'],'/admin/login','admin\LoginController@login');
	Route::get('/admin/code','admin\LoginController@code');

});

Route::group(['prefix'=>'admin','namespace'=>'admin','middleware' => ['web','islogin']], function () {
	Route::get('index','IndexController@index');
	Route::get('info','IndexController@info');
	Route::get('quit','IndexController@quit');
	Route::any('pass','IndexController@pass');
	//分类资源路由
	Route::resource('category','CategoryController');
    //分类排序路由
	Route::post('cate/changeorder','CategoryController@changeOrder');

	//文章资源路由
	Route::resource('article','ArticleController');
	
	//友情链接资源路由
	Route::resource('links','LinksController');
	//友情链接排序路由
	Route::post('links/changeorder','LinksController@changeOrder');

	//自定义导航资源路由
	Route::resource('navs','NavsController');
	//自定义导航排序路由
	Route::post('navs/changeorder','NavsController@changeOrder');
	
	// 配置项写入文件putfile ，注意：该路由要放在资源路由前面，否则会和资源路由中的show()冲突
	Route::get('config/putfile','ConfigController@putConfigFile');
	//配置项资源路由
	Route::resource('config','ConfigController');
	// 配置项修改changeContent
	Route::post('config/changecontent','ConfigController@changeContent');
	//配置项排序路由
	Route::post('config/changeorder','ConfigController@changeOrder');


	Route::any('upload','CommController@upload');
});
