<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title', 'Home')</title>
   <meta name="description" content="@yield('meta_description', 'Book Boston Express Cab')">
   <meta name='robots' content='index, follow' />
   <link rel="sitemap" type="application/xml" title="Sitemap" href="/sitemap.xml">

    @yield('schema')

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-5TQZPBQ3');</script>
    <!-- End Google Tag Manager -->

    <meta name="google-site-verification" content="7KCLc8w_vDk2W_R7z-hXAcRRscV47KSUv2V0lislJgQ" />
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
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5TQZPBQ3"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
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
