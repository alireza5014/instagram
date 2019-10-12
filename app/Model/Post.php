<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable=['category_id','slug','title','user_id','abstract','image_path','content','publish'];
    public function getCreatedAtAttribute($value)
    {
        if ($value)
            return Carbon::createFromFormat('Y-m-d H:i:s', $value)->diffForHumans();
        else
            return $value;
    }
    public function getAbstractContentAttribute($value)
    {
        if ($value)
        {

            $value= substr($value,0,160)."....";
   return   mb_convert_encoding($value, 'UTF-8', 'UTF-8');

        }
        else
            return $value;
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function metas()
    {
        return $this->hasMany(Meta::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

}
