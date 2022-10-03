<?php

namespace App\Http\Controllers;

use App\Manager\UserManager;
use Illuminate\Http\Request;

class UserController extends Controller
{

    function sendEmail(){
        
        UserManager::sendEmail();

        return response()->json(['success'=>'email sended']);
    }
    
}
