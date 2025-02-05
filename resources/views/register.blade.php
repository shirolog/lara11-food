@extends('layouts.app')

@section('title', 'register')


@section('content')

  <!-- form-container section -->
  <section class="form-container">
    <form action="{{route('user.store')}}" method="post">
      @csrf
        <h3>register now</h3>
        <input type="text" name="name" class="box" placeholder="enter your name" maxlength="50"  required>
        @error('name')
          <p class="text-danger">{{$message}}</p> 
        @enderror
        <input type="email" name="email" class="box" placeholder="enter your email" 
        oninput="this.value = this.value.replace(/\s/g, '')" required>
        @error('email')
          <p class="text-danger">{{$message}}</p> 
        @enderror
        <input type="number" name="number" class="box" placeholder="enter your number" 
        oninput="this.value = this.value.replace(/\s/g, '').slice(0, 10)" required min="0" max="9999999999" maxlength="10">
        @error('number')
          <p class="text-danger">{{$message}}</p> 
        @enderror
        <input type="password" name="password" class="box" placeholder="enter your password"
        oninput="this.value = this.value.replace(/\s/g, '')" required>
        @error('password')
          <p class="text-danger">{{$message}}</p> 
        @enderror
        <input type="password" name="password_confirmation" class="box" placeholder="confirm your password"
        oninput="this.value = this.value.replace(/\s/g, '')" required>
        <input type="submit" class="btn" value="register now">
        @error('password_confirmation')
          <p class="text-danger">{{$message}}</p> 
        @enderror
        <p>already have an account? <a href="{{url('/login')}}">login now</a></p>
    </form>
  </section> 
  
@endsection

@section('loader')
    <div class="loader">
        <img src="{{asset('/images/loader.gif')}}" alt="">
    </div>
@endsection