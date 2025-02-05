@extends('layouts.app')

@section('title', 'update_profile')


@section('content')

  <!-- form-container section -->
  <section class="form-container">
    <form action="{{route('user.profile_update', $user->id)}}" method="post">
      @csrf
      @method('PUT')
        <h3>update profile</h3>
        <input type="text" name="name" class="box" placeholder="enter your name" maxlength="50"
        oninput="this.value = this.value.replace(/\s/g, '')" required value="{{old('name', $user->name)}}">
        @error('name')
          <p class="text-danger">{{$message}}</p> 
        @enderror
        <input type="email" name="email" class="box" placeholder="enter your email"
        oninput="this.value = this.value.replace(/\s/g, '')" required  maxlength="50" value="{{old('email', $user->email)}}">
        @error('email')
          <p class="text-danger">{{$message}}</p> 
        @enderror
        <input type="password" name="old_password" class="box" placeholder="enter your old password"
        oninput="this.value = this.value.replace(/\s/g, '')" maxlength="50">
        @error('password')
          <p class="text-danger">{{$message}}</p> 
        @enderror
        <input type="password" name="new_password" class="box" placeholder="enter your new password"
        oninput="this.value = this.value.replace(/\s/g, '')" maxlength="50">
        @error('new_password')
          <p class="text-danger">{{$message}}</p> 
        @enderror
        <input type="password" name="new_password_confirmation" class="box" placeholder="cofirm your new password"
        oninput="this.value = this.value.replace(/\s/g, '')" maxlength="50">
        @error('new_password_confirmation')
          <p class="text-danger">{{$message}}</p> 
        @enderror
        <input type="submit" class="btn" value="update now">
    </form>
  </section> 

@endsection

@section('loader')
    <div class="loader">
        <img src="{{asset('/images/loader.gif')}}" alt="">
    </div>
@endsection