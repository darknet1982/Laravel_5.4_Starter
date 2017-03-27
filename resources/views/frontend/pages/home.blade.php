@extends('frontend.master')

@section('html_title', $meta['title'])
@section('meta_description', $meta['description'])
@section('meta_image', $meta['image'])
@section('meta_keywords', $meta['keywords'])
@section('nav_class', 'home')
@section('body_class', 'home')

@section('essential_styles')
    <link rel="stylesheet" href="{{ mix('css/home/critical.css') }}">
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ mix('css/home/common.css') }}">
@endsection
@section('scripts')
    <script><?php include(public_path() . '/' . mix('js/home.js')); ?></script>
@endsection

@section('content')
    <section>

    </section>
@endsection