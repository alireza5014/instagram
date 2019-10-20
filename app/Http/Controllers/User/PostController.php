<?php

namespace App\Http\Controllers\User;

use App\classes\UpLoad;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostModifyRequest;
use App\Http\Requests\PostRequest;
use App\Jobs\UploadAlbum;
use App\Jobs\UploadPhoto;
use App\Model\Account;
use App\Model\Category;
use App\Model\Meta;
use App\Model\Post;
use Illuminate\Http\Request;
use Illuminate\Queue\Jobs\Job;
use Mockery\Exception;

class PostController extends Controller
{
    public function list($category_id = 0, Request $request)
    {

        $posts = Post::where('user_id', getUser('id'))
            ->with('category')
            ->with('account')
            ->orderBy('id', 'DESC');


        if ($category_id) {
            $posts = $posts->where('category_id', $category_id)
                ->whereHas('category', function ($q) use ($category_id) {
                    return $q->where('id', $category_id);
                });
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

    public function new($type)
    {
        $categories = Category::get();
        $accounts = Account::where('user_id', getUser('id'))->get();
        $types=['photo','album','video','story','live'];
        $view='user.post.new.photo';
        if(in_array($type,$types)){  $view='user.post.new.'. $type;  }

        return view($view, compact('categories', 'accounts'));



    }

    public function edit($id)
    {
        $categories = Category::get();

        $post = Post::where('user_id', getUser('id'))->with(['metas' => function ($q) {
            return $q->select('post_id', 'key', 'value');

        }])->find($id);

        foreach ($post->metas as $_meta) {
            $meta[$_meta->key] = $_meta->value;
        }

        return view('user.post.edit', compact('post', 'meta', 'categories'));

    }

    public function create(PostCreateRequest $request)
    {

        try {

            $store_path = '/images/posts/';
            $my_image = ['file' => '/images/cover.jpg'];
            if ($request->main_image != "") {
                $image = UpLoad::create('image')
                    ->request($request)
                    ->target('main_image')
                    ->store_path($store_path)
                    ->makeUpload();
                $my_image = ['file' => $image['image_path'][0]];
            }
            $accounts = $request->accounts;
            for ($i = 0; $i < sizeof($accounts); $i++) {
                $post = Post::create(array_merge($my_image, [
                    'category_id' => $request->category_id,
                    'user_id' => getUser('id'),
                    'account_id' => $accounts[$i],

                    'tags' => $request->tags,
                    'sent_at' => $request->sent_at,
                    'caption' => $request->caption,
                ]));


                UploadPhoto::dispatch($post)->delay(now()->addSecond(10));;

            }


        } catch (Exception $exception) {
            return response()->json(['status' => $exception->getMessage()]);

        }

        return response()->json(['status' => 1]);
    }

    public function create_album(PostCreateRequest $request)
    {

        try {

            $store_path = '/images/posts/';
            $my_image = ['file' => '/images/cover.jpg'];
            if ($request->main_image != "") {
                $image = UpLoad::create('image')
                    ->request($request)
                    ->target('main_image')
                    ->store_path($store_path)
                    ->makeUpload();
                $my_image = ['file' => $image['image_path'][0]];
            }
            $accounts = $request->accounts;
            for ($i = 0; $i < sizeof($accounts); $i++) {
                $post = Post::create(array_merge($my_image, [
                    'category_id' => $request->category_id,
                    'user_id' => getUser('id'),
                    'account_id' => $accounts[$i],

                    'tags' => $request->tags,
                    'sent_at' => $request->sent_at,
                    'caption' => $request->caption,
                ]));


                UploadAlbum::dispatch($post)->delay(now()->addSecond(10));;

            }


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
                'category_id' => $request->category_id,

                'title' => $request->title,
                'slug' => str_replace(' ', '-', $request->title),
                'abstract' => $request->abstract,
                'content' => $request['content'],
            ]));


            Meta::where('post_id', $request->id)->where('key', "keywords")->update([

                'value' => $request->keywords
            ]);
            Meta::where('post_id', $request->id)->where('key', "description")->update([

                'value' => $request->description
            ]);

        } catch (Exception $exception) {
            return response()->json(['status' => $exception->getMessage()]);

        }
        return response()->json(['status' => 1]);
    }
}
