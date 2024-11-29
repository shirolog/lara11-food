@extends('layouts.app')

@section('title', 'checkout')


@section('content')

    <div class="heading">
        <h3>checkout</h3>
        <p><a href="{{url('/')}}">home </a> <span>/ checkout</span></p>
    </div>

    <!-- checkout section -->
    <section class="checkout">
        <h1 class="title">order summary</h1>
        <form action="" method="post">
            <div class="cart-items">
                <h3>cart items</h3>
                <p><span class="name">main dish 01</span><span class="price">$3</span></p>
                <p><span class="name">delicious pizza 02</span><span class="price">$3</span></p>
                <p><span class="name">delicious dessert 02</span><span class="price">$3</span></p>
                <p class="grand-total"><span class="name">grand total :</span>
                <span class="price">$9</span></p>
                <a href="{{url('cart')}}" class="btn">view cart</a>
            </div>

            <div class="user-info">
                <h3>your info</h3>
                <p><i class="fas fa-user"></i><span>shaikh anas</span></p>
                <p><i class="fas fa-phone"></i><span>123456789</span></p>
                <p><i class="fas fa-envelope"></i><span>shaikhanas@gmail.com</span></p>
                <a href="#" class="btn">update info</a>
                <h3>delivery address</h3>
                <p><i class="fas fa-map-marker-alt"></i><span>flat no. 1, building no.1, jogeshwari 
                west, mumbai, india - 400104</span></p>
                <a href="#" class="btn">update address</a>
                <select name="method" class="box" required>
                    <option value="" disabled selected>select payment method --</option>
                    <option value="cash on delivery">cash on delivery</option>
                    <option value="credit card">credit card</option>
                    <option value="paytm">paytm</option>
                    <option value="paypal">paypal</option>
                </select>
                <input type="submit" class="btn" value="place order" style="width: 100%; background:var(--red);
                color:var(--white);">
            </div>
        </form>

    </section>


@endsection

@section('loader')
    <div class="loader">
        <img src="{{asset('/images/loader.gif')}}" alt="">
    </div>
@endsection