@extends('layouts.app')

@section('title', 'search')


@section('content')

    <!-- search-form section -->
    <section class="search-form">
        <form action="" method="get" >
            <input type="text" name="search_box" class="box" placeholder="search here...">
            <button type="submit" name="search_btn" class="fas fa-search"></button>
        </form>
    </section>

    <!-- products section -->
    <section class="products" style="min-height: 100vh; padding-top:0;">

    </section> 

@endsection

@section('loader')
    <div class="loader">
        <img src="{{asset('/images/loader.gif')}}" alt="">
    </div>
@endsection