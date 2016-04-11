<?php

Route::get('/'                              ,   ['as' =>'index'         ,   'uses' => 'CompanyController@index'                 ]);
Route::get('/create'                        ,   ['as' =>'create'        ,   'uses' => 'CompanyController@create'                ]);
Route::post('/store'                        ,   ['as' =>'store'         ,   'uses' => 'CompanyController@store'                 ]);
Route::get('{id}/edit'                      ,   ['as' =>'edit'          ,   'uses' => 'CompanyController@edit'                  ]);
Route::put('{id}/update'                    ,   ['as' =>'update'        ,   'uses' => 'CompanyController@update'                ]);
Route::delete('{id}/destroy'                ,   ['as' =>'delete'        ,   'uses' => 'CompanyController@destroy'               ]);

Route::group(['prefix' => 'bonds', 'as' => 'bond.'], function()
{
    Route::get('/'                          ,   ['as' =>'index'         ,   'uses' => 'BondController@index'                    ]);
    Route::get('/create'                    ,   ['as' =>'create'        ,   'uses' => 'BondController@create'                   ]);
    Route::post('/store'                    ,   ['as' =>'store'         ,   'uses' => 'BondController@store'                    ]);
    Route::get('available/{id}'             ,   ['as' =>'available'     ,   'uses' => 'BondController@available'                ]);
    Route::get('{id}/edit'                  ,   ['as' =>'edit'          ,   'uses' => 'BondController@edit'                     ]);
    Route::put('{id}/update'                ,   ['as' =>'update'        ,   'uses' => 'BondController@update'                   ]);
    Route::delete('{id}/destroy'            ,   ['as' =>'delete'        ,   'uses' => 'BondController@destroy'                  ]);
    Route::get('investors/{id}'             ,   ['as' =>'investors'     ,   'uses' => 'BondController@investors'                ]);

});

Route::group(['prefix' => 'prospects', 'as' => 'prospect.'], function()
{
    Route::get('/'                          ,   ['as' =>'index'         ,   'uses' => 'ProspectController@index'                ]);
    Route::get('/create'                    ,   ['as' =>'create'        ,   'uses' => 'ProspectController@create'               ]);
    Route::post('/store'                    ,   ['as' =>'store'         ,   'uses' => 'ProspectController@store'                ]);
    Route::get('{id}/edit'                  ,   ['as' =>'edit'          ,   'uses' => 'ProspectController@edit'                 ]);
    Route::put('{id}/update'                ,   ['as' =>'update'        ,   'uses' => 'ProspectController@update'               ]);
    Route::delete('{id}/destroy'            ,   ['as' =>'delete'        ,   'uses' => 'ProspectController@destroy'              ]);

});

Route::group(['prefix' => 'billets', 'as' => 'billet.'], function()
{
    Route::get('/'                          ,   ['as' =>'index'         ,   'uses' => 'BilletController@index'                  ]);
    Route::get('/create'                    ,   ['as' =>'create'        ,   'uses' => 'BilletController@create'                 ]);
    Route::post('/store'                    ,   ['as' =>'store'         ,   'uses' => 'BilletController@store'                  ]);
    Route::get('/show/{id}'                 ,   ['as' =>'show'          ,   'uses' => 'BilletController@show'                   ]);
    Route::get('{id}/edit'                  ,   ['as' =>'edit'          ,   'uses' => 'BilletController@edit'                   ]);
    Route::put('{id}/update'                ,   ['as' =>'update'        ,   'uses' => 'BilletController@update'                 ]);
    Route::delete('{id}/destroy'            ,   ['as' =>'delete'        ,   'uses' => 'BilletController@destroy'                ]);
});


Route::group(['prefix' => 'representatives', 'as' => 'representative.'], function()
{
    Route::get('{id}/create'                ,   ['as' =>'create'        ,   'uses' => 'CompanyController@representative'        ]);
    Route::post('{id}/store'                ,   ['as' =>'store'         ,   'uses' => 'CompanyController@addRepresentative'     ]);
    Route::delete('{id}/delete'             ,   ['as' =>'delete'        ,   'uses' => 'CompanyController@removeRepresentative'  ]);
});


Route::group(['prefix' => 'logos', 'as' => 'logo.'], function()
{
    Route::get('{id}/create'                ,   ['as' =>'create'                , 'uses' => 'LogoController@create'  ]);
    Route::post('{id}/upload'               ,   ['as' =>'upload'                , 'uses' => 'LogoController@upload'  ]);
    Route::get('/download/{id}'             ,   ['as' =>'download'              , 'uses' => 'LogoController@download']);
    Route::get('{id}/edit'                  ,   ['as' =>'edit'                  , 'uses' => 'LogoController@edit'    ]);
    Route::put('{id}/update'                ,   ['as' =>'update'                , 'uses' => 'LogoController@update'  ]);
    Route::delete('{id}/destroy'            ,   ['as' =>'delete'                , 'uses' => 'LogoController@destroy' ]);
});


