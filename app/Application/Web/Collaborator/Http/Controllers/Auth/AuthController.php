<?php

namespace App\Application\Web\Collaborator\Http\Controllers\Auth;

use App\Application\Web\Collaborator\Http\Controllers\BaseController;
use App\Domains\Collaborator\Collaborator;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends BaseController
{

    use AuthenticatesAndRegistersUsers;

    protected $guard                = 'collaborator';
    protected $redirectTo           = '/collaborator';
    protected $redirectAfterLogout  = '/collaborator';
    protected $loginView            = 'collaborator::auth.login';
    protected $registerView         = 'collaborator::auth.register';
    protected $collaborator;

    public function __construct(Collaborator $collaborator)
    {
        $this->middleware('guest:'.$this->guard, ['except' => 'logout']);
        $this->collaborator = $collaborator;
    }


    protected function validator(array $data)
    {
        return \Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    protected function create(array $data)
    {
        return $this->collaborator->create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
        ]);
    }

    public function verify($username, $password)
    {
        $credentials = [
            'email'    => $username,
            'password' => $password,
        ];

        if (\Auth::guard($this->guard)->once($credentials)) {
            return \Auth::guard($this->guard)->user()->id;
        }
        return false;
    }

}
