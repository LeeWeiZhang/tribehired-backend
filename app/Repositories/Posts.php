<?php


namespace App\Repositories;


use GuzzleHttp\Client as RequestClient;

class Posts
{

    public function show($postId)
    {
        $client = new RequestClient();
        $response = $client->request('GET', "https://jsonplaceholder.typicode.com/posts/{$postId}");

        if ($response->getStatusCode() != 200) {

            return collect();
        }

        $jsonResponse = $response->getBody();
        $post = json_decode($jsonResponse, true);

        return $post;
    }

}