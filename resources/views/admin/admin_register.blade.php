@extends('layouts.admin_app')

@section('title', 'admin_register')


@section('content')

    <!-- form-container section -->

    <section class="form-container">

        <form action="{{route('admin.store')}}" method="post">
            @csrf
            <h3>register now</h3>
            <input type="text" name="name" class="box" placeholder="enter your username"
            required maxlength="50" oninput="this.value = this.value.replace(/\s/g,'');" value="{{old('name')}}">
            @error('name')
                <p class="text-danger">{{$message}}</p> 
            @enderror
            <input type="email" name="email" class="box" placeholder="enter your email"
            required maxlength="50" oninput="this.value = this.value.replace(/\s/g,'');" value="{{old('email')}}">
            @error('email')
                <p class="text-danger">{{$message}}</p> 
            @enderror
            <input type="password" name="password" class="box" placeholder="enter your password"
            required maxlength="20" oninput="this.value = this.value.replace(/\s/g,'');">
            @error('password')
                <p class="text-danger">{{$message}}</p> 
            @enderror
            <input type="password" name="password_confirmation" class="box" placeholder="confirm your password"
            required maxlength="20" oninput="this.value = this.value.replace(/\s/g,'');">
            @error('password_confirmation')
                <p class="text-danger">{{$message}}</p> 
            @enderror
            <input type="submit" class="btn" value="register now">
            <p class="link">already have an account? <a href="{{url('/admin_login')}}">login now</a></p>
        </form>
    </section>
@endsection




