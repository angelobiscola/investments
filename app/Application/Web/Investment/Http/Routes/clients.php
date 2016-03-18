<?php


Route::get('/',           ['as' =>'index'      , 'uses' => 'ClientController@index']);
Route::get('/create',     ['as' =>'create'     , 'uses' => 'ClientController@create']);
Route::post('/store',     ['as' =>'store'      , 'uses' => 'ClientController@store' ]);
Route::get('/show/{id}',  ['as' =>'show'       , 'uses' => 'ClientController@show'  ]);
Route::get('{id}/edit',   ['as' =>'edit'       , 'uses' => 'ClientController@edit'  ]);
Route::post('{id}/update',['as' =>'update'     , 'uses' => 'ClientController@update']);
Route::get('{id}/delete', ['as' =>'delete'     , 'uses' => 'ClientController@delete']);
Route::get('{id}/investments', ['as' =>'investments', 'uses' => 'ClientController@investments']);


Route::group(['prefix' => 'investments', 'as' => 'investment.'], function()
{
    Route::get('{id}/create', ['as' =>'create'    , 'uses' => 'InvestmentController@create']);
    Route::post('{id}/store', ['as' =>'store'     , 'uses' => 'InvestmentController@store' ]);
    Route::get('/show/{id}',  ['as' =>'show'      , 'uses' => 'InvestmentController@show'  ]);
    Route::get('{id}/edit',   ['as' =>'edit'      , 'uses' => 'InvestmentController@edit'  ]);
    Route::post('{id}/update',['as' =>'update'    , 'uses' => 'InvestmentController@update']);
    Route::get('{id}/delete', ['as' =>'delete'    , 'uses' => 'InvestmentController@delete']);
});