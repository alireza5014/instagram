<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function home()
    {
       return view('user.home');
 }

 public function file_manager()
    {
       return view('user.file_manager.index')->render();
 }
}
