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
    public function step3(Request $request)
    {
        return view("frontend.layouts.pages.step3");
    }
    public function step4(Request $request)
    {
        return view("frontend.layouts.pages.step4");
    }
    public function blogs(Request $request)
    {
        return view("frontend.layouts.pages.blog");
    }
    public function contact(Request $request)
    {
        return view("frontend.layouts.pages.contact");
    }
    public function about(Request $request)
    {
        return view("frontend.layouts.pages.about");
    }
     public function paymentPolicy(Request $request)
    {
        return view("frontend.layouts.pages.paymentPolicy");
    }
     public function termConditions(Request $request)
    {
        return view("frontend.layouts.pages.termConditions");
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
    public function childSeat(Request $request)
    {
        return view("frontend.layouts.pages.childseat");
    }
}
