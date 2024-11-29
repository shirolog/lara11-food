@include('components.message')

<header class="header">

    <section class="flex">

    <a href="{{url('/dashboard')}}" class="logo">Admin<span>Panel</span></a>

    <nav class="navbar">
        <a href="{{url('/dashboard')}}">home</a>
        <a href="{{url('/products')}}">products</a>
        <a href="{{url('/placed_orders')}}">orders</a>
        <a href="{{url('/admin_accounts')}}">admins</a>
        <a href="{{url('/user_accounts')}}">users</a>
        <a href="{{url('/messages')}}">messages</a>
    </nav>

    <div class="icons">
        <div id="menu-btn" class="fas fa-bars"></div>
        <div id="user-btn" class="fas fa-user"></div>
    </div>

    <div class="profile">
        @auth
            <p>{{Auth::user()->name}}</p>
            <a href="{{url('/update_profile')}}" class="btn">update profile</a>
            <div class="flex-btn">
                <a href="{{url('/admin_login')}}" class="option-btn">login</a>
                <a href="{{url('/admin_register')}}" class="option-btn">register</a>
            </div>
            <a href="{{route('admin.logout')}}" class="delete-btn"
            onclick="return confirm('logout from this website?');">logout</a>
        @else            

            <div class="flex-btn">
                <a href="{{url('/admin_login')}}" class="option-btn">login</a>
                <a href="{{url('/admin_register')}}" class="option-btn">register</a>
            </div>
        @endauth
   
    </div>

    </section>
</header>