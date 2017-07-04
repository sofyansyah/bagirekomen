<!DOCTYPE html>
<html>
<head>
    <title>Bagidelo</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
   @yield('css_styles')
<!--[if lt IE 9]>
<script src="assets/js/html5shiv.min.js"></script>
<script src="assets/js/respond.min.js"></script>
<![endif]-->
</head>
@include('include.header')
<body>
@yield('content')
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>

   
   @include('include.footer')
    @yield('javascript')
   <script src="{{asset('js/jquery.min.js')}}"></script> 
   <script src="{{asset('js/bootstrap.min.js')}}"></script> 
   <script src="{{asset('js/wow.min.js')}}"></script> 
   <script src="{{asset('js/slick.min.js')}}"></script> 
   <script src="{{asset('js/custom.js')}}"></script>

</body>
   </html>