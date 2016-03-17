<?php
Route::get('/',           ['as' =>'index'      , 'uses' => 'PersonController@index']);
Route::get('/create',     ['as' =>'create'     , 'uses' => 'PersonController@create']);
Route::post('/store',     ['as' =>'store'      , 'uses' => 'PersonController@store' ]);
Route::get('/show/{id}',  ['as' =>'show'       , 'uses' => 'PersonController@show'  ]);
Route::get('{id}/edit',   ['as' =>'edit'       , 'uses' => 'PersonController@edit'  ]);
Route::post('{id}/update',['as' =>'update'     , 'uses' => 'PersonController@update']);
Route::get('{id}/delete', ['as' =>'delete'     , 'uses' => 'PersonController@delete']);
Route::get('{id}/investments', ['as' =>'investments', 'uses' => 'PersonController@investments']);



Route::group(['prefix' => 'investments', 'as' => 'investment.'], function()
{
    Route::get('{id}/create', ['as' =>'create'    , 'uses' => 'InvestmentController@create']);
    Route::post('{id}/store', ['as' =>'store'     , 'uses' => 'InvestmentController@store' ]);
    Route::get('/show/{id}',  ['as' =>'show'      , 'uses' => 'InvestmentController@show'  ]);
    Route::get('{id}/edit',   ['as' =>'edit'      , 'uses' => 'InvestmentController@edit'  ]);
    Route::post('{id}/update',['as' =>'update'    , 'uses' => 'InvestmentController@update']);
    Route::get('{id}/delete', ['as' =>'delete'    , 'uses' => 'InvestmentController@delete']);
});