<?php

namespace App\Http\Controllers\User;

use App\classes\UpLoad;
use App\Http\Requests\CreateSliderRequest;
use App\Model\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    public function list()
    {

        $sliders = Slider::get();
        return view('user.slider.list', compact('sliders'));

    }

    public function create(CreateSliderRequest $request)
    {


        $store_path = '/images/slider/';
        $my_image = ['image_path' => '/images/cover.jpg'];
        if ($request->main_image != "") {
            $image = UpLoad::create('image')
                ->request($request)
                ->target('main_image')
                ->store_path($store_path)
//            ->watermark_path('watermark_logo.png')
//            ->resizePercentage(80)
//            ->resize_percent(75)
                ->makeUpload();
            $my_image = ['image_path' => $image['image_path'][0]];
        }


       $slider= Slider::create(
           array_merge($my_image,[
            'title'=>$request->title,
            'link'=>$request->link,
            'description'=>$request->description,

          ]));
        return response()->json(['status' => 1]);

    }
}
