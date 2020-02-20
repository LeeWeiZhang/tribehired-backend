<?php

namespace App\Http\Controllers;

use App\Services\Posts;

class PostController extends Controller
{
    /**
     * @var Posts
     */
    private $postsService;

    public function __construct()
    {
        $this->postsService = new Posts();
    }

    public function index()
    {
        $topComment = $this->postsService->topCommentedPost();

        return response()->json($topComment);
    }
}
