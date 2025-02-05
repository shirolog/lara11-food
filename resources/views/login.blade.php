@extends('layouts.app')

@section('title', 'login')


@section('content')

  <!-- form-container section -->
  <section class="form-container">
    <form action="{{route('user.authenticate')}}" method="post">
      @csrf
        <h3>login now</h3>
        <input type="email" name="email" class="box" placeholder="enter your email"
        oninput="this.value = this.value.replace(/\s/g, '')" required  maxlength="50">
        @error('email')
          <p class="text-danger">{{$message}}</p> 
        @enderror
        <input type="password" name="password" class="box" placeholder="enter your password"
        oninput="this.value = this.value.replace(/\s/g, '')" required  maxlength="50">
        @error('password')
          <p class="text-danger">{{$message}}</p> 
        @enderror

        @if(session('error'))
          <p class="text-danger">{{session('error')}}</p> 
        @endif
        <input type="submit" class="btn" value="login now">
        <p>don't have an account? <a href="{{url('/register')}}">register now</a></p>
    </form>
  </section> 

@endsection

@section('loader')
    <div class="loader">
        <img src="{{asset('/images/loader.gif')}}" alt="">
    </div>
@endsection