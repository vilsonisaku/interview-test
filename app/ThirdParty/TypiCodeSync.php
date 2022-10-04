<?php

namespace App\ThirdParty;

use App\Models\Company;
use App\Models\User;
use App\Models\UserAddress;
use App\Models\UserPost;

class TypiCodeSync extends TypiCode
{
    

    public function syncCompanies(){
        Company::insertOrIgnore( $this->users->pluck('company')->all() );
    }



    public function syncUsersData(){
        $companies = Company::get();

        $usersParams = $this->users->map(function($user) use ($companies){ 
            $company = $companies->where('name',$user['company']['name'])->firstOrFail();
            return collect($user)->only(['name','email','phone','username','website'])->put('company_id',$company->id)->put('typi_code_id',$user['id'])->toArray(); 
        });

        User::insertOrIgnore($usersParams->toArray());
    }



    public function syncUsersAddress(){
        $users = User::pluck('id','username');

        $usersAddress=[];

        $this->users->map(function($user) use (&$usersAddress){ 
            $usersAddress[ $user['username'] ] = $user['address'];
        });

        foreach($usersAddress as $username => $userAddress){
            $userAddress['user_id'] = $users->get($username);
            $userAddress['geo_lat'] = $userAddress['geo']['lat'];
            $userAddress['geo_lng'] = $userAddress['geo']['lng'];
            unset($userAddress['geo']);
            $usersAddress[$username] = $userAddress;
        }
        UserAddress::insertOrIgnore( array_values($usersAddress) );
    }


    public function syncUsersPosts(){
        $users = User::pluck('id','typi_code_id');

        $posts=$this->posts->map(function($post) use ($users) {
            $post['user_id'] = $users->get($post['userId']);
            unset($post['userId']);
            return $post;
        })->values();

        UserPost::insertOrIgnore( $posts->toArray() );
    }
}