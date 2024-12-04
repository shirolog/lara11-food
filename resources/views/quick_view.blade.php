@extends('layouts.app')

@section('title', 'quick view')


@section('content')

  <div class="heading">
    <h3>quick view</h3>
    <p><a href="{{url('/')}}">home </a> <span>/ quick view</span></p>
  </div>

    <!-- quick-view section -->
    <section class="quick-view">


        <form action="" method="post" class="box">
                <input type="hidden" name="pid" value="">
                <input type="hidden" name="name" value="">
                <input type="hidden" name="price" value="">
                <input type="hidden" name="image" value="">
                <div class="image-container">
                    <div class="big-image">
                        <img src="./assets/uploaded_img/" alt="">
                    </div>
                </div>

                <div class="content">
                    <div class="name"></div>
                    <div class="flex">
                        <div class="price">$<span></span>/-</div>
                        <input type="number" name="qty" class="qty" min="1" max="99"
                        value="1" onkeypress="if(this.value.length == 2) return false;">
                    </div>
                    <div class="details"></div>
                    <div class="flex-btn">
                        <input type="submit" name="add_to_cart" class="btn" value="add to cart">
                    </div>
                </div>
        </form>
            
    </section>

@endsection

@section('loader')
    <div class="loader">
        <img src="{{asset('/images/loader.gif')}}" alt="">
    </div>
@endsection