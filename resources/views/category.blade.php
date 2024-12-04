@extends('layouts.app')

@section('title', 'category')


@section('content')    
    <div class="heading">
        <h3>category</h3>
        <p><a href="{{url('/')}}">home </a> <span>/ category</span></p>
    </div>
  <!-- products section -->
    <section class="products">
        
        <div class="box-container">
            @if($products->isNotEmpty())
                @foreach($products as $product)
                <form action="" method="post" class="box">
                    <input type="hidden" name="pid" value="">
                    <input type="hidden" name="name" value="">
                    <input type="hidden" name="price" value="">
                    <input type="hidden" name="image" value="">
                    <button type="submit" class="fas fa-eye" name="quick_wiew"></button>
                    <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
                    <img src="{{asset('uploaded_img/'. $product->image)}}" class="image" alt="">
                    <div class="name">{{$product->name}}</div>
                    <div class="flex">
                        <div class="price"><span>$</span>{{number_format($product->price)}}/-</div>
                        <input type="number" name="qty" class="qty" min="1" max="99"
                        value="1" onkeypress="if(this.value.length == 2) return false;">
                    </div>
                    <input type="submit" name="add_to_cart" class="btn" value="add to cart">
                </form>
                @endforeach
            @endif
        </div>
        @if($products->isNotEmpty())
            <div class="page mt-5" style="width: 100%;">{!! $products->links('vendor.pagination.bootstrap-5') !!}</div>
        @endif
    </section>
@endsection

@section('loader')
    <div class="loader">
        <img src="{{asset('/images/loader.gif')}}" alt="">
    </div>
@endsection