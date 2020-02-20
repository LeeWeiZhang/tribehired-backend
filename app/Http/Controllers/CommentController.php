<?php

namespace App\Http\Controllers;

use App\Services\Comments;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * @var Comments
     */
    protected $commentService;

    public function __construct()
    {
        $this->commentService = new Comments();
    }

    public function index(Request $request)
    {

        $filtered = $request->only(['postId', 'id', 'name', 'email', 'body']);

        $commentResult = $this->commentService->get($filtered);

        return response()->json($commentResult );
    }
}
