<?php

namespace App\Application\Web\User\Http\Controllers;

use App\Domains\User\User;

class HomeController extends BaseController
{

    public function index(User $user)
    {
        return view('user::home', compact('user'));
    }
}

