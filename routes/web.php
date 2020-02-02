<?php

Route::get('/', function () {
    return view('welcome');
});


//Route::resource('projects', 'ProjectController');

Route::get('/update/{}','GeneryController@update');
Route::match(['put', 'patch'], 'update/{id}','GeneryController@update');
