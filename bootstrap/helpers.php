<?php

use Illuminate\Support\Facades\Route;

function route_class(){
    return str_replace('.','-',Route::currentRouteName());
}

function ngrok_url($routeName, $parameters = []) {
    if(app()->environment('local') && $url = config('app.ngrok.url')) {
        return $url.route($routeName, $parameters, false);
    }
    return route($routeName, $parameters);
}

function big_number($number, $scale=2) {
    return new \Moontoast\Math\BigNumber($number, $scale);
}
