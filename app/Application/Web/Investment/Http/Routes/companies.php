<?php
Route::get('/',           ['as' =>'index'     , 'uses' => 'CompanyController@index' ]);
Route::get('{id}/edit',   ['as' =>'edit'      , 'uses' => 'CompanyController@edit'  ]);
Route::put('{id}/update', ['as' =>'update'    , 'uses' => 'CompanyController@update']);

Route::group(['prefix' => 'bonds', 'as' => 'bond.'], function()
{
    Route::get('/',           ['as' =>'index'      , 'uses' => 'BondController@index']);
    Route::get('/create',     ['as' =>'create'     , 'uses' => 'BondController@create']);
    Route::post('/store',     ['as' =>'store'      , 'uses' => 'BondController@store']);

});

Route::group(['prefix' => 'billets', 'as' => 'billet.'], function()
{
    Route::get('/',           ['as' =>'index'     , 'uses' => 'BilletController@index']);
    Route::get('/create',     ['as' =>'create'    , 'uses' => 'BilletController@create']);
    Route::post('/store',     ['as' =>'store'     , 'uses' => 'BilletController@store' ]);
    Route::get('/show/{id}',  ['as' =>'show'      , 'uses' => 'BilletController@show'  ]);
    Route::get('{id}/edit',   ['as' =>'edit'      , 'uses' => 'BilletController@edit'  ]);
    Route::post('{id}/update',['as' =>'update'    , 'uses' => 'BilletController@update']);
    Route::get('{id}/delete', ['as' =>'delete'    , 'uses' => 'BilletController@delete']);
});

