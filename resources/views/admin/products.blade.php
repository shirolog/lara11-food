@extends('layouts.admin_app')

@section('title', 'admin_register')


@section('content')

 
    <!-- add-products section -->
    <section class="add-products">

        <h1 class="heading">add product</h1>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="flex">
                <div class="inputBox">
                    <span>product name (required)</span>
                    <input type="text" name="name" class="box" placeholder="enter product name" required
                    maxlength="100">
                </div>

                <div class="inputBox">
                    <span>product price (required)</span>
                    <input type="number" name="price" class="box" placeholder="enter product price" required
                    min="0" max="9999999999" onkeypress="if(this.value.length == 10) return false;">
                </div>       

                <div class="inputBox">
                    <span>image 01 (required)</span>
                    <input type="file" name="image_01" class="box" accept="image/jpg, image/jpeg, image/webp,
                    image/png" required>
                </div>

                <div class="inputBox">
                    <span>image 02 (required)</span>
                    <input type="file" name="image_02" class="box" accept="image/jpg, image/jpeg, image/webp,
                    image/png" required>
                </div>

                <div class="inputBox">
                    <span>image 03 (required)</span>
                    <input type="file" name="image_03" class="box" accept="image/jpg, image/jpeg, image/webp,
                    image/png" required>
                </div>

                <div class="inputBox">
                    <span>product details</span>
                    <textarea name="details" class="box" placeholder="enter product details"
                    cols="30" rows="10" required maxlength="500"></textarea>
                </div>    
                <input type="submit" name="add_product" value="add product" class="btn">
            </div>
        </form>
    </section>

    <!-- show-products section -->
    <section class="show-products" style="padding-top: 0;">

        <h1 class="heading">products added</h1>

        <div class="box-container">

            <div class="box">
                <img src="../uploaded_img/" alt="">
                <div class="name">kkk</div>
                <div class="price">$8/-</div>
                <div class="details">ooo</div>

                <div class="flex-btn">
                    <a href="./update_product.php"
                    class="option-btn">update</a>
                    <a href="./products.php" class="delete-btn"
                    onclick="return confirm('delete this product?');">delete</a>
                </div>
            </div>      


            <p class="empty">no products added yet!</p>
    
        </div>

    </section>

@endsection




