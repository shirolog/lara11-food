@extends('layouts.app')

@section('title', 'contact')


@section('content')

  <div class="heading">
    <h3>contact us</h3>
    <p><a href="{{url('/')}}">home </a> <span>/ contact</span></p>
  </div>

  <!-- contact section -->
  <section class="contact">
    <div class="row">
        <div class="image">
            <img src="{{asset('images/contact-img.svg')}}" alt="">
        </div>
        
            <form action="" method="post">
                <h3>tell us something!</h3>
                <input type="text" name="name" class="box" maxlength="50"
                placeholder="enter your name" required>
                <input type="number" name="number" class="box" min="0" max="999999999"
                placeholder="enter your number" required onkeypress="if(this.value.length == 2) return false;">
                <input type="email" name="email" class="box" maxlength="50"
                placeholder="enter your email" required>
                <textarea name="msg" class="box" cols="30" rows="10" maxlength="500" required placeholder="enter your message"></textarea>
                <input type="submit" class="btn" value="send message">
            </form>
    </div>
  </section> 
  

@endsection


@section('loader')
    <div class="loader">
        <img src="{{asset('/images/loader.gif')}}" alt="">
    </div>
@endsection