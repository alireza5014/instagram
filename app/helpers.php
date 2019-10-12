<?php
function getUser($key)
{
    return 1;
    if (auth('user')->check()) {
        return auth()->user()[$key];
    }
    return null;
}
