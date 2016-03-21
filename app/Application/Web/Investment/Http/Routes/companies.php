<?php
Route::get('/',           ['as' =>'index'     , 'uses' => 'CompanyController@index' ]);
Route::get('{id}/edit',   ['as' =>'edit'      , 'uses' => 'CompanyController@edit'  ]);
Route::put('{id}/update', ['as' =>'update'    , 'uses' => 'CompanyController@update']);

Route::group(['prefix' => 'bonds', 'as' => 'bond.'], function()
{
    Route::get('/',             ['as' =>'index'      , 'uses' => 'BondController@index']);
    Route::get('/create',       ['as' =>'create'     , 'uses' => 'BondController@create']);
    Route::post('/store',       ['as' =>'store'      , 'uses' => 'BondController@store']);
    Route::get('available/{id}',['as' =>'available'  , 'uses' => 'BondController@available']);

});

Route::group(['prefix' => 'prospects', 'as' => 'prospect.'], function()
{
    Route::get('/',           ['as' =>'index'      , 'uses' => 'ProspectController@index']);
    Route::get('/create',     ['as' =>'create'     , 'uses' => 'ProspectController@create']);
    Route::post('/store',     ['as' =>'store'      , 'uses' => 'ProspectController@store']);

});

Route::group(['prefix' => 'billets', 'as' => 'billet.'], function()
{
    Route::get('/'                  ,     ['as' =>'index'     , 'uses' => 'BilletController@index'          ]);
    Route::get('/create'            ,     ['as' =>'create'    , 'uses' => 'BilletController@create'         ]);
    Route::post('/store'            ,     ['as' =>'store'     , 'uses' => 'BilletController@store'          ]);
    Route::get('/show/{id}'         ,     ['as' =>'show'      , 'uses' => 'BilletController@show'           ]);
    Route::get('{id}/edit'          ,     ['as' =>'edit'      , 'uses' => 'BilletController@edit'           ]);
    Route::post('{id}/update'       ,     ['as' =>'update'    , 'uses' => 'BilletController@update'         ]);
    Route::delete('{id}/destroy'    ,     ['as' =>'delete'    , 'uses' => 'BilletController@destroy'        ]);
});

