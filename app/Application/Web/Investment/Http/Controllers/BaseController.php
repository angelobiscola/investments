<?php
namespace App\Application\Web\Investment\Http\Controllers;

use App\Core\Http\Controllers\Controller;

class BaseController extends Controller
{
     protected $user;
     protected $company;

     public function __construct()
     {
         $this->user     = \Auth::guard('collaborator')->user();
         $this->company  = (session('company'));
     }

     public function getUser()
     {
        return $this->user;
     }

     public function getCompany()
     {
        return $this->company;
     }
}

