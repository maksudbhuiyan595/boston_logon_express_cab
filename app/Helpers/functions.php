<?php

use App\Models\BlogPost;
use App\Models\City;
use Illuminate\Support\Facades\Route;

function generate_sitemap_xml() {
    $staticRouteNames = [
        'home'            => '1.00',
        'pickup.location' => '0.90',
        'reservation'     => '0.90',
        'child.seat'      => '0.80',
        'minivan'         => '0.85',
        'longdistance'    => '0.85',
        'area.we.serve'   => '0.90',
        'blogs'           => '0.80',
        'contact'         => '0.70',
        'airports'        => '0.80',
        'about'           => '0.80',
    ];
    $cities = City::all();
    $blogs = BlogPost::all();

    return response()->view('sitemap', compact('staticRouteNames', 'cities', 'blogs'))
                     ->header('Content-Type', 'text/xml');
}
