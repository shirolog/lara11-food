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
            <p>cart total : <span>${{number_format($total_cart_value)}}/-</span></p>
            <a href="{{url('checkout')}}" class="btn {{ $total_cart_value < 1 ? 'disabled' : '' }}">proceed to checkout</a></div>

            <div class="more-btn">
                <form action="{{route('user.cart_all_destroy')}}" method="post" class="mb-5">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-btn {{$total_cart_value < 1 ? 'disabled' : ''}}"
                    onclick="return confirm('Delete all from cart?');">delete all</button>
                </form>
            </div>

        <div class="box-container">
            @if($carts->isNotEmpty())
                @foreach($carts as $cart)

                <form action="{{route('user.cart_update', $cart->id)}}" method="post" class="box">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="pid" value="{{$cart->pid}}">
                    <input type="hidden" name="name" value="{{$cart->name}}">
                    <input type="hidden" name="price" value="{{$cart->price}}">
                    <input type="hidden" name="image" value="{{$cart->image}}">
                    <input type="hidden" name="category_id" value="{{$cart->product->category_id}}">
                    <a href="{{route('user.cart_view', $cart->id)}}"><i class="fas fa-eye"></i></a>
                    <button type="button" class="fas fa-times delete"  data-id="{{$cart->id}}"></button>
                    <img src="{{asset('uploaded_img/'.$cart->image)}}" alt="">
                    <a href="{{route('user.cart_category', $cart->category->id)}}" class="cat">{{$cart->category->name}}</a>
                    <div class="name">{{$cart->name}}</div>
                    <div class="flex">
                        <div class="price"><span>$</span>{{number_format($cart->price)}}/-</div>
                        <input type="number" name="quantity" class="qty" min="1" max="99" 
                        value="{{old('quantity', $cart->quantity)}}" id="qty" onkeypress="if(this.value.length == 2) return false;">
                        <button type="submit" class="fas fa-edit"></button>
                    </div>
                    <div class="sub-total">sub total : <span>${{number_format($cart->price * $cart->quantity)}}/-</span></div>
                </form>
                @endforeach
            @endif
        </div>

   

        
        @if($carts->isNotEmpty())
            <div class="page mt-5" style="width: 100%;">{!! $carts->onEachSide(1)->links('vendor.pagination.bootstrap-5') !!}</div>
        @endif
    </section>

@endsection

@section('loader')
    <div class="loader">
        <img src="{{asset('/images/loader.gif')}}" alt="">
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).on('click', '.delete', function(e){
            e.preventDefault();

           const cartId = $(this).data('id');

            if(confirm('delete this item?')){

                deleteId(cartId);
            }
        })

        function deleteId(cartId) {
            $.ajax({
                'url': '{{route("user.cart_destroy", ":id")}}'.replace(":id", cartId),
                'type':'DELETE',
                'headers':{
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                },
                success:function(response){
                    if(response.status){
                        window.location.reload();
                    }
                }
            })
        } 
    </script>
@endsection