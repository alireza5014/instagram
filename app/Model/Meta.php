<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    protected $fillable=['post_id','key','value'];
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
