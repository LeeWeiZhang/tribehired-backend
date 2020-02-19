<?php


namespace App\Repositories;


class Comments
{
    public function get()
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://jsonplaceholder.typicode.com/comments');

        if ($response->getStatusCode() != 200) {

            return collect();
        }

        $jsonResponse = $response->getBody();
        $comments = json_decode($jsonResponse, true);

        return collect($comments);
    }

}