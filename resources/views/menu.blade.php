@extends('layouts.app')

@section('title', 'menu')


@section('content')

  <div class="heading">
    <h3>our menu</h3>
    <p><a href="{{url('/')}}">home </a> <span>/ menu</span></p>
  </div>

  <!-- products section -->
  <section class="products">
        <h1 class="title">latest dishes</h1>

        <div class="box-container">
            <form action="" method="post" class="box">
                <button type="submit" class="fas fa-eye" name="quick_wiew"></button>
                <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
                <img src="{{asset('project images/burger-1.png')}}" alt="">
                <a href="#" class="cat">fast food</a>
                <div class="name">chezzy burger 01</div>
                <div class="flex">
                    <div class="price"><span>$</span>3</div>
                    <input type="number" name="qty" class="qty" min="1" max="99"
                    onkeypress="if(this.value.length == 2) return false;" value="1" id="qty">
                </div>
            </form>

            <form action="" method="post" class="box">
                <button type="submit" class="fas fa-eye" name="quick_wiew"></button>
                <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
                <img src="{{asset('project images/dish-1.png')}}" alt="">
                <a href="#" class="cat">dishes</a>
                <div class="name">main dish 01</div>
                <div class="flex">
                    <div class="price"><span>$</span>3</div>
                    <input type="number" name="qty" class="qty" min="1" max="99"
                    onkeypress="if(this.value.length == 2) return false;" value="1" id="qty">
                </div>
            </form>

            <form action="" method="post" class="box">
                <button type="submit" class="fas fa-eye" name="quick_wiew"></button>
                <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
                <img src="{{asset('project images/dessert-1.png')}}" alt="">
                <a href="#" class="cat">desserts</a>
                <div class="name">delicious dessert 01</div>
                <div class="flex">
                    <div class="price"><span>$</span>3</div>
                    <input type="number" name="qty" class="qty" min="1" max="99"
                    onkeypress="if(this.value.length == 2) return false;" value="1" id="qty">
                </div>
            </form>

            <form action="" method="post" class="box">
                <button type="submit" class="fas fa-eye" name="quick_wiew"></button>
                <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
                <img src="{{asset('project images/drink-1.png')}}" alt="">
                <a href="#" class="cat">drinks</a>
                <div class="name">cold drink 01</div>
                <div class="flex">
                    <div class="price"><span>$</span>3</div>
                    <input type="number" name="qty" class="qty" min="1" max="99"
                    onkeypress="if(this.value.length == 2) return false;" value="1" id="qty">
                </div>
            </form>

            <form action="" method="post" class="box">
                <button type="submit" class="fas fa-eye" name="quick_wiew"></button>
                <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
                <img src="{{asset('project images/pizza-1.png')}}" alt="">
                <a href="#" class="cat">fast food</a>
                <div class="name">delicious pizza 01</div>
                <div class="flex">
                    <div class="price"><span>$</span>3</div>
                    <input type="number" name="qty" class="qty" min="1" max="99"
                    onkeypress="if(this.value.length == 2) return false;" value="1" id="qty">
                </div>
            </form>

            <form action="" method="post" class="box">
                <button type="submit" class="fas fa-eye" name="quick_wiew"></button>
                <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
                <img src="{{asset('project images/dish-2.png')}}" alt="">
                <a href="#" class="cat">dishes</a>
                <div class="name">main dish 02</div>
                <div class="flex">
                    <div class="price"><span>$</span>3</div>
                    <input type="number" name="qty" class="qty" min="1" max="99"
                    onkeypress="if(this.value.length == 2) return false;" value="1" id="qty">
                </div>
            </form>

            <form action="" method="post" class="box">
                <button type="submit" class="fas fa-eye" name="quick_wiew"></button>
                <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
                <img src="{{asset('project images/pizza-2.png')}}" alt="">
                <a href="#" class="cat">fast food</a>
                <div class="name">delicious pizza 02</div>
                <div class="flex">
                    <div class="price"><span>$</span>3</div>
                    <input type="number" name="qty" class="qty" min="1" max="99"
                    onkeypress="if(this.value.length == 2) return false;" value="1" id="qty">
                </div>
            </form>

            <form action="" method="post" class="box">
                <button type="submit" class="fas fa-eye" name="quick_wiew"></button>
                <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
                <img src="{{asset('project images/dessert-2.png')}}" alt="">
                <a href="#" class="cat">desserts</a>
                <div class="name">delicious dessert 02</div>
                <div class="flex">
                    <div class="price"><span>$</span>3</div>
                    <input type="number" name="qty" class="qty" min="1" max="99"
                    onkeypress="if(this.value.length == 2) return false;" value="1" id="qty">
                </div>
            </form>

            <form action="" method="post" class="box">
                <button type="submit" class="fas fa-eye" name="quick_wiew"></button>
                <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
                <img src="{{asset('project images/drink-2.png')}}" alt="">
                <a href="#" class="cat">drinks</a>
                <div class="name">cold drink 02</div>
                <div class="flex">
                    <div class="price"><span>$</span>3</div>
                    <input type="number" name="qty" class="qty" min="1" max="99"
                    onkeypress="if(this.value.length == 2) return false;" value="1" id="qty">
                </div>
            </form>
        </div>


    </section> 


@endsection


@section('loader')
    <div class="loader">
        <img src="{{asset('/images/loader.gif')}}" alt="">
    </div>
@endsection