<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   protected $fillable=['sent_at','tags','user_id','category_id','caption','account_id'];

    public function account()
    {
        return $this->belongsTo(Account::class);
   }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function medias()
    {
        return $this->hasMany(Media::class);
    }
}
