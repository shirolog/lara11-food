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
            <div class="box">
                <p>placed on : <span>6-11-2022</span></p>
                <p>name : <span>shaikh anas</span></p>
                <p>number : <span>123456790</span></p>
                <p>email : <span>shaikhanas@gmail.com</span></p>
                <p>address : <span>flat no. 1, building no.1, jogeshwari 
                west, mumbai, india - 400104</span></p>
                <p>your orders : <span>main dish 01 - delicious pizza 02 (1) 
                - delicious dessert (02) </span></p>
                <p>payment method : <span>cash on delivery</span></p>
                <p>payment status : <span style="color: var(--red);">pending</span></p>
            </div>
            
            <div class="box">
                <p>placed on : <span>6-11-2022</span></p>
                <p>name : <span>shaikh anas</span></p>
                <p>number : <span>123456790</span></p>
                <p>email : <span>shaikhanas@gmail.com</span></p>
                <p>address : <span>flat no. 1, building no.1, jogeshwari 
                west, mumbai, india - 400104</span></p>
                <p>your orders : <span>main dish 01 - delicious pizza 02 (1) 
                - delicious dessert (02) </span></p>
                <p>payment method : <span>cash on delivery</span></p>
                <p>payment status : <span style="color: var(--red);">pending</span></p>
            </div>
        </div>
    </section> 

@endsection

@section('loader')
    <div class="loader">
        <img src="{{asset('/images/loader.gif')}}" alt="">
    </div>
@endsection