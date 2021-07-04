<link rel="canonical" href="@yield('canonical', url()->current())"/>
<meta name="title" content="{{ config('app.name') }}">

<meta name="description" content="{{ config('meta.description') }}">

<meta property="og:type" content="website"/>
<meta property="og:description" content="{{ config('meta.description') }}">
{{--<meta property="og:image" content="{{ asset(config('meta.sharing_image')) }}">--}}

<meta property="twitter:description" content="{{ config('meta.description') }}">
{{--<meta property="twitter:image" content="{{ asset(config('meta.sharing_image')) }}">--}}


<meta property="og:locale" content="en_US"/>
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:title" content="{{ config('app.name') }}">

<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ url()->current() }}">
<meta property="twitter:title" content="{{ config('app.name') }}">

<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
<link rel="manifest" href="{{ asset('site.webmanifest') }}">
<link rel="mask-icon" href="{{ asset('safari-pinned-tab.svg') }}" color="#5bbad5">
<meta name="apple-mobile-web-app-title" content="Background Image Generator - SiteOrigin">
<meta name="application-name" content="Background Image Generator - SiteOrigin">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">
