<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
