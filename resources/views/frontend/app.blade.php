<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title', 'Home')</title>
   <meta name="description" content="@yield('meta_description', 'Book Boston Express Cab')">
   <meta name='robots' content='index, follow' />
   <link rel="sitemap" type="application/xml" title="Sitemap" href="/sitemap.xml">

    @php
        $schemaData = [
            "@context" => "https://schema.org",
            "@type" => "TaxiService",
            "name" => "Boston Express Cab",
            "url" => "https://bostonexpresscab.com/",
            "telephone" => "+1617-230-6362",
            "address" => [
                "@type" => "PostalAddress",
                "streetAddress" => "870 Main St",
                "addressLocality" => "Woburn",
                "addressRegion" => "MA",
                "postalCode" => "01801",
                "addressCountry" => "US"
            ],
            "aggregateRating" => [
                "@type" => "AggregateRating",
                "ratingValue" => "4.9",
                "reviewCount" => "5235"
            ]
        ];
    @endphp
    <script type="application/ld+json">
        {!! json_encode($schemaData) !!}
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        @if(session('booking_success'))
            Swal.fire({
                title: "{{ session('booking_success.title') }}",
                text: "{{ session('booking_success.message') }}",
                icon: 'success',
                confirmButtonColor: '#2563eb',
                confirmButtonText: 'Great!',
                backdrop: `rgba(0,0,123,0.4)`
            });
        @endif

        @if(session('notify') && session('notify')['type'] == 'error')
            Swal.fire({
                title: 'Payment Failed',
                text: "{{ session('notify')['message'] }}",
                icon: 'error',
                confirmButtonColor: '#d33'
            });
        @endif
    });
</script>
</body>
</html>
