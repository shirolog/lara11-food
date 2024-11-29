@extends('layouts.admin_app')

@section('title', 'admin_register')


@section('content')

   <!-- accounts section -->
    <section class="accounts">

        <h1 class="heading">admins accounts</h1>

        <div class="box-container">
            
            <div class="box">
                <p>register new admin</p>
                <a href="{{url('/admin_register')}}" class="option-btn">register</a>
            </div>

            <div class="box">
                <p>admin id : 5</span></p>
                <p>username : 4</span></p>
                <div class="flex-btn">
                <a href="./admin_accounts.php" class="delete-btn" 
                onclick="return confirm('delete this account?');">delete</a>
                
                
                </div>
            </div>

                


            <p class="empty">no accounts available!</p>

        </div>

    </section>
@endsection




