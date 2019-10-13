<?php

namespace App\Http\Controllers\Site;

use App\Model\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    public function getSlider()
    {
        $slider= Slider::get();

        $slider->map(function ($q){
if($q['id']==1){
    $q['status']='active';

}
else
{
    $q['status']='';


}
        });
        return response()->json(['data' => $slider]);

    }
}
