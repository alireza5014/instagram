<?php

namespace App\Http\Controllers\User;

use App\classes\UpLoad;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostModifyRequest;
use App\Http\Requests\PostRequest;
use App\Http\Requests\UploadVideoRequest;
use App\Jobs\UploadAlbum;
use App\Jobs\UploadPhoto;
use App\Jobs\UploadVideo;
use App\Model\Media;
use App\Model\Account;
use App\Model\Category;
use App\Model\Meta;
use App\Model\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Queue\Jobs\Job;
use Illuminate\Support\Facades\Validator;
use Mockery\Exception;

class PostController extends Controller
{
    public function list($category_id = 0, Request $request)
    {


        $posts = Post::where('user_id', getUser('id'))
            ->with('category')
            ->with('account')
            ->with('medias')
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
        $types = ['photo', 'album', 'video', 'story', 'live'];
        $view = 'user.post.new.photo';
        if (in_array($type, $types)) {
            $view = 'user.post.new.' . $type;
        }

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

    public function create($type, PostCreateRequest $request)
    {

        $send_at = Carbon::now()->addMinute($request->sent_at);
        $filepath = explode(',', $request->filepath);
        if (sizeof($filepath) > 1) {
            $this->create_album(1,$filepath,$send_at,$request);

        } else {
            $this->create_photo(2,$filepath,$send_at, $request);

        }

//        $types = ['photo', 'album', 'video', 'story', 'live'];

//        $category_id = array_search($type, $types) + 1;
//        switch ($type) {
//            case "photo":
//                $this->create_photo($category_id, $request);
//                break;
//
//            case "album":
//                $this->create_album($category_id, $request);
//                break;
//
//
//        }
    }

    private function create_photo($category_id,$filepath,$sent_at, $request)
    {

        try {


            $accounts = $request->accounts;

            for ($i = 0; $i < sizeof($accounts); $i++) {
                $post = Post::create([

                    'category_id' => $category_id,
                    'user_id' => getUser('id'),
                    'account_id' => $accounts[$i],
                    'tags' => $request->tags,
                    'sent_at' => $sent_at,
                    'caption' => $request->caption,
                ]);

                $media = new Media;
                $media->file = $filepath[0];
                $media->type = "photo";
                $medias = $media;

                $post->medias()->save($medias);


                $posts[$i] = Post::where('id', $post->id)->with(['media' => function ($q) {
                    return $q->select('post_id', 'type', 'file');
                }])->with('account')->first();

                file_put_contents('post.txt', \GuzzleHttp\json_encode($posts));
                UploadPhoto::dispatch($posts[$i])->delay(now()->addSecond($request->sent_at));;

            }


        } catch (Exception $exception) {
            return response()->json(['status' => 0, 'message' => $exception->getMessage()]);

        }

        return response()->json(['status' => 1, 'message' => 'با موفقیت ثبت شد']);


    }


    public function create_video(UploadVideoRequest $request)
    {


        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $video_name = rand() . '.' . $video->getClientOriginalExtension();
            $video->move(public_path('videos'), $video_name);
            $output = array(
                'status' => 1,
                'message' => 'Image uploaded successfully',
            );
        } else {
            $output = array(
                'status' => 0,
                'message' => 'Image uploaded unsuccessfully',
            );
        }

//        return response()->json($output);

        try {


            $accounts = $request->accounts;

            for ($i = 0; $i < sizeof($accounts); $i++) {
                $post = Post::create([

                    'category_id' => 3,
                    'user_id' => getUser('id'),
                    'account_id' => $accounts[$i],
                    'tags' => $request->tags,
                    'sent_at' => $request->sent_at,
                    'caption' => $request->caption,
                ]);


                $media = new Media;
                $media->file = "videos/" . $video_name;
                $media->type = "video";


                $post->medias()->save(
                    $media
                );


                $posts[$i] = Post::where('id', $post->id)->with(['medias' => function ($q) {
                    return $q->select('post_id', 'type', 'file');
                }])->with('account')->first();
                UploadVideo::dispatch($posts[$i])->delay(now()->addSecond(10));;

            }


        } catch (Exception $exception) {
            return response()->json(['status' => 0, 'message' => $exception->getMessage()]);

        }


        return response()->json(['status' => 1, 'message' => 'با موفقیت ثبت شد']);


    }

    private function create_album($category_id,$filepath,$sent_at, $request)
    {


        try {



            $accounts = $request->accounts;

            for ($i = 0; $i < sizeof($accounts); $i++) {
                $post = Post::create([
                    'category_id' => $category_id,
                    'user_id' => getUser('id'),
                    'account_id' => $accounts[$i],
                    'tags' => $request->tags,
                    'sent_at' => $sent_at,
                    'caption' => $request->caption,
                ]);

                $medias = [];

                for ($j = 0; $j < sizeof($filepath); $j++) {
                    $media = new Media;
                    $media->file = $filepath[$j];
                    $media->type = "photo";
                    $medias[] = $media;


                }
                $post->medias()->saveMany(
                    $medias
                );


                $posts[$i] = Post::where('id', $post->id)->with(['medias' => function ($q) {
                    return $q->select('post_id', 'type', 'file');
                }])->with('account')->first();
                UploadAlbum::dispatch($posts[$i])->delay(now()->addSecond(10));;

            }


        } catch (Exception $exception) {
            return response()->json(['status' => 0, 'message' => $exception->getMessage()]);

        }

        return response()->json(['status' => 1, 'message' => 'با موفقیت ثبت شد']);


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
