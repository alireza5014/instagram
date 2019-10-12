<?php

namespace App\Http\Controllers\User;

use App\classes\UpLoad;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostModifyRequest;
use App\Http\Requests\PostRequest;
use App\Model\Meta;
use App\Model\Post;
use Illuminate\Http\Request;
use Mockery\Exception;

class PostController extends Controller
{
    public function list($category_id = 0, Request $request)
    {

        $posts = Post::with('metas')
            ->withCount('comments')
            ->withCount('likes')
            ->with('category')
            ->orderBy('id', 'DESC');


        if ($category_id) {
            $posts = $posts->where('category_id', $category_id);
        }
        $posts = $posts->paginate(20);

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

    public function edit($id)
    {
      return   $post = Post::where('user_id', getUser('id'))->with(['metas'=>function($q){
          return $q->select('post_id','key','value');
      }])->find($id);
        return view('user.post.edit', compact('post'));

    }

    public function create(PostCreateRequest $request)
    {
        try {

            $store_path = '/images/posts/';
            $my_image = ['image_path' => '/images/cover.jpg'];
            if ($request->main_image != "") {
                $image = UpLoad::create('image')
                    ->request($request)
                    ->target('main_image')
                    ->store_path($store_path)
//            ->watermark_path('watermark_logo.png')
//            ->resizePercentage(80)
//            ->resize_percent(75)
                    ->makeUpload();
                $my_image = ['image_path' => $image['image_path'][0]];
            }
            $post = Post::create(array_merge($my_image, [
                'category_id' => 2,
                'user_id' => getUser('id'),
                'title' => $request->title,
                'slug' => str_replace(' ', '-', $request->title),
                'abstract' => $request->abstract,
                'content' => $request['content'],
            ]));
            Meta::create([
                'post_id' => $post->id,
                'key' => "keywords",
                'value' => $request->keywords,
            ]);

            Meta::create([
                'post_id' => $post->id,
                'key' => "description",
                'value' => $request->description,
            ]);
        } catch (Exception $exception) {
            return response()->json(['status' => $exception->getMessage()]);

        }
        return response()->json(['status' => 1]);
    }

    public function modify(PostModifyRequest $request)
    {
        try {

            $store_path = '/images/posts/';

            $my_image = [];
            if ($request->main_image != "") {
                $image = UpLoad::create('image')
                    ->request($request)
                    ->target('main_image')
                    ->store_path($store_path)
                    ->makeUpload();
                $my_image = ['image_path' => $image['image_path'][0]];
            }
            Post::where('id', $request->id)->where('user_id', getUser('id'))->update(array_merge($my_image, [
                'category_id' => 2,
                'title' => $request->title,
                'slug' => str_replace(' ', '-', $request->title),
                'abstract' => $request->abstract,
                'content' => $request['content'],
            ]));
            Meta::where('post_id' , $request->id)->where('key' , "keywords")->update([

                'value' => $request->keywords
            ]);
            Meta::where('post_id' , $request->id)->where('key' , "description")->update([

                'value' => $request->description
            ]);

        } catch (Exception $exception) {
            return response()->json(['status' => $exception->getMessage()]);

        }
        return response()->json(['status' => 1]);
    }
}
