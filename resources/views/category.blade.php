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
                <form action="{{route('user.add_cart')}}" method="post" class="box">
                    @csrf
                        <input type="hidden" name="pid" value="{{$product->id}}">
                        <input type="hidden" name="name" value="{{$product->name}}">
                        <input type="hidden" name="price" value="{{$product->price}}">
                        <input type="hidden" name="image" value="{{$product->image}}">
                        <input type="hidden" name="category_id" value="{{$product->category_id}}">
                        <a href="{{route('user.quick_view', $product->id)}}"><i class="fas fa-eye"></i></a>
                    <img src="{{asset('uploaded_img/'. $product->image)}}" class="image" alt="">
                    <div class="name">{{$product->name}}</div>
                    <div class="flex">
                        <div class="price"><span>$</span>{{number_format($product->price)}}/-</div>
                        <input type="number" name="quantity" class="qty" min="1" max="99"
                        value="1" onkeypress="if(this.value.length == 2) return false;">
                    </div>
                    <input type="submit"  class="btn" value="add to cart">
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