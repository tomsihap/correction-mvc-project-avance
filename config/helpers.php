<?php

function redirectTo($route) {
    Header('Location: ' . url($route));
}

function url($route) {
    return BASE_URL . '/'. $route;
}

function uploads_url($img) {
    return BASE_URL . '/public/uploads/' . $img;
}

function img_url($img) {
    return BASE_URL . '/public/assets/img/' . $img;
}

function css_url($css) {
    return BASE_URL . '/public/assets/css/' . $css;
}

function js_url($js) {
    return BASE_URL . '/public/assets/js/' . $js;
}

function public_url($url) {}


function view($path, $vars = null, $include = true) {

    // Format : resource.page

    $pathArray = explode('.', $path);

    $url = '';

    foreach($pathArray as $p) {
        $url .= $p . '/';
    }

    $url = substr($url, 0, -1);

    $url .= '.php';

    $fullUrl = 'public/views/' . $url;

    if ($include) {

        if ($vars) { extract($vars); }
        include($fullUrl);
    }

    return $fullUrl;

}