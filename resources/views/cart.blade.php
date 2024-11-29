@extends('layouts.app')

@section('title', 'cart')


@section('content')

    <div class="heading">
        <h3>shopping cart</h3>
        <p><a href="{{url('/')}}">home </a> <span>/ cart</span></p>
    </div>

    <!-- products section -->
    <section class="products">
        <h1 class="title">your cart</h1>
        <div class="cart-total">
            <p>cart total : <span>$9</span></p>
            <a href="{{url('checkout')}}" class="btn">procees to checkout</a>
        </div>

        <div class="box-container">
            <form action="" method="post" class="box">
                <button type="submit" class="fas fa-eye" name="quick_wiew"></button>
                <button type="submit" class="fas fa-times" onclick="return confirm('delete this item?');" name="delete"></button>
                <img src="{{asset('project images/dish-1.png')}}" alt="">
                <a href="#" class="cat">main dish 01</a>
                <div class="flex">
                    <div class="price"><span>$</span>3</div>
                    <input type="number" name="qty" class="qty" min="1" max="99" 
                    value="1" id="qty" onkeypress="if(this.value.length == 2) return false;">
                    <button type="submit" class="fas fa-edit"></button>
                </div>
                <div class="sub-total">sub total : <span>$3</span></div>
            </form>

            <form action="" method="post" class="box">
                <button type="submit" class="fas fa-eye" name="quick_wiew"></button>
                <button type="submit" class="fas fa-times" onclick="return confirm('delete this item?');" name="delete"></button>
                <img src="{{asset('project images/pizza-2.png')}}" alt="">
                <a href="#" class="cat">delicious pizza 02</a>
                <div class="flex">
                    <div class="price"><span>$</span>3</div>
                    <input type="number" name="qty" class="qty" min="1" max="99" 
                    value="1" id="qty" onkeypress="if(this.value.length == 2) return false;">
                    <button type="submit" class="fas fa-edit"></button>
                </div>
                <div class="sub-total">sub total : <span>$3</span></div>
            </form>

            <form action="" method="post" class="box">
                <button type="submit" class="fas fa-eye" name="quick_wiew"></button>
                <button type="submit" class="fas fa-times" onclick="return confirm('delete this item?');" name="delete"></button>
                <img src="{{asset('project images/dessert-2.png')}}" alt="">
                <a href="#" class="cat">delicious dessert 02</a>
                <div class="flex">
                    <div class="price"><span>$</span>3</div>
                    <input type="number" name="qty" class="qty" min="1" max="99" 
                    value="1" id="qty" onkeypress="if(this.value.length == 2) return false;">
                    <button type="submit" class="fas fa-edit"></button>
                </div>
                <div class="sub-total">sub total : <span>$3</span></div>
            </form>
        </div>

        <div class="more-btn">
            <form action="" method="post">
                <button type="submit" class="delete-btn"
                onclick="return confirm('delete all from cart?');" name="delete_all">delete all</button>
            </form>
        </div>
    </section>

@endsection

@section('loader')
    <div class="loader">
        <img src="{{asset('/images/loader.gif')}}" alt="">
    </div>
@endsection