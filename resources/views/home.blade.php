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
            @if($products->isNotEmpty())
                @foreach($products as $product)
                <form action="{{route('user.add_cart')}}" method="post" class="box">
                    @csrf
                    <input type="hidden" name="pid" value="{{$product->id}}">
                    <input type="hidden" name="name" value="{{$product->name}}">
                    <input type="hidden" name="price" value="{{$product->price}}">
                    <input type="hidden" name="image" value="{{$product->image}}">
                    <a href="{{route('user.quick_view', $product->id)}}"><i class="fas fa-eye"></i></a>
                    <button type="submit" class="fas fa-shopping-cart"></button>
                    <img src="{{asset('uploaded_img/'.$product->image)}}" alt="">
                    <a href="{{route('user.category', $product->category_id)}}" class="cat">{{$product->category->name}}</a>
                    <div class="name">{{$product->name}}</div>
                    <div class="flex">
                        <div class="price"><span>$</span>{{number_format($product->price)}}</div>
                        <input type="number" name="quantity" class="qty" min="1" max="99" 
                        value="1" id="qty" onkeypress="if(this.value.length == 2) return false;">
                    </div>
                </form>
                @endforeach
            @endif

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