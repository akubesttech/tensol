<?php

/**
 * Created by PhpStorm.
 * User: akubest
 * Date: 12/22/2021
 * Time: 11:58 AM
 */
if(!function_exists('menu_anchor')){
    function menu_anchor($uri = '', $title = '', $attributes = ''){
        $title = (string) $title;

        if ( ! is_array($uri)){
            $site_url = ( ! preg_match('!^\w+://! i', $uri)) ? site_url($uri) : $uri;
        }else{
            $site_url = site_url($uri);
        }

        if ($title == ''){
            $title = $site_url;
        }

        if ($attributes != ''){
            $attributes = _parse_attributes($attributes);
        }
        $current_url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        //$attributes .= ($site_url == $current_url) ? 'class="active"' : 'class="normal"';
        $attributes .= ($site_url == $current_url) ? 'active' : 'normal';
        //return '<a href="'.$site_url.'"'.$attributes.'>'.$title.'</a>';
        return $attributes;
    }
}
