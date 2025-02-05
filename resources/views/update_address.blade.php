@extends('layouts.app')

@section('title', 'update_address')


@section('content')

  <!-- form-container section -->
  <section class="form-container">
    <form action="{{route('user.address_update', $user->id)}}" method="post">
      @csrf
      @method('PUT')
        <h3>your address</h3>
        <input type="text" name="flat" class="box" placeholder="flat no. and building name" required maxlength="50">
        @error('flat')
          <p class="text-danger">{{$message}}</p> 
        @enderror
        <input type="text" name="street" class="box" placeholder="street name" required maxlength="50">
        @error('street')
          <p class="text-danger">{{$message}}</p> 
        @enderror
        <input type="text" name="city" class="box" placeholder="city name" required maxlength="50">
        @error('city')
          <p class="text-danger">{{$message}}</p> 
        @enderror
        <input type="text" name="state" class="box" placeholder="state name" required maxlength="50">
        @error('state')
          <p class="text-danger">{{$message}}</p> 
        @enderror
        <input type="text" name="country" class="box" placeholder="country name" required maxlength="50">
        @error('country')
          <p class="text-danger">{{$message}}</p> 
        @enderror
        <input type="text" name="pin_code" class="box" placeholder="pin code" required min="0" max="999999"
        onkeypress="if(this.value.length == 6) return false;">
        @error('pin_code')
          <p class="text-danger">{{$message}}</p> 
        @enderror
        <input type="submit" class="btn" value="save address">
    </form>
  </section> 

@endsection

@section('loader')
    <div class="loader">
        <img src="{{asset('/images/loader.gif')}}" alt="">
    </div>
@endsection