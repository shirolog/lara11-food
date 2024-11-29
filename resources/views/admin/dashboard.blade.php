@extends('layouts.admin_app')

@section('title', 'dashboard')


@section('content')

    <!-- dashboard section -->
    
    <section class="dashboard">

        <h1 class="heading">dashboard</h1>

        <div class="box-container">
            
                <div class="box">
                    <h3>welcome!</h3>
                    <p>5</p>
                    <a href="./update_profile.php" class="btn">update profile</a>
                </div>
            
                <div class="box">

                        <h3><span>$</span>8<span>/-</span></h3>
                        <p>total pendings</p>
                        <a href="./placed_orders.php" class="btn">see orders</a>
                
                </div>
            
                <div class="box">

                        <h3><span>$</span>5<span>/-</span></h3>
                        <p>total completes</p>
                        <a href="./placed_orders.php" class="btn">see orders</a>
                </div>
            
                <div class="box">
                    <h3>8</h3>
                    <p>total orders</p>
                    <a href="./placed_orders.php" class="btn">see orders</a>
                </div>
            
                <div class="box">
                    <h3>6</h3>
                    <p>products added</p>
                    <a href="./products.php" class="btn">see products</a>
                </div>
            
                <div class="box">
                    <h3>8</h3>
                    <p>users accounts</p>
                    <a href="./users_accounts.php" class="btn">see users</a>
                </div>
            
                <div class="box">
                    <h3>2</h3>
                    <p>admins</p>
                    <a href="./admin_accounts.php" class="btn">see admins</a>
                </div>
            
                <div class="box">
                    <h3>1</h3>
                    <p>new messages</p>
                    <a href="./messages.php" class="btn">see messages</a>
                </div>
        </div>
    </section>
   
@endsection




