<?php
use InstagramAPI\Media\Video\FFmpeg;
function getUser($key)
{
     if (auth('user')->check()) {
        return auth()->user()[$key];
    }
    return 1;

}


