@extends('layouts.admin_app')

@section('title', 'admin_register')


@section('content')

    <!-- accounts section -->
    <section class="accounts">

        <h1 class="heading">users accounts</h1>

        <div class="box-container">

            <div class="box">
                <p>user id : <span></span></p>
                <p>username : <span></span></p>
                <a href="./users_accounts.php" class="delete-btn" 
                onclick="return confirm('delete this account?');">delete</a>
            </div>

            <p class="empty">no accounts available!</p>

        </div>

    </section>


@endsection




