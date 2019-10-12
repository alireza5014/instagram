<?php

namespace App\Http\Controllers\User;

use App\Model\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function list(Request $request)
    {
        $posts= Post::with('metas')
            ->withCount('comments')
            ->withCount('likes')
            ->with('category')
            ->paginate(20);
        if ($request->ajax()) {
            try {
                return view('user.post.table', compact('posts'))->render();
            } catch (\Throwable $e) {
            }
        }
        return view('user.post.list', compact('posts'));
    }

    public function new()
    {
        return view('user.post.new');

    }
}
