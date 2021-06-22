<?php

namespace App\Console\Commands;

use App\Actions\Post\PublishPost;
use App\Models\Post;
use Illuminate\Console\Command;

class PublishPostCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blog:post-publish {post_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish post by id';

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
     * @param PublishPost $publishPost
     * @return int
     */
    public function handle(PublishPost $publishPost)
    {
        $post = Post::findOrFail($this->argument('post_id'));

        $publishPost->execute($post);

        $this->info("The post #{$post->id} has been published!");

        return 0;
    }
}
