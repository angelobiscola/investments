<?php

Route::get('{id}/edit',       ['as' =>'edit'     , 'uses' => 'InformationController@edit'    ]);
Route::put('{id}/update',     ['as' =>'update'   , 'uses' => 'InformationController@update'  ]);
