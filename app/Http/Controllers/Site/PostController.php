<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Post;
use Illuminate\Support\Facades\Input;


class PostController extends Controller
{
    public function getBlog()
    {

        $limit = Input::get('limit', -1);
        $category_slug = Input::get('category_slug', "بلاگ");
        $category = $this->getPost($category_slug, $limit);

        return response()->json(['data' => $category]);
    }


    private function getPost($category_slug, $limit)
    {
        $category = Category::where('slug', $category_slug)->with(['posts' => function ($q) use ($limit) {
        return $q->select('content as abstract_content','content', 'category_id', 'slug', 'id', 'title', 'image_path', 'created_at')->orderBy('id', 'DESC')->limit($limit)->with('metas')->get();




        }])->first();

        return $category;
    }


    public function about_us()
    {
        $about_us = $this->getPost("about_us", 1);
        return response()->json(['data' => $about_us->posts[0]]);

    }

    public function contact_us()
    {
        $contact_us = $this->getPost("contact_us", 1);
        return response()->json(['data' => $contact_us->posts[0]]);

    }


    public function getPostContent()
    {

        $post_slug = Input::get('post_slug');
        $post = Post::with('category')
            ->with('metas')
            ->where('slug', $post_slug)
            ->first();


        return response()->json(['data' => $post, 'meta' => $post->metas]);
    }

}
