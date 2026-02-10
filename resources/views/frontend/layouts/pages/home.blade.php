@extends('frontend.app')

@section('title', "Home")
@section('meta', "Boston Express Cab - Logan Airport Car and Taxi Service")
@section('description', "Enjoy punctual, comfortable airport transfers with Boston Express Cab. Our professional drivers ensure a seamless, stress-free journey.")

@section('content')
     @include('frontend.layouts.includes.booking')
     @include('frontend.layouts.includes.rating')
     @include("frontend.layouts.includes.hero")
     @include("frontend.layouts.includes.areaservice")
     @include("frontend.layouts.includes.service")
     @include("frontend.layouts.includes.feature")
     @include("frontend.layouts.includes.blog")
@endsection

