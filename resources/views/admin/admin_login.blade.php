<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin_login</title>

    <!-- font awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- custom css -->
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    
    <style type="text/css">
        .message{
            background: white;
        }
    </style>
</head>
<body style="padding-left: 0;">

    @include('components.message')

    <!-- form-container section -->

    <section class="form-container">

        <form action="{{route('admin.authenticate')}}" method="post">
            @csrf
            <h3>login now</h3>
            <p>default username = <span>admin</span> & password = <span>111</span></p>
            <input type="text" name="name" class="box" placeholder="enter your username"
            required maxlength="20" oninput="this.value = this.value.replace(/\s/g,'');" value="{{old('name')}}">
            @error('name')
                <p class="text-danger">{{$message}}</p> 
            @enderror
            <input type="password" name="password" class="box" placeholder="enter your password"
            required maxlength="20" oninput="this.value = this.value.replace(/\s/g,'');">
            @error('password')
                <p class="text-danger">{{$message}}</p> 
            @enderror
            <input type="submit" class="btn" value="login now">
            <p class="link">don't have an account? <a href="{{url('/admin_register')}}">register now</a></p>
        </form>
    </section>

</body>
</html>