<?php
if (! function_exists('img_me')) {
    /**
     * Return url of image
     * 
     * @return string
     */
    function img_me($img = 'me.jpg')
    {
        return asset('front/images/me/me.jpg');
    }
}