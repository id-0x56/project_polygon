<?php

namespace App\Actions\Post;

use App\Models\Post;

class UnpublishPost
{
    public function execute(Post $post)
    {
        $post->published_at = null;
        $post->save();
    }
}
