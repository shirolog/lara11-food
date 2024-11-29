@extends('layouts.admin_app')

@section('title', 'admin_register')


@section('content')

    <!-- placed-orders section -->
    <section class="placed-orders">

        <h1 class="heading">placed orders</h1>

        <div class="box-container">

            <div class="box">
                <p>user id : <span>1</span></p>
                <p>placed on : <span>5</span></p>
                <p>name : <span>hh</span></p>
                <p>email : <span>kk</span></p>
                <p>number : <span>0125</span></p>
                <p>address : <span>hhh</span></p>
                <p>total products : <span>5</span></p>
                <p>total price : <span>$8/-</span></p>
                <p>payment method : <span>4</span></p>
                <form action="" method="post">
                    <input type="hidden" name="order_id" value="">
                    <select name="payment_status" class="drop-down">
                        <option value="" selected disabled></option>
                        <option value="pending">pending</option>
                        <option value="completed">completed</option>
                    </select>
                    <div class="flex-btn">
                        <input type="submit" name="update_payment" class="btn" value="update">
                        <a href="./placed_orders.php?" class="delete-btn"
                        onclick="return confirm('delete this order?');">delete</a>
                    </div>
                </form>
            </div>


            <p class="empty">no orders placed yet!</p>

        </div>

    </section>

@endsection




