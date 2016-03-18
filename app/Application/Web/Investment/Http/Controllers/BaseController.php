<?php
namespace App\Application\Web\Investment\Http\Controllers;

use App\Core\Http\Controllers\Controller;
use App\Domains\Company\Company;

class BaseController extends Controller
{
     protected $user;
     protected $company;

     public function __construct()
     {
         $this->user     = \Auth::guard('collaborator')->user();
         $this->company  = Company::find(1);
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

