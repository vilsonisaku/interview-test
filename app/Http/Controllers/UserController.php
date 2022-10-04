<?php

namespace App\Http\Controllers;

use App\Manager\UserManager;
use App\Models\Company;
use Illuminate\Http\Request;

class UserController extends Controller
{

    function sendEmail(){
        
        UserManager::sendEmail();

        return response()->json(['success'=>'email sended']);
    }


    function getCompanies(){
        
        $companies = Company::get();

        return response()->json($companies);
    }

}
