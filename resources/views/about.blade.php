@extends('layouts.app')

@section('title', 'about')


@section('content')

    <div class="heading">
        <h3>about us</h3>
        <p><a href="{{url('/')}}">home</a> <span>/ about</span></p>
    </div>

    <!-- about section -->
    <section class="about">
        <div class="row">
            <div class="image">
                <img src="{{asset('images/about-img.svg')}}" alt="">
            </div>

            <div class="content">
                <h3>why choose us?</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Necessitatibus similique tenetur magni, ipsum nihil asperiores
                    exercitationem. Ipsa, sequi, dolores temporibus velit dolorum quibusdam
                    recusandae quaerat incidunt dolorem facilis officia perferendis?
                </p>
                <a href="{{url('/menu')}}" class="btn">our menu</a>
            </div>
        </div>
    </section>

    <!-- steps section -->
    <section class="steps">
        <h1 class="title">simple steps</h1>

        <div class="box-container">
            <div class="box">
                <img src="{{asset('images/step-1.png')}}" alt="">
                <h3>choose order</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, ab.</p>
            </div>

            <div class="box">
                <img src="{{asset('images/step-2.png')}}" alt="">
                <h3>fast delivery</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, ab.</p>
            </div>

            <div class="box">
                <img src="{{asset('images/step-3.png')}}" alt="">
                <h3>enjoy food</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, ab.</p>
            </div>
        </div>
    </section> 

    <!-- reviews section -->
    <section class="reviews">
        <h1 class="title">customer's reviews</h1>

            <div class="swiper revies-slider">

                <div class="swiper-wrapper">

                    <div class="swiper-slide slide">
                        <img src="{{asset('images/pic-1.png')}}" alt="">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis culpa ipsum nesciunt ut omnis.
                            Earum numquam aliquid quae architecto nam!
                        </p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <h3>john deo</h3>
                    </div>

                    <div class="swiper-slide slide">
                        <img src="{{asset('images/pic-2.png')}}" alt="">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis culpa ipsum nesciunt ut omnis.
                            Earum numquam aliquid quae architecto nam!
                        </p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <h3>john deo</h3>
                    </div>

                    <div class="swiper-slide slide">
                        <img src="{{asset('images/pic-3.png')}}" alt="">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis culpa ipsum nesciunt ut omnis.
                            Earum numquam aliquid quae architecto nam!
                        </p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <h3>john deo</h3>
                    </div>

                    <div class="swiper-slide slide">
                        <img src="{{asset('images/pic-4.png')}}" alt="">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis culpa ipsum nesciunt ut omnis.
                            Earum numquam aliquid quae architecto nam!
                        </p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <h3>john deo</h3>
                    </div>

                    <div class="swiper-slide slide">
                        <img src="{{asset('images/pic-5.png')}}" alt="">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis culpa ipsum nesciunt ut omnis.
                            Earum numquam aliquid quae architecto nam!
                        </p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <h3>john deo</h3>
                    </div>

                    <div class="swiper-slide slide">
                        <img src="{{asset('images/pic-6.png')}}" alt="">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis culpa ipsum nesciunt ut omnis.
                            Earum numquam aliquid quae architecto nam!
                        </p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <h3>john deo</h3>
                    </div>

                </div>
                <div class="swiper-pagination"></div>
            </div>
        
    </section> 

@endsection

@section('loader')
    <div class="loader">
        <img src="{{asset('/images/loader.gif')}}" alt="">
    </div>
@endsection