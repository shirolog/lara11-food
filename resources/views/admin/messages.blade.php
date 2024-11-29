@extends('layouts.admin_app')

@section('title', 'admin_register')


@section('content')

    <!-- messages section -->
    <section class="messages">

        <h1 class="heading">new messages</h1>

        <div class="box-container">
                <div class="box">
                    <p>user id : <span>5</span></p>
                    <p>name : <span>lllds</span></p>
                    <p>number : <span>2525</span></p>
                    <p>email : <span>4555</span></p>
                    <p>message : <span>jjk</span></p>
                    <a href="./messages.php" class="delete-btn" 
                    onclick="return confirm('delete this message?');">delete</a>
                </div>

            <p class="empty">you have no messages</p>
            
        </div>

    </section>

@endsection




