<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::find(1);
        $comment = $post->comments;
        //dd($comment);
        print_r($comment);

        $comment = Comment::find(1);
        $post = $comment->post;
        dd($post);
    }
    public function addPost()
    {
    }
}
