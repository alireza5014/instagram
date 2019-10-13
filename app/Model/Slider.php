<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
   protected $fillable=['title','link','image_path','description'];
}
