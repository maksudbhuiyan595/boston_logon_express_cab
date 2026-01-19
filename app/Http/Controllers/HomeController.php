<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        return view("frontend.layouts.pages.home");
    }
    public function step2(Request $request)
    {
        return view("frontend.layouts.pages.step2");
    }
    public function blogs(Request $request)
    {
        return view("frontend.layouts.pages.blog");
    }
    public function contact(Request $request)
    {
        return view("frontend.layouts.pages.contact");
    }
     public function minivan(Request $request)
    {
        return view("frontend.layouts.pages.minivan");
    }
    public function longdistance(Request $request)
    {
        return view("frontend.layouts.pages.longdistance");
    }
    public function pickupLocation(Request $request)
    {
        return view("frontend.layouts.pages.pickuplocation");
    }
    public function reservation(Request $request)
    {
        return view("frontend.layouts.pages.reservation");
    }
    public function areaWeServe(Request $request)
    {
        return view("frontend.layouts.pages.servicearea");
    }
}
