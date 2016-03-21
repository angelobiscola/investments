<?php


Route::group(['prefix' => 'info', 'as' => 'info.'], function()
{
    Route::get('{id}/create', ['as' =>'create'    , 'uses' => 'InfoController@create']);
    Route::post('{id}/store', ['as' =>'store'     , 'uses' => 'InfoController@store' ]);
    Route::get('/show/{id}',  ['as' =>'show'      , 'uses' => 'InfoController@show'  ]);
    Route::get('{id}/edit',   ['as' =>'edit'      , 'uses' => 'InfoController@edit'  ]);
    Route::post('{id}/update',['as' =>'update'    , 'uses' => 'InfoController@update']);
    Route::get('{id}/delete', ['as' =>'delete'    , 'uses' => 'InfoController@delete']);
});

