<?php
use InstagramAPI\Media\Video\FFmpeg;
use Illuminate\Support\Facades\File;

function getUser($key)
{
     if (auth('user')->check()) {
        return auth()->user()[$key];
    }
    return 1;

}

// function str_random($length = 16)
//{
//    $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
//
//    return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
//}

function  getFolderSize($dir){
$file_size = 0;

if (is_dir($dir)) {


    foreach (File::allFiles($dir) as $file) {
        $file_size += $file->getSize();
    }
    return number_format($file_size / 1048576, 2);
}
return 0;
}