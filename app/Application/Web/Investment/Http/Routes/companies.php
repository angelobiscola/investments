<?php
Route::get('{id}/edit',   ['as' =>'edit'      , 'uses' => 'CompanyController@edit' ]);
Route::put('{id}/update',['as' =>'update'    , 'uses' => 'CompanyController@update']);



Route::group(['prefix' => 'bonds', 'as' => 'bond.'], function()
{
    Route::get('/',           ['as' =>'index'      , 'uses' => 'BondController@index']);
    Route::get('/create',     ['as' =>'create'     , 'uses' => 'BondController@create']);

});


