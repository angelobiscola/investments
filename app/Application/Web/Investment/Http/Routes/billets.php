<?php

Route::get('/',           ['as' =>'index'     , 'uses' => 'BilletController@index']);
Route::get('/create',     ['as' =>'create'    , 'uses' => 'BilletController@create']);
Route::post('/store',     ['as' =>'store'     , 'uses' => 'BilletController@store' ]);
Route::get('/show/{id}',  ['as' =>'show'      , 'uses' => 'BilletController@show'  ]);
Route::get('{id}/edit',   ['as' =>'edit'      , 'uses' => 'BilletController@edit'  ]);
Route::post('{id}/update',['as' =>'update'    , 'uses' => 'BilletController@update']);
Route::get('{id}/delete', ['as' =>'delete'    , 'uses' => 'BilletController@delete']);



Route::group(['prefix' => 'info', 'as' => 'info.'], function()
{
    Route::get('{id}/create', ['as' =>'create'    , 'uses' => 'InfoController@create']);
    Route::post('{id}/store', ['as' =>'store'     , 'uses' => 'InfoController@store' ]);
    Route::get('/show/{id}',  ['as' =>'show'      , 'uses' => 'InfoController@show'  ]);
    Route::get('{id}/edit',   ['as' =>'edit'      , 'uses' => 'InfoController@edit'  ]);
    Route::post('{id}/update',['as' =>'update'    , 'uses' => 'InfoController@update']);
    Route::get('{id}/delete', ['as' =>'delete'    , 'uses' => 'InfoController@delete']);
});

