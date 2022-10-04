<?php

namespace App\Manager;

use App\Mail\UserMail;
use App\Models\Company;
use App\Models\User;
use App\Models\UserAddress;
use App\Models\UserPost;
use App\ThirdParty\TypiCode;
use App\ThirdParty\TypiCodeSync;
use Illuminate\Support\Facades\Mail;

class UserManager
{

    public static function sendEmail(){

        Mail::to( env('MAIL_TO_ADDRESS') )->send( new UserMail() );
    }


    /*
    *   sync: users data , company, users address . into DB
    */
    public static function syncUsersDB(){
        $typiCode = new TypiCodeSync;
        $typiCode->fetchUsers();
        $typiCode->syncCompanies();
        $typiCode->syncUsersData();
        $typiCode->syncUsersAddress();
    }


    public static function syncPostsDB(){
        $typiCode = new TypiCodeSync;
        $typiCode->fetchPosts();
        $typiCode->syncUsersPosts();
    }



}
