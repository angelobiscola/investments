<?php
Route::get('/',           ['as' =>'index'     , 'uses' => 'CprController@index' ]);





Route::group(['prefix' => 'invoices', 'as' => 'invoice.'], function()
{
    Route::get('print/{id}', ['as' =>'print'    , 'uses' => 'InvoiceController@getPrint']);

});

