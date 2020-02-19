<?php


namespace App\Services;


use App\Repositories\Comments;

class Posts
{
    public function topCommentedPost()
    {
        $commentsRepo = new Comments();
        $allComments = $commentsRepo->get();

        $groupedComments = $allComments->groupBy('postId');

        $maxCommmentCount = 0;
        $maxPostId = null;

        foreach ($groupedComments as $groupedComment) {
            $commentCount = $groupedComment->count();
            if ($commentCount > $maxCommmentCount) {
                $maxCommmentCount = $commentCount;
                $maxPostId = $groupedComment->first()['postId'];
            }
        }

        $postRepo = new \App\Repositories\Posts();

        $post = $postRepo->show($maxPostId);

        $postResource['post_id'] = $maxPostId;
        $postResource['post_title'] = $post['title'];
        $postResource['post_body'] = $post['body'];
        $postResource['total_number_of_comments'] = $maxCommmentCount;

        return $postResource;
    }
}