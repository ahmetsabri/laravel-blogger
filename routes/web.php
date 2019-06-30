<?php



Route::get('/', function () {
    return view('home');
});

Route::group(['prefix'=>'admin','middleware'=>['auth']],function(){
        Route::get('/',function(){
          return view('admin.home');
        });

        Route::get('new-role','RolesController@viewNewRole');
        Route::post('create-role','RolesController@newRole');
        Route::get('new-admin','AdminController@viewNewAdmin');
        Route::post('create-admin','AdminController@createNewAdmin');
        Route::post('search-user','AdminController@searchUser');
        Route::post('add-role','AdminController@addRole');

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
