<?php

namespace App\Listeners;

use App\Category;
use App\Post;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cache;

class PostCacheListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        
        Cache::forget('posts');    
        $posts = Post::with('category','user')->orderBy('id','desc')->get();
        Cache::forever('posts',$posts);
        
        
    }
}
