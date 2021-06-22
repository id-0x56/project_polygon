<?php

namespace App\Actions\Post;

use App\Models\Post;

class PublishPost
{
    public function execute(Post $post)
    {
        $post->published_at = now();
        $post->save();
    }
}
