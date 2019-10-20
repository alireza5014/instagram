<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   protected $fillable=['sent_at','user_id','type','caption','file','account_id'];

    public function account()
    {
        return $this->belongsTo(Account::class);
   }
}
