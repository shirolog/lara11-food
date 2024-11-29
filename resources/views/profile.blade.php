@extends('layouts.app')

@section('title', 'profile')


@section('content')

    <!-- user-details section -->
    <section class="user-details">
        <div class="user">
            <img src="{{asset('images/user-icon.png')}}" alt="">
            <p><i class="fas fa-user"></i><span>shaikh anas</span></p>
            <p><i class="fas fa-phone"></i><span>123456789</span></p>
            <p><i class="fas fa-envelope"></i><span>shaikhanas@gmail.com</span></p>
            <a href="{{url('/update_profile')}}" class="btn">update info</a>
            <p class="address"><i class="fas fa-map-marker-alt"></i><span>flat no. 1, building no.1, jogeshwari 
            west, mumbai, india - 400104</span></p>
            <a href="{{url('update_address')}}" class="btn">update address</a>
        </div>
    </section> 

@endsection

@section('loader')
    <div class="loader">
        <img src="{{asset('/images/loader.gif')}}" alt="">
    </div>
@endsection