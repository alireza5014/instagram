<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    public function home()
    {
        return view('user.home');
    }

    public function file_manager()
    {
        $type = Input::get('type', 0);
        ($type === 0) ? $view = 'user.file_manager.index' : $view = 'user.file_manager.index2';
        return view($view);

    }
}
