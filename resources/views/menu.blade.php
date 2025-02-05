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
            @if($products->isNotEmpty())
                @foreach($products as $product)
                    <form action="{{route('user.add_cart')}}" method="post" class="box">
                        @csrf
                        <input type="hidden" name="pid" value="{{$product->id}}">
                        <input type="hidden" name="name" value="{{$product->name}}">
                        <input type="hidden" name="price" value="{{$product->price}}">
                        <input type="hidden" name="image" value="{{$product->image}}">
                        <input type="hidden" name="category_id" value="{{$product->category_id}}">
                        <a href="{{route('user.quick_view', $product->id)}}"><i class="fas fa-eye"></i></a>
                        <button type="submit" class="fas fa-shopping-cart"></button>
                        <img src="{{asset('uploaded_img/'. $product->image)}}" alt="">
                        <a href="{{route('user.category', $product->category->id)}}" class="cat">{{$product->category->name}}</a>
                        <div class="name">{{$product->name}}</div>
                        <div class="flex">
                            <div class="price"><span>$</span>{{number_format($product->price)}}/-</div>
                            <input type="number" name="quantity" class="qty" min="1" max="99"
                            onkeypress="if(this.value.length == 2) return false;" value="1" id="qty">
                        </div>
                    </form>
                @endforeach
            @endif

        </div>

        @if($products->isNotEmpty())
            <div class="page mt-5" style="width: 100%;">{!! $products->onEachSide(1)->links('vendor.pagination.bootstrap-5') !!}</div>
        @endif
    </section> 


@endsection


@section('loader')
    <div class="loader">
        <img src="{{asset('/images/loader.gif')}}" alt="">
    </div>
@endsection