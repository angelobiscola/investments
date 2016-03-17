<?php

Route::get('/cnpj',           ['as' =>'cnpj'     , 'uses' => 'ApiController@getCnpj'    ]);
Route::get('/cpf',            ['as' =>'cpf'      , 'uses' => 'ApiController@getCpf'     ]);
Route::get('/captchacpf',     ['as' =>''         , 'uses' => 'ApiController@captchaCpf' ]);
Route::get('/captchacnpj',    ['as' =>''         , 'uses' => 'ApiController@captchaCnpj']);
Route::get('/getboleto',      ['as' =>''         , 'uses' => 'ApiController@getBoleto']);