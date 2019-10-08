<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Model\Post;

class PostController extends Controller
{
    public function getPost($limit = 0, $category = 0)
    {


        $posts = Post::paginate(12);

        return response()->json($posts);
    }
}
