@extends('frontend.app')

@section('title', "Boston Express Cab - Logan Airport Car and Taxi Service")
@section('meta_description', "Enjoy punctual, comfortable airport transfers with Boston Express Cab. Our professional drivers ensure a seamless, stress-free journey.")

@section('schema')
    @php
        $schemaData = [
            "@context" => "https://schema.org",
            "@type" => "WebPage",
            "name" => "Boston Express Cab - Logan Airport Car and Taxi Service",
            "url" => url()->current() .'/',
            "logo" => asset('images/Boston Express Cab Logo.png'),
            "description" => "Enjoy punctual, comfortable airport transfers with Boston Express Cab. Our professional drivers ensure a seamless journey to Logan Airport.",
            "telephone" => "617-230-6362",
            "priceRange" => "$$",
            "provider" => [
                "@type" => "LocalBusiness",
                "name" => "Boston Express Cab",
                "address" => [
                    "@type" => "PostalAddress",
                    "addressLocality" => "Boston",
                    "addressRegion" => "MA",
                    "addressCountry" => "US"
                ]
            ],
            "areaServed" => [
                ["@type" => "City", "name" => "Boston"],
                ["@type" => "Airport", "name" => "Logan International Airport"],
                ["@type" => "City", "name" => "Cambridge"]
            ],
            "author" => [
                "@type" => "Person",
                "name" => "Omar Khan"
            ]
        ];
    @endphp

@section('schema')
<script type="application/ld+json">
    {!! json_encode($schemaData, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endsection

@section('content')
    @include('frontend.layouts.includes.booking')
    @include('frontend.layouts.includes.rating')
    @include("frontend.layouts.includes.hero")
    @include("frontend.layouts.includes.areaservice")
    @include("frontend.layouts.includes.service")
    @include("frontend.layouts.includes.feature")
    {{-- @include("frontend.layouts.includes.taxiservice") --}}
    @include("frontend.layouts.includes.blog")
@endsection
