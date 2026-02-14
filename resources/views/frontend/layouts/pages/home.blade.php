@extends('frontend.app')

@section('title', "Boston Express Cab - Logan Airport Car &amp; Taxi Service")
@section('meta_description', "Enjoy punctual, comfortable airport transfers with Boston Express Cab. Our professional drivers ensure a seamless, stress-free journey.")

@section('content')
     @include('frontend.layouts.includes.booking')
     @include('frontend.layouts.includes.rating')
     @include("frontend.layouts.includes.hero")
     @include("frontend.layouts.includes.areaservice")
     @include("frontend.layouts.includes.service")
     @include("frontend.layouts.includes.feature")
     @include("frontend.layouts.includes.blog")
@endsection

