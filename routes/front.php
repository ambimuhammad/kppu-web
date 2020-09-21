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

Route::get('/', 'Frontend\FrontController@index')->name('front.index');
Route::get('/portfolio/{id}', 'Frontend\FrontController@singleRecentWork')->name('front.singlework');
Route::get('/artikels', 'Frontend\FrontController@artikel')->name('front.artikel');
Route::get('/artikels/{slug}', 'Frontend\FrontController@singleArtikel')->name('front.singleartikel');
Route::get('/contact', 'Frontend\FrontController@contact')->name('front.contact');
Route::get('/about/{slug}', 'Frontend\FrontController@about')->name('front.about');
Route::get('/about/{slug}', 'Frontend\FrontController@about')->name('front.about');
Route::get('/services/{slug}', 'Frontend\FrontController@service')->name('front.service');
Route::get('/project-gallery', 'Frontend\FrontController@project')->name('front.project');
Route::get('/product/kategori/{kategori_name}', 'Frontend\FrontController@product')->name('front.product');
