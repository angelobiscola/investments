<?php
Route::get('/',                ['as' =>'index'       , 'uses' => 'CprController@index'       ]);
Route::get('/filter',          ['as' =>'filter'      , 'uses' => 'CprController@filter'      ]);
Route::get('/consolidate/{id}',['as' =>'consolidate' , 'uses' => 'CprController@consolidate' ]);


Route::group(['prefix' => 'invoices', 'as' => 'invoice.'], function()
{
    Route::get('print/{id}', ['as' =>'print'    , 'uses' => 'InvoiceController@getPrint']);

});


Route::group(['prefix' => 'receipts', 'as' => 'receipt.'], function()
{
    Route::get('{id}/create'                ,   ['as' =>'create'                , 'uses' => 'ReceiptController@create'  ]);
    Route::post('{id}/upload'               ,   ['as' =>'upload'                , 'uses' => 'ReceiptController@upload'  ]);
    Route::get('/download/{id}'             ,   ['as' =>'download'              , 'uses' => 'ReceiptController@download']);
    Route::get('{id}/edit'                  ,   ['as' =>'edit'                  , 'uses' => 'ReceiptController@edit'    ]);
    Route::put('{id}/update'                ,   ['as' =>'update'                , 'uses' => 'ReceiptController@update'  ]);
    Route::delete('{id}/destroy'            ,   ['as' =>'delete'                , 'uses' => 'ReceiptController@destroy' ]);
});



