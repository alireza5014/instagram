<?php

namespace App\Http\Controllers\User;

use App\Model\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    public function home()
    {
        $data=[
            'همه پست ها'=>[Post::where('user_id',getUser('id'))->count(),'عدد','ft-type'],
            'پست (تصویر)'=>[Post::where('user_id',getUser('id'))->where('category_id',1)->count(),'عدد','ft-type'],
            'پست (آلبوم)'=>[Post::where('user_id',getUser('id'))->where('category_id',2)->count(),'عدد','ft-type'],
            'پست (ویدیو)'=>[Post::where('user_id',getUser('id'))->where('category_id',3)->count(),'عدد','ft-type'],
            'پست (استوری)'=>[Post::where('user_id',getUser('id'))->where('category_id',4)->count(),'عدد','ft-type'],
            'فضای ذخیره سازی '=>[getUser('disk_size')." / ".getFolderSize(),'مگابایت','ft-type'],
        ];
        return view('user.home',compact('data'));
    }

    public function file_manager()
    {
        $type = Input::get('type', 0);
        ($type === 0) ? $view = 'user.file_manager.index' : $view = 'user.file_manager.index2';
        return view($view);

    }
}
