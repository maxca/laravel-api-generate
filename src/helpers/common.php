<?php


if (!function_exists('cvCamel')) {
    /**
     * @param $string
     * @return string
     */
    function cvCamel($string)
    {
        return ucfirst(\Illuminate\Support\Str::camel($string));
    }
}

if (!function_exists('cvModuleName')) {
    /**
     * @param string $string
     * @return string
     */
    function cvModuleName($string = '')
    {
        return \Illuminate\Support\Str::ucfirst(str_replace('_', ' ', $string));
    }
}

if (!function_exists('cdn')) {
    /**
     * @param $path
     * @return string
     */
    function cdn($path)
    {
        if (in_array(env('APP_ENV'), config(CONFIG_NAME.'.use_cdn'))) {
            return env('CDN_URL') . $path;
        }
        return asset($path);
    }
}

