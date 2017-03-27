<!doctype html>
<html lang="en">
<head itemscope itemtype="http://schema.org/WebSite">
    <meta charset="utf-8">
    <title itemprop='name'>@yield("html_title")</title>
    <meta name="description" content="@yield("meta_description")">
    <meta name="keywords" content="@yield('meta_keywords')">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Open Graph Tags --}}
    <meta property="og:url" content="{{ Request::url() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('html_title')" />
    <meta property="og:keywords" content="@yield('meta_keywords')" />
    <meta property="og:description" content="@yield('meta_description')" />
    <meta property="og:image" content="@yield('meta_image')" />
    <meta property="fb:app_id" content="" />
    <link rel="canonical" href="{{ Request::url() }}">

    {{-- Favicon --}}
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="/safari-pinned-tab.svg">
    <meta name="theme-color" content="#ffffff">

    {{-- Inline essential styles. Put above the fold syles in here --}}
    <link rel="stylesheet" href="{{ mix('css/common/critical.css') }}" />
    @yield("essential_styles")

</head>
<body id="body" class="@yield('body_class')">

<h1>@yield('h1', 'Advanced Housing')</h1>

@include("frontend.partials.nav")

<div id="main" class="@yield('main_class')">
    @yield("content")
</div>

@include("frontend.partials.contact")
@include("frontend.partials.footer")

<link href="{{ mix('css/common/common.css') }}" rel="stylesheet" />
@yield("styles")

<script src="https://use.fontawesome.com/26f906e461.js"></script>
<script><?php include(public_path() . '/' . mix('js/common.js')); ?></script>
@yield("scripts")

</body>
</html>