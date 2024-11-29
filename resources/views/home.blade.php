@extends('layouts.app')

@section('title', 'home')


@section('content')

    <!-- hero section -->
    <section class="hero">
        <div class="swiper hero-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide slide">
                    <div class="content">
                        <span>order online</span>
                        <h3>delicious pizza</h3>
                        <a href="{{url('/menu')}}" class="btn">see menus</a>
                    </div>
                    
                    <div class="image">
                        <img src="{{asset('images/home-img-1.png')}}" alt="">
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <div class="content">
                        <span>order online</span>
                        <h3>chezzy hamburger</h3>
                        <a href="{{url('/menu')}}" class="btn">see menus</a>
                    </div>
                    
                    <div class="image">
                        <img src="{{asset('images/home-img-2.png')}}" alt="">
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <div class="content">
                        <span>order online</span>
                        <h3>rosted chicken</h3>
                        <a href="#" class="btn">see menus</a>
                    </div>
                    
                    <div class="image">
                        <img src="{{asset('images/home-img-3.png')}}" alt="">
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>


    <!-- category section -->
    <section class="category">
        <h1 class="title">food category</h1>

        <div class="box-container">
            <a href="#" class="box">
                <img src="{{asset('images/cat-1.png')}}" alt="">
                <h3>fast food</h3>
            </a>

            <a href="#" class="box">
                <img src="{{asset('images/cat-2.png')}}" alt="">
                <h3>main dishes</h3>
            </a>

            <a href="#" class="box">
                <img src="{{asset('images/cat-3.png')}}" alt="">
                <h3>drinks</h3>
            </a>

            <a href="#" class="box">
                <img src="{{asset('images/cat-4.png')}}" alt="">
                <h3>desserts</h3>
            </a>
        </div>
    </section>

    <!--products section -->
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
                    value="1" id="qty" onkeypress="if(this.value.length == 2) return false;">
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
        </div>

        <div class="more-btn">
            <a href="{{url('/menu')}}" class="btn">view all</a>
        </div>
    </section> 
@endsection


@section('loader')
    <div class="loader">
        <img src="{{asset('/images/loader.gif')}}" alt="">
    </div>
@endsection