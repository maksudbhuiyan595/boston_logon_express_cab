@extends('frontend.app')

@section('title', "Home")

@section('content')
     @include('frontend.layouts.includes.booking')
     @include('frontend.layouts.includes.rating')
     @include("frontend.layouts.includes.hero")
     @include("frontend.layouts.includes.taxiservice")
     @include("frontend.layouts.includes.service")
     @include("frontend.layouts.includes.feature")
     @include("frontend.layouts.includes.areaservice")
     @include("frontend.layouts.includes.blog")
@endsection
