<?php
Route::get('/',                ['as' =>'index'       , 'uses' => 'CprController@index'       ]);
Route::get('/filter',          ['as' =>'filter'      , 'uses' => 'CprController@filter'      ]);
Route::get('/consolidate/{id}',['as' =>'consolidate' , 'uses' => 'CprController@consolidate' ]);



Route::group(['prefix' => 'invoices', 'as' => 'invoice.'], function()
{
    Route::get('print/{id}', ['as' =>'print'    , 'uses' => 'InvoiceController@getPrint']);

});

