<?php

Route::get('/cnpj',           ['as' =>'cnpj'     , 'uses' => 'ApiController@getCnpj'    ]);
Route::get('/cpf',            ['as' =>'cpf'      , 'uses' => 'ApiController@getCpf'     ]);
Route::get('/captchacpf',     ['as' =>''         , 'uses' => 'ApiController@captchaCpf' ]);
Route::get('/captchacnpj',    ['as' =>''         , 'uses' => 'ApiController@captchaCnpj']);
Route::get('/getboleto',      ['as' =>''         , 'uses' => 'ApiController@getBoleto']);



Route::group(['prefix' => 'clients', 'as' => 'client.'], function()
{
    Route::group(['prefix' => 'physicals', 'as' => 'physical.'], function()
    {

        Route::get('findcpf',           ['as' =>'findcpf'     , 'uses' => 'PhysicalController@findcpf'    ]);

    });


});
