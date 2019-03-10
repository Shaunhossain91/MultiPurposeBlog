<?php



Route::Group(['namespace' => 'User'],function(){
    Route::get('/','HomeController@index');
    Route::get('posts/{slug}', 'PostController@post')->name('post');
    Route::get('posts/tag/{tag}','HomeController@tag')->name('tag');
    Route::get('posts/category/{category}','HomeController@category')->name('category');

});





Route::Group(['namespace' => 'Admin','middleware' => 'auth:admin'], function(){
    Route::get('admin/home','HomeController@home')->name('admin.home');
    Route::resource('admin/post','PostController');
    Route::resource('admin/tag','TagController');
    Route::resource('admin/category','CategoryController');
    Route::resource('admin/user','UserController');
    Route::resource('admin/role','RoleController');
    Route::resource('admin/permission','PermissionController');


});

Route::Group(['namespace' => 'Admin'], function(){


    Route::get('admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('admin-login', 'Auth\LoginController@login');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
