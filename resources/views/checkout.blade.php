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
        <form action="{{route('user.add_order')}}" method="post">
            @csrf
            <input type="hidden" name="total_price" value="{{number_format($total_cart_value)}}">
            <div class="cart-items">
                <h3>cart items</h3>
                @if($carts->isNotEmpty())
                    @foreach($carts as $cart)
                    <input type="hidden" name="product[]" value="{{$cart->name}}">
                    <input type="hidden" name="quantity[]" value="{{$cart->quantity}}">
                    <p><span class="name">{{$cart->name}}</span><span class="price">${{number_format($cart->price * $cart->quantity)}}/-</span></p>
                    @endforeach
                @endif

                <p class="grand-total"><span class="name">grand total :</span>
                <span class="price">${{number_format($total_cart_value)}}/-</span></p>
                <a href="{{url('cart')}}" class="btn">view cart</a>
            </div>

            <div class="user-info">
                <h3>your info</h3>
                <p><i class="fas fa-user"></i><span>{{Auth::user()->name}}</span></p>
                <p><i class="fas fa-phone"></i><span>{{Auth::user()->number}}</span></p>
                <p><i class="fas fa-envelope"></i><span>{{Auth::user()->email}}</span></p>
                <a href="{{route('user.profile_edit', Auth::user()->id)}}" class="btn">update info</a>
                <h3>delivery address</h3>
                <p><i class="fas fa-map-marker-alt"></i><span>{{Auth::user()->address}}</span></p>
                <a href="{{route('user.address_edit', Auth::user()->id)}}" class="btn">update address</a>
                <select name="method" class="box" required>
                    <option value="" disabled selected>select payment method --</option>
                    <option value="cash on delivery">cash on delivery</option>
                    <option value="credit card">credit card</option>
                    <option value="paytm">paytm</option>
                    <option value="paypal">paypal</option>
                </select>
                <input type="submit" class="btn" value="place order" style="width: 100%; background:var(--red);
                color:var(--white);" {{Auth::user()->address == 'No, Address' ? 'disabled' : '' }}>
            </div>
        </form>

    </section>


@endsection

@section('loader')
    <div class="loader">
        <img src="{{asset('/images/loader.gif')}}" alt="">
    </div>
@endsection