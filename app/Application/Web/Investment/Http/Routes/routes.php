<?php

Route::get('/', ['middleware' => ['auth:collaborator'],'as' =>'home.index', 'uses' => 'HomeController@index']);



