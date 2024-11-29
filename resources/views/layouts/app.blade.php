<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    <!-- font awesome cdn -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">



    <!-- swiper css  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

    <!-- custom css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
    <!-- header section -->
    @include('components.header')
    
    @yield('content')

    <!-- footer section -->
    @include('components.footer')

    @yield('loader')
    
    <!-- swiper js -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- custom js -->
     <script src="{{asset('js/script.js')}}"></script>
</body>
</html>