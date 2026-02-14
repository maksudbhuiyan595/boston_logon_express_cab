<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RouteController;
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
Route::get('/sitemap.xml', function () {
    return generate_sitemap_xml();
});
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/step2', 'step2')->name('step2');
    Route::get('/step3', 'step3')->name('step3');
    Route::get('/step4', 'step4')->name('step4');
    Route::get('/airports', 'airport')->name('airports');
    Route::get('/capacity-luggage', 'capacityLuggage')->name('luggage.capacity');
    Route::get('about/', 'about')->name('about');
    Route::get('/taxi-with-child-car-seats', 'childSeat')->name('child.seat');
    Route::get('/pickup-location-12', 'pickupLocation')->name('pickup.location');
    Route::get('/boston-taxi-reservation', 'reservation')->name('reservation');
    Route::get('/minivan-taxi-cab-service-34', 'minivan')->name('minivan');
    Route::get('/long-distance-car-service-33', 'longdistance')->name('longdistance');
    Route::get('/service', 'areaWeServe')->name('area.we.serve');
    Route::get('/contact-us', 'contact')->name('contact');
    Route::get('/blog', 'blogs')->name('blogs');
    Route::get('/privacy-policy', 'privacyPolicy')->name('privacy.policy');
    Route::get('/terms&conditions', 'termConditions')->name('term.conditions');
    Route::get('/payment-policy', 'paymentPolicy')->name('payment.policy');
    Route::get('/services', 'areService')->name('area.service');
    Route::get('/setting', 'setting')->name('setting');
    Route::post('/book-confirm', 'confirmBooking')->name('book.confirm');
});
Route::get('/{slug}', [RouteController::class, 'index'])->name('dynamic.route');
