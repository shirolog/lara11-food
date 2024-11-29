<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>

    <!-- font awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- custom css -->
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
</head>
<body>
        
    <!-- header section -->
    @include('components.admin_header')

    @yield('content')

<!-- custom js -->
<script src="{{asset('js/admin.js')}}"></script>
</body>
</html>