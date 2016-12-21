<!DOCTYPE html>
<!--[if lt IE 7]>
<html lang="en" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html lang="en" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html lang="en" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en" class="no-js"> <!--<![endif]-->

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Fantasy Marketing Raffle">
    <meta name="keywords" content="raffle, car raffle, tickets, fantasy, marketing, auto">
    <meta name="author" content="Saidel Perez">
    <title>Fantasy Marketing</title>
    <link rel="stylesheet" href="{{elixir('css/app.css')}}">
    <script src="/js/vendor/modernizr-2.6.2.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
</head>
<body>
@include('frontend.includes._header')
<main class="site-content" role="main">
    @include('frontend.includes._slider')
    @include('frontend.includes._about')
    @include('frontend.includes._services')
    @include('frontend.includes._portfolio')
    @include('frontend.includes._testimonials')
    @include('frontend.includes._price')
    @include('frontend.includes._social')
    @include('frontend.includes._contact')
</main>
@include('frontend.includes._footer')

<script src="/js/app.js"></script>
<script src="/js/frontend-version.js"></script>
</body>
</html>
