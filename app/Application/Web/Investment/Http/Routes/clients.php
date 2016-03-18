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

});