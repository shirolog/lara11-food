@extends('layouts.app')

@section('title', 'profile')


@section('content')

    <!-- user-details section -->
    <section class="user-details">
        <div class="user">
            <img src="{{asset('images/user-icon.png')}}" alt="">
            <p><i class="fas fa-user"></i><span>{{$user->name}}</span></p>
            <p><i class="fas fa-phone"></i><span>{{$user->number}}</span></p>
            <p><i class="fas fa-envelope"></i><span>{{$user->email}}</span></p>
            <a href="{{route('user.profile_edit', $user->id)}}" class="btn">update info</a>
            <p class="address"><i class="fas fa-map-marker-alt"></i><span>{{$user->address}}</span></p>
            <a href="{{route('user.address_edit', $user->id)}}" class="btn">update address</a>
        </div>
    </section> 

@endsection

@section('loader')
    <div class="loader">
        <img src="{{asset('/images/loader.gif')}}" alt="">
    </div>
@endsection