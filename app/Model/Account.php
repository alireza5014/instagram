<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
   protected $fillable=['pk','user_id','username','password','full_name','is_private','profile_pic_url','biography','external_url','phone_number'];

}
