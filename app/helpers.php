<?php
use InstagramAPI\Media\Video\FFmpeg;
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


