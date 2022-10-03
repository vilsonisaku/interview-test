<?php

namespace App\Manager;

use App\Mail\UserMail;
use App\ThirdParty\TypiCode;
use Illuminate\Support\Facades\Mail;

class UserManager
{

    public static function sendEmail(){
        $users = TypiCode::fetchUsers();
        $posts = collect(TypiCode::fetchPosts());

        foreach($users as $user){
            $user['posts'] = $posts->where('userId')->take(3)->toArray();
        }

        Mail::to( env('MAIL_TO_ADDRESS') )->send(new UserMail($users));

    }

}
