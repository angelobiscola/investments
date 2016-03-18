<?php
Route::get('{id}/edit',   ['as' =>'edit'      , 'uses' => 'CompanyController@edit' ]);
Route::put('{id}/update',['as' =>'update'    , 'uses' => 'CompanyController@update']);




