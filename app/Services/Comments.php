<?php


namespace App\Services;


use App\Repositories\Comments as CommentsRepo;

class Comments
{
    public function get($query = [])
    {
        $repo = new CommentsRepo();
        $comments = $repo->get();

        $filtered = $comments->filter(function ($comment) use ($query) {
            foreach ($query as $key => $condition) {
                if ($comment[$key] == $condition) {
                    return true;
                }
            }
            return false;
        });

        return $filtered;
    }

}