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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contuct/message/view','HomeController@contuctmessageview');
Route::get('/delete/contuct/message/{id}','HomeController@deletecontuctmessage');
Route::get('/delete/contuct/message/view/page','HomeController@view');
Route::get('/contuct/message/restore/{id}','HomeController@restore');
Route::get('/contuct/message/force/delete/{id}','HomeController@forsedelete');
// page controller
Route::get('/','PageController@index');
Route::get('/details/{id}','PageController@details');
Route::get('/future/details/{id}','PageController@futuredetails');
Route::get('/collection/wise/product/{id}','PageController@collection');
Route::get('/add/contuct','PageController@contuct');
Route::post('/contuct/insert','PageController@contuctinsert');
Route::get('/add/to/card/{id}','PageController@addtocard');
Route::get('card','PageController@card');
Route::get('/delete/form/card/{id}','PageController@deleteformcard');



//Admin Product
Route::get('/admin/add','AdminPageController@index');

//user controller
Route::get('/all/user','UserController@index');
Route::get('/all/user/soft/delete/{id}','UserController@softdelete');
Route::get('/all/user/delete/view','UserController@view');
Route::get('/all/user/delete/restore/{id}','UserController@restore');
Route::get('/all/user/edit/{id}','UserController@edit');
Route::post('/all/user/update/{id}','UserController@update');
Route::get('/all/user/force/delete/{id}','UserController@forcedelete');

//product controller
Route::get('/product/view','ProductController@index');
Route::get('/product/create','ProductController@crated');
Route::post('add/product/insert','ProductController@addproductinsert');
Route::get('delete/product/{id}','ProductController@deleteproduct');
Route::get('/product/view/delete','ProductController@deleteproductview');
Route::get('/product/view/delete/restore/{id}','ProductController@restoreproductview');
Route::get('/product/edit/{id}','ProductController@edit');
Route::post('/product/update/{id}','ProductController@productupdate');
Route::get('/product/parmanently/delete/{id}','ProductController@parmanentlydelete');

//future product
Route::get('/future/product/view','FutureProductController@index');
Route::get('/future/product/create','FutureProductController@productcreate');
Route::post('/future/product/insert','FutureProductController@productinsert');
Route::get('/future/product/delete/{id}','FutureProductController@productdelete');
Route::get('/future/view/product/informetion','FutureProductController@view');
Route::get('/future/view/product/restore/{id}','FutureProductController@restore');
Route::get('/future/view/product/edit/{id}','FutureProductController@edit');
Route::post('/future/view/product/update/{id}','FutureProductController@update');
Route::get('/future/view/premanently/delete/{id}','FutureProductController@parmanentlydelete');

//category
Route::get('/add/category/view','CategoryController@index');
Route::get('/add/category/categoryadd','CategoryController@add');
Route::post('/add/category/insert/form','CategoryController@addcategoryform');
Route::get('/add/category/edit/form/{id}','CategoryController@categoryeditform');
Route::post('/category/edit/update/form/{id}','CategoryController@update');
Route::get('/add/category/change/{id}','CategoryController@exchange');
Route::get('/category/soft/delete/{id}','CategoryController@softdelete');
Route::get('/delete/category/view','CategoryController@deletecategoryview');
Route::get('/delete/category/restore/{id}','CategoryController@restore');
Route::get('/delete/category/force/{id}','CategoryController@forsedelete');




