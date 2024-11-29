@extends('layouts.admin_app')

@section('title', 'admin_register')


@section('content')

    <!-- update-product section -->
    <section class="update-product">

        <h1 class="heading">update product</h1>


        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="pid" value="">
            <input type="hidden" name="old_image_01" value="">
            <input type="hidden" name="old_image_02" value="">
            <input type="hidden" name="old_image_03" value="">
            <div class="image-container">
                <div class="main-image">
                    <img src="../uploaded_img/" alt="">
                </div>

                <div class="sub-images">
                    <img src="../uploaded_img/" alt="">
                    <img src="../uploaded_img/" alt="">
                    <img src="../uploaded_img/" alt="">
                </div>
                <span>update name</span>
                <input type="text" name="name" class="box" placeholder="enter product name"
                value="" maxlength="100">
                <span>update price</span>
                <input type="number" name="price" class="box" placeholder="enter product price" 
                value="" min="0" max="9999999999" onkeypress="if(this.value.length == 10) return false;">
                <span>update details</span>
                <textarea name="details" class="box" placeholder="enter product details"
                cols="30" rows="10" required maxlength="500"></textarea>
                <span>update image 01</span>
                <input type="file" name="image_01" class="box" accept="image/jpg, image/jpeg, image/webp,
                image/png">
                <span>update image 02</span>
                <input type="file" name="image_02" class="box" accept="image/jpg, image/jpeg, image/webp,
                image/png">
                <span>update image 03</span>
                <input type="file" name="image_03" class="box" accept="image/jpg, image/jpeg, image/webp,
                image/png">

                <div class="flex-btn">
                    <input type="submit" name="update" class="btn" value="update">
                    <a href="./products.php" class="option-btn">go back</a>
                </div>
            </div>
        </form>
                

        <p class="empty">no products added yet!</p>

    </section>


@endsection




