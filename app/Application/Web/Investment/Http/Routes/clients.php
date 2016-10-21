<?php


Route::get('/'                      ,   ['as' =>'index'                 , 'uses' => 'ClientController@index'                ]);
Route::get('/create'                ,   ['as' =>'create'                , 'uses' => 'ClientController@create'               ]);
Route::post('/store'                ,   ['as' =>'store'                 , 'uses' => 'ClientController@store'                ]);
Route::get('/show/{id}'             ,   ['as' =>'show'                  , 'uses' => 'ClientController@show'                 ]);
Route::get('{id}/edit'              ,   ['as' =>'edit'                  , 'uses' => 'ClientController@edit'                 ]);
Route::put('{id}/update'            ,   ['as' =>'update'                , 'uses' => 'ClientController@update'               ]);
Route::delete('{id}/destroy'        ,   ['as' =>'delete'                , 'uses' => 'ClientController@destroy'              ]);
Route::get('{id}/investments'       ,   ['as' =>'investments'           , 'uses' => 'ClientController@investments'          ]);

Route::group(['prefix' => 'investments', 'as' => 'investment.'], function()
{
    Route::get('{id}/create'        ,   ['as' =>'create'                , 'uses' => 'InvestmentController@create'           ]);
    Route::post('{id}/store'        ,   ['as' =>'store'                 , 'uses' => 'InvestmentController@store'            ]);
    Route::get('/show/{id}'         ,   ['as' =>'show'                  , 'uses' => 'InvestmentController@show'             ]);
    Route::get('{id}/edit'          ,   ['as' =>'edit'                  , 'uses' => 'InvestmentController@edit'             ]);
    Route::post('{id}/update'       ,   ['as' =>'update'                , 'uses' => 'InvestmentController@update'           ]);
    Route::get('{id}/delete'        ,   ['as' =>'delete'                , 'uses' => 'InvestmentController@delete'           ]);
    Route::post('confirm/{id}'      ,   ['as' =>'confirm'               , 'uses' => 'InvestmentController@confirm'          ]);
    Route::get('docs/{id}'          ,   ['as' =>'document'              , 'uses' => 'InvestmentController@document'         ]);

});

Route::group(['prefix' => 'representatives', 'as' => 'representative.'], function()
{
    Route::get('/show/{id}'         ,   ['as' =>'show'                  , 'uses' => 'RepresentativeController@show'         ]);
    Route::post('{id}/store'        ,   ['as' =>'store'                 , 'uses' => 'RepresentativeController@store'        ]);
    Route::delete('{id}/delete'     ,   ['as' =>'delete'                , 'uses' => 'RepresentativeController@destroy'      ]);
});

Route::group(['prefix' => 'banks', 'as' => 'bank.'], function()
{
    Route::get('/show/{id}'         ,   ['as' =>'show'                  , 'uses' => 'BankController@show'                   ]);
    Route::get('{id}/create'        ,   ['as' =>'create'                , 'uses' => 'BankController@create'                 ]);
    Route::get('{id}/edit'          ,   ['as' =>'edit'                  , 'uses' => 'BankController@edit'                   ]);
    Route::post('{id}/store'        ,   ['as' =>'store'                 , 'uses' => 'BankController@store'                  ]);
    Route::delete('{id}/delete'     ,   ['as' =>'delete'                , 'uses' => 'BankController@destroy'                ]);
    Route::put('{id}/update'       ,   ['as' =>'update'                , 'uses' => 'BankController@update'                 ]);

});


Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function()
{
    Route::get('/show/{id}'         ,   ['as' =>'show'                  , 'uses' => 'DashboardController@show'             ]);

});


