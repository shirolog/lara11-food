@extends('layouts.app')

@section('title', 'update_profile')


@section('content')

  <!-- form-container section -->
  <section class="form-container">
    <form action="" method="post">
        <h3>update profile</h3>
        <input type="text" name="name" class="box" placeholder="enter your name" maxlength="50"
        oninput="this.value = this.value.replace(/\s/g, '')" required value="">
        <input type="email" name="email" class="box" placeholder="enter your email"
        oninput="this.value = this.value.replace(/\s/g, '')" required  maxlength="50" value="">
        <input type="password" name="old_pass" class="box" placeholder="enter your old password"
        oninput="this.value = this.value.replace(/\s/g, '')" maxlength="50">
        <input type="password" name="pass" class="box" placeholder="enter your new password"
        oninput="this.value = this.value.replace(/\s/g, '')" maxlength="50">
        <input type="password" name="pass_confirmation" class="box" placeholder="cofirm your new password"
        oninput="this.value = this.value.replace(/\s/g, '')" maxlength="50">
        <input type="submit" class="btn" value="update now">
    </form>
  </section> 

@endsection

@section('loader')
    <div class="loader">
        <img src="{{asset('/images/loader.gif')}}" alt="">
    </div>
@endsection