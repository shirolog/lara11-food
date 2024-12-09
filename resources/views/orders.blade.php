@extends('layouts.app')

@section('title', 'orders')


@section('content')

    <div class="heading">
        <h3>orders</h3>
        <p><a href="{{url('/')}}">home </a> <span>/ orders</span></p>
    </div>

    <!-- orders section -->
    <section class="orders">
        <h1 class="title">your orders</h1>

        <div class="box-container">
            @if($orders->isNotEmpty())
                @foreach($orders as $order)

                <div class="box">
                    <p>placed on : <span>{{$order->placed_on}}</span></p>
                    <p>name : <span>{{$order->name}}</span></p>
                    <p>number : <span>{{$order->number}}</span></p>
                    <p>email : <span>{{$order->email}}</span></p>
                    <p>address : <span>{{$order->address}}</span></p>
                    <p>your orders : <span>{{$order->total_products}}</span></p>
                    <p>payment method : <span>{{$order->method}}</span></p>
                    <p>payment status : <span style="color: var(--red);">{{$order->status}}</span></p>
                </div>
                @endforeach
            @endif
            
        </div>
    </section> 

@endsection

@section('loader')
    <div class="loader">
        <img src="{{asset('/images/loader.gif')}}" alt="">
    </div>
@endsection