@extends('layouts.admin_app')

@section('title', 'update_product')


@section('content')

    <!-- update-product section -->
    <section class="update-product">

        <h1 class="heading">update product</h1>


        <form action="{{route('admin.product_update', $product->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="image-container">
                <div class="main-image">
                    <img src="{{asset('uploaded_img/'. $product->image)}}" alt="">
                </div>

                <span>update name</span>
                <input type="text" name="name" class="box" placeholder="enter product name"
                value="{{old('name', $product->name)}}" maxlength="100">
                @error('name')
                    <p class="text-danger">{{$message}}</p> 
                @enderror
                
                <span>update price</span>
                <input type="text" name="price" class="box" placeholder="enter product price" 
                value="{{old('price', number_format($product->price))}}" min="0" max="9999999999" onkeypress="if(this.value.length == 10) return false;">
                @error('price')
                    <p class="text-danger">{{$message}}</p> 
                @enderror
                <span>update categories</span>
                <select name="category_id" id="category" class="box" required>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" {{$category->id == old('category_id', $product->category_id) ? 'selected' : ''}}>
                        {{$category->name}}
                    </option>
                    @endforeach
                </select>
                <span>update image </span>
                <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/webp,
                image/png">

                <div class="flex-btn">
                    <input type="submit" name="update" class="btn" value="update">
                    <a href="{{route('admin.products', ['page' => request()->input('page')])}}" class="option-btn">go back</a>
                </div>
            </div>
        </form>

    </section>


@endsection




