<?php

namespace App\ThirdParty;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class TypiCode
{
    const ENDPOINT = "https://jsonplaceholder.typicode.com/";


    public static function fetchUsers() {
        $response = (new Client)->get(self::ENDPOINT."users");
        return self::json( $response );
    }


    public static function fetchPosts() {
        $response = (new Client)->get(self::ENDPOINT."posts");
        return self::json( $response );
    }


    public static function json(ResponseInterface $response ) {
        return json_decode( $response->getBody()->getContents() );
    }

}