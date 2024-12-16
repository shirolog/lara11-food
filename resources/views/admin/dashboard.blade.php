@extends('layouts.admin_app')

@section('title', 'dashboard')


@section('content')

    <!-- dashboard section -->
    
    <section class="dashboard">

        <h1 class="heading">dashboard</h1>

        <div class="box-container">
            
                <div class="box">
                    <h3>welcome!</h3>
                    <p>{{Auth::guard('admin')->user()->name}}</p>
                    <a href="{{url('admin_update_profile', Auth::guard('admin')->user()->id)}}" class="btn">update profile</a>
                </div>
            
                <div class="box">

                        <h3><span>$</span>{{number_format($total_pending)}}<span>/-</span></h3>
                        <p>total pendings</p>
                        <a href="{{url('/pending_orders')}}" class="btn">see orders</a>
                
                </div>
            
                <div class="box">

                        <h3><span>$</span>{{number_format($total_complete)}}<span>/-</span></h3>
                        <p>total completes</p>
                        <a href="{{url('/completed_orders')}}" class="btn">see orders</a>
                </div>
            
                <div class="box">
                    <h3>${{number_format($total_orders)}}/-</h3>
                    <p>total orders</p>
                    <a href="{{url('/placed_orders')}}" class="btn">see orders</a>
                </div>
            
                <div class="box">
                    <h3>{{$products_total}}</h3>
                    <p>products added</p>
                    <a href="{{url('/products')}}" class="btn">see products</a>
                </div>
            
                <div class="box">
                    <h3>{{$user_account_total}}</h3>
                    <p>users accounts</p>
                    <a href="{{url('user_accounts')}}" class="btn">see users</a>
                </div>
            
                <div class="box">
                    <h3>{{$admin_account_total}}</h3>
                    <p>admins</p>
                    <a href="{{url('admin_accounts')}}" class="btn">see admins</a>
                </div>
            
                <div class="box">
                    <h3>{{$total_messages}}</h3>
                    <p>new messages</p>
                    <a href="{{url('/messages')}}" class="btn">see messages</a>
                </div>
        </div>
    </section>
   
@endsection




