<?php
Route::get('/',           ['as' =>'index'     , 'uses' => 'CompanyController@index']);
Route::get('/create',     ['as' =>'create'    , 'uses' => 'CompanyController@create']);
Route::post('/store',     ['as' =>'store'     , 'uses' => 'CompanyController@store' ]);
Route::get('/show/{id}',  ['as' =>'show'      , 'uses' => 'CompanyController@show'  ]);
Route::get('{id}/edit',   ['as' =>'edit'      , 'uses' => 'CompanyController@edit'  ]);
Route::post('{id}/update',['as' =>'update'    , 'uses' => 'CompanyController@update']);
Route::get('{id}/delete', ['as' =>'delete'    , 'uses' => 'CompanyController@delete']);



