@extends('layouts.admin_app')

@section('title', 'products')


@section('content')

 
    <!-- add-products section -->
    <section class="add-products">

        <h1 class="heading">add product</h1>

        <form action="{{route('admin.products_store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="flex">
                <div class="inputBox">
                    <span>product name </span>
                    <input type="text" name="name" class="box" placeholder="enter product name" required
                    maxlength="100">
                </div>

                <div class="inputBox">
                    <span>product price </span>
                    <input type="number" name="price" class="box" placeholder="enter product price" required
                    min="0" max="9999999999" onkeypress="if(this.value.length == 10) return false;">
                </div>       

                
                <div class="inputBox">
                    <span>product categories</span>
                        <select name="category_id" id="category" class="box" required>
                            <option value="" disabled selected>select category --</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                </div>

                <div class="inputBox">
                    <span>image</span>
                    <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/webp,
                    image/png" required>
                </div>

    
                <input type="submit" name="add_product" value="add product" class="btn">
            </div>
        </form>
    </section>

    <!-- show-products section -->
    <section class="show-products" style="padding-top: 0;">

        <h1 class="heading">products added</h1>

        <div class="box-container">
            @if($products->isNotEmpty())
                @foreach($products as $product)

                <div class="box">
                    <img src="{{asset('uploaded_img/'.$product->image)}}" alt="">
                    <div class="name">{{$product->name}}</div>
                    <div class="price">${{number_format($product->price)}}/-</div>
                    <div class="details">{{$product->category->name}}</div>
    
                    <div class="flex-btn">
                        <a href="{{route('admin.product_edit', [$product->id, 'page' => request()->input('page')])}}" class="option-btn">update</a>
                        <a href="javascript:avoid(0);" class="delete-btn" data-id="{{$product->id}}">delete</a>
                    </div>
                </div>      
                @endforeach
            @else
                <p class="empty">no products added yet!</p>
            @endif

        </div>
        @if($products->isNotEmpty())
            <div class="page mt-5" style="width: 100%;">{!! $products->onEachSide(1)->links('vendor.pagination.bootstrap-5') !!}</div>
        @endif
    </section>

@endsection

@section('script')
    <script type="text/javascript">
        $(document).on('click', '.delete-btn', function(e){
            e.preventDefault();

            const productId = $(this).data('id');

            if(confirm('Delete this product?')){
                deleteId(productId);
            }
        });

        function deleteId(productId){
            $.ajax({
                'url': '{{route("admin.products_destroy", ":id")}}'.replace(":id", productId),
                'type': 'DELETE',
                'headers':{
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                },
                success:function(response){
                    if(response.status){
                        window.location.href = '{{route("admin.products")}}';
                    }
                }
            })
        }
    </script>
@endsection




