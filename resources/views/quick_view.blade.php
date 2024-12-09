@extends('layouts.app')

@section('title', 'quick view')


@section('content')

  <div class="heading">
    <h3>quick view</h3>
    <p><a href="{{url('/')}}">home </a> <span>/ quick view</span></p>
  </div>

  <!-- products section -->
  <section class="products">

        <div class="box-container">

        <form action="{{route('user.add_cart')}}" method="post" class="box">
            @csrf
                <input type="hidden" name="pid" value="{{$product->id}}">
                <input type="hidden" name="name" value="{{$product->name}}">
                <input type="hidden" name="price" value="{{$product->price}}">
                <input type="hidden" name="image" value="{{$product->image}}">
                <input type="hidden" name="category_id" value="{{$product->category_id}}">
                <div class="image-container">
                    <div class="big-image">
                        <img src="{{asset('uploaded_img/'. $product->image)}}" alt="">
                    </div>
                </div>

                <div class="content">
                    <a href="{{route('user.category', $product->category_id)}}" class="cat">{{$product->category->name}}</a>
                    <div class="name">{{$product->name}}</div>
                    <div class="flex">
                        <div class="price"><span>$</span>{{number_format($product->price)}}/-</div>
                        <input type="number" name="quantity" class="qty" min="1" max="99"
                            value="1" onkeypress="if(this.value.length == 2) return false;">
                    </div>
                    <div class="flex-btn">
                        <input type="submit" class="btn" value="add to cart">
                    </div>
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