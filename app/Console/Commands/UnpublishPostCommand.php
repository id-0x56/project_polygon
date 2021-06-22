<?php

namespace App\Console\Commands;

use App\Actions\Post\UnpublishPost;
use App\Models\Post;
use Illuminate\Console\Command;

class UnpublishPostCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blog:post-unpublish {post_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Unpublish post by id';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @param UnpublishPost $unpublishPost
     * @return int
     */
    public function handle(UnpublishPost $unpublishPost)
    {
        $post = Post::findOrFail($this->argument('post_id'));

        $unpublishPost->execute($post);

        $this->info("The post #{$post->id} has been unpublished!");

        return 0;
    }
}
