<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boston Express Cab</title>
    @php
        $taxiSchema = [
            "@context" => "https://schema.org",
            "@type" => ["TaxiService", "LocalBusiness"],
            "@id" => route('home') . "#taxi",
            "name" => "Boston Logan Airport Taxi",
            "url" => route('home'),
            "logo" => asset('frontend/images/logo.png'),
            "image" => asset('frontend/images/logo.png'),
            "telephone" => "+1857-331-9544",
            "priceRange" => "$$",
            "address" => [
                "@type" => "PostalAddress",
                "streetAddress" => "Boston Logan International Airport",
                "addressLocality" => "Boston",
                "addressRegion" => "MA",
                "postalCode" => "02128",
                "addressCountry" => "US"
            ],
            "areaServed" => [
                "@type" => "AdministrativeArea",
                "name" => "Greater Boston Area"
            ],
            "serviceType" => "Airport Taxi Service",
            "openingHoursSpecification" => [
                "@type" => "OpeningHoursSpecification",
                "dayOfWeek" => ["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"],
                "opens" => "00:00",
                "closes" => "23:59"
            ]
        ];

        $websiteSchema = [
            "@context" => "https://schema.org",
            "@type" => "WebSite",
            "@id" => route('home') . "#website",
            "name" => "Boston Logan Airport Taxi",
            "url" => route('home'),
            "publisher" => [
                "@type" => "Organization",
                "name" => "Boston Logan Airport Taxi",
                "logo" => [
                    "@type" => "ImageObject",
                    "url" => asset('frontend/images/logo.png')
                ]
            ],
            "potentialAction" => [
                "@type" => "SearchAction",
                "target" => route('home') . "?s={search_term_string}",
                "query-input" => "required name=search_term_string"
            ]
        ];
    @endphp

    <script type="application/ld+json">
    {!! json_encode($taxiSchema, JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT) !!}
    </script>

    <!-- Website Schema -->
    <script type="application/ld+json">
    {!! json_encode($websiteSchema, JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT) !!}
    </script>

    <meta name="google-site-verification" content="86x_Pxdx_MMID1zG3q322wIJHpeZOXtFCRYeghepuOc" />
    <link rel="canonical" href="{{ rtrim(request()->url(), '/') . '/' }}">
    <link rel="icon" type="image/png" href="{{ asset('images/Boston Express Cab Logo.png') }}">



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @include("frontend.layouts.css.style")
</head>
<body>
    @include("frontend.layouts.includes.header")
    @yield('content')
    @include("frontend.layouts.includes.footer")
    <script>
        function toggleMenu() {
            const menu = document.getElementById('navMenu');
            menu.classList.toggle('active');
        }
    </script>
</body>
</html>
