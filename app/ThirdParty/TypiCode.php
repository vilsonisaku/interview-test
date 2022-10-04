<?php

namespace App\ThirdParty;

use App\Models\Company;
use App\Models\User;
use App\Models\UserAddress;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Collection;
use Psr\Http\Message\ResponseInterface;

class TypiCode
{
    const ENDPOINT = "https://jsonplaceholder.typicode.com/";

    protected $users;
    protected $posts;

    public function fetchUsers() {
        $response = (new Client)->get(self::ENDPOINT."users");
        $this->users = collect(self::json( $response ));
        return $this;
    }

    public function getUsers(){
        return $this->users;
    }

    public function getPosts(){
        return $this->posts;
    }

    public function fetchPosts() {
        $response = (new Client)->get(self::ENDPOINT."posts");
        $this->posts = collect(self::json( $response ));
        return $this;
    }


    public static function json(ResponseInterface $response ) {
        return json_decode( $response->getBody()->getContents() , true );
    }



}