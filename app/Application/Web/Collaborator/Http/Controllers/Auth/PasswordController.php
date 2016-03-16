<?php

namespace App\Application\Web\Collaborator\Http\Controllers\Auth;

use App\Application\Web\Collaborator\Http\Controllers\BaseController;
use Illuminate\Foundation\Auth\ResetsPasswords;

class PasswordController extends BaseController
{
    use ResetsPasswords;

    protected $guard            = 'collaborator';
    protected $broker           = 'collaborator';
    protected $linkRequestView  = 'collaborator::auth.passwords.email';
    protected $resetView        = 'collaborator::auth.passwords.reset';
    protected $redirectTo       = '/collaborator';
    //protected $subject          = 'Link de reset da sua senha';
}