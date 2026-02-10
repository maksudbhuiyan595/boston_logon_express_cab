<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    {{-- ১. স্ট্যাটিক পেজসমূহ --}}
    @foreach ($staticRouteNames as $routeName => $priority)
        @if (Route::has($routeName))
        <url>
            <loc>{{ route($routeName) }}</loc>
            <lastmod>{{ now()->tz('America/New_York')->toAtomString() }}</lastmod>
            <priority>{{ $priority }}</priority>
        </url>
        @endif
    @endforeach

    {{-- ২. ডাইনামিক সিটি পেজ ({slug}) --}}
    @foreach ($cities as $city)
    <url>
        <loc>{{ route('dynamic.route', $city->url ?? $city->slug) }}</loc>
        <lastmod>{{ $city->updated_at ? $city->updated_at->tz('America/New_York')->toAtomString() : now()->toAtomString() }}</lastmod>
        <priority>0.85</priority>
    </url>
    @endforeach

    {{-- ৩. ব্লগ পেজসমূহ --}}
    @foreach ($blogs as $blog)
    <url>
        <loc>{{ route('dynamic.route', $blog->slug) }}</loc>
        <lastmod>{{ $blog->updated_at ? $blog->updated_at->tz('America/New_York')->toAtomString() : now()->toAtomString() }}</lastmod>
        <priority>0.75</priority>
    </url>
    @endforeach

</urlset>
