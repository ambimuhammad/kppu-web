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

// Route::get('/', function () {
//     return redirect(route('login'));
// });
Auth::routes();
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', 'Backend\Dashboard\DashboardController@index')->name('dashboard');
    Route::group(['middleware' => ['role_or_permission:admin|edit users']], function () {
        Route::resource('/role', 'Backend\Role\RoleController')->except([
            'create', 'show', 'edit', 'update'
        ]);
        Route::resource('/users', 'Backend\User\UserController')->except([
            'show'
        ]);
        Route::resource('/slider', 'Backend\Slider\SliderController');
        Route::get('/users/roles/{id}', 'Backend\User\UserController@roles')->name('users.roles');
        Route::put('/users/roles/{id}', 'Backend\User\UserController@setRole')->name('users.set_role');
        Route::post('/users/permission', 'Backend\User\UserController@addPermission')->name('users.add_permission');
        Route::get('/users/role-permission', 'Backend\User\UserController@rolePermission')->name('users.roles_permission');
        Route::put('/users/permission/{role}', 'Backend\User\UserController@setRolePermission')->name('users.setRolePermission');
    });

    Route::group(['middleware' => ['role:admin|user|contributor']], function () {
        Route::resource('/artikel', 'Backend\Artikel\ArtikelController');
        Route::resource('/kategori', 'Backend\Kategori\KategoriController');
        Route::resource('/tag', 'Backend\Tag\TagController');
    });
});
