<?php
/**
 * Created by PhpStorm.
 * User: alireza
 * Date: 26/01/2019
 * Time: 18:56
 */

namespace App\classes;

use Intervention\Image\ImageManagerStatic as Image;

use Illuminate\Support\Facades\File;

class ImageUpload
{

    private $is_water_mark = false;
    private $is_resized = false;



    private $request;
    private $target;
    private $store_path = 'image';
    private $watermark_path = '';
    private $resizePercentage = 80;
    private $position = 'bottom-left';
    private $resize_percent = 0;
    private $quality = 100;
    private $image_name;
    private $resize_image_name;
    private $water_mark_image_name;
    private $square_name;
    private $rand;
    private $result;


    public static function makeImageWithText ($text,$file_name)
    {

        $rand_color = '#' . substr(md5(mt_rand()), 0, 6);
        // create Image from file
        $img = Image::canvas(100,100, $rand_color);
//
//// write text
//        $img->text('The quick brown fox jumps over the lazy dog.');
//
//// write text at position
//        $img->text('The quick brown fox jumps over the lazy dog.', 120, 100);

// use callback to define details
        $img->text($text, 50, 50, function($font) {
             $font->file(public_path().'/fonts/ARLRDBD.TTF');
            $font->size(50);
            $font->color('#fff');
            $font->align('center');
            $font->valign('center');
            $font->angle(0);
        });

// draw transparent text
        $img->text('foo', 0, 0, function($font) {
            $font->color(array(rand(0,255), rand(0,255), rand(0,255), 0.5));
        });

        $img->save(public_path()."/".$file_name );

    }
    public function request($request)
    {
        $this->request = $request;
        return $this;
    }

    public function target($target)
    {
        $this->target = $target;
        return $this;
    }

    public function store_path($store_path)
    {
        $this->store_path = $store_path;
        return $this;
    }

    public function watermark_path($watermark_path)
    {

        $this->is_water_mark = true;
        $this->watermark_path = $watermark_path;
        return $this;
    }

    public function resizePercentage($resizePercentage)
    {
        $this->is_resized = true;

        $this->resizePercentage = $resizePercentage;
        return $this;
    }

    public function position($position)
    {
        $this->is_water_mark = true;

        $this->position = $position;
        return $this;
    }

    public function resize_percent($resize_percent)
    {
        $this->is_resized = true;

        $this->resize_percent = $resize_percent;
        return $this;
    }


    public function quality($quality)
    {


        $this->quality = $quality;
        return $this;
    }


    public function makeUpload()
    {

        $i = 0;

//        $this->result['image_path'][$i] = '';
//        $this->result['image_path'] = [];


        if ($this->request->hasFile($this->target)) {
            if (gettype($this->request->file($this->target)) == 'object') {
                $images[] = $this->request->file($this->target);
            } elseif (gettype($this->request->file($this->target)) == 'array') {
                $images = $this->request->file($this->target);
            } else {

            }


            foreach ($images as $image) {

                $this->image_name = $image->getClientOriginalName();
                $this->rand = str_random(10) . "_";


                $image->move(public_path() . '/' . $this->store_path . '/', $this->rand . $this->image_name);
                $this->result['image_path'][$i] = $this->store_path . '/' . $this->rand . $this->image_name;


                if ($this->is_water_mark) {
                    $this->makeWaterMark($this->result['image_path'], $i);
                }
                if ($this->is_resized) {
                    $this->makeResized($this->result['image_path'], $i);
                }

                $i++;

            }

        } else {


            $this->rand = str_random(10) . "_";

            $image = $this->request->main_image;  // your base64 encoded
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);

            $this->image_name = $this->rand . 'main_image.png';


//            $image_path = '/images/' . $this->request->user_id . '/jobs/';

            $path = public_path() . $this->store_path;

            if (!File::exists($path)) {
                // path does not exist
                // dir doesn't exist, make it
                File::makeDirectory($path, $mode = 0777, true, true);
            }
            File::put($path . $this->image_name, base64_decode($image));


            $path = array($this->store_path . $this->image_name);

            if ($this->is_water_mark) {
                $this->makeWaterMark($path, 0);
            }
            if ($this->is_resized) {
                $this->makeResized($path, 0);
                $this->makeSquare($path,0);
            }

            $this->result['image_path'][0] = $path[0];

//            $img = Image::make($path);
//            $img->resize(260/2, 300/2);
//
//            $img->save('aaaaa.png',50);

        }


        return $this->result;

    }


    private function image_instance($image_path)
    {
        return Image::make(public_path($image_path));
    }

    private function makeWaterMark($image_path, $i)
    {

        $this->water_mark_image_name = $this->rand . 'water_mark_image.png';

        $this->result['watermark_path'][$i] = '';
        $img = $this->image_instance($image_path[$i]);


        $watermark = Image::make(public_path($this->watermark_path));
//                $watermarkSize = $img->width() - 200; //size of the image minus 20 margins
//                $watermarkSize = $img->width() / 2; //half of the image size
        $watermarkSize = round($img->width() * ((100 - $this->resizePercentage) / 100), 2); //watermark will be $resizePercentage less then the actual width of the image
        $watermark->resize($watermarkSize, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->insert($watermark, $this->position);


        $img->save(public_path() . '/' . $this->store_path . '/' . $this->water_mark_image_name, $this->quality);
        $this->result['watermark_path'][$i] = $this->store_path . '/' . $this->water_mark_image_name;


    }


    private function makeResized($image_path, $i)
    {

        $this->resize_image_name = $this->rand . 'resize_image.png';

        $img1 = $this->image_instance($image_path[$i]);


        $width = $img1->getWidth() - $img1->getWidth() * $this->resize_percent / 100;
        $height = $img1->getHeight() - $img1->getHeight() * $this->resize_percent / 100;
        $img1->resize($width, $height);
        $img1->save(public_path() . '/' . $this->store_path . '/' . $this->resize_image_name);
        $this->result['resize_path'][$i] = $this->store_path . '/' . $this->resize_image_name;
    }


    private function makeSquare($image_path, $i)
    {

//        $this->square_name = $this->rand . 'square_image.jpg';
//
//        $img1 = $this->image_instance($image_path[$i]);
//
//        $img1->resize(520, 520);
//        $img1->save(public_path() . '/' . $this->store_path . '/' . $this->square_name);
//        $this->result['square_path'][$i] = $this->store_path . '/' . $this->square_name;
//
//
//
//
//
//
//

        $this->square_name = $this->rand . 'square_image.jpg';

        $img1 = $this->image_instance($image_path[$i]);
        $img1->resize(520, 520);


        $watermark = Image::make(public_path($this->watermark_path));
//                $watermarkSize = $img->width() - 200; //size of the image minus 20 margins
//                $watermarkSize = $img->width() / 2; //half of the image size
        $watermarkSize = round($img1->width() * ((100 - $this->resizePercentage) / 100), 2); //watermark will be $resizePercentage less then the actual width of the image
        $watermark->resize($watermarkSize, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img1->insert($watermark, $this->position);


        $img1->save(public_path() . '/' . $this->store_path . '/' . $this->square_name);
        $this->result['square_path'][$i] = $this->store_path . '/' . $this->square_name;



    }
}


