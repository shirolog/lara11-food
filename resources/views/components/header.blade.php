@include('components.message')

<header class="header">
    <section class="flex">
        <a href="{{url('/')}}" class="logo">yum-yum 😋</a>
        <nav class="navbar">
            <a href="{{url('/')}}">home</a>
            <a href="{{url('/about')}}">about</a>
            <a href="{{url('/menu')}}">menu</a>
            <a href="{{url('/orders')}}">orders</a>
            <a href="{{url('/contact')}}">contact</a>
        </nav>

        <div class="icons">
            <a href="{{url('/search')}}"><i class="fas fa-search"></i></a>
            <a href="{{url('/cart')}}"><i class="fas fa-shopping-cart"></i><span>({{$cart_total}})</span></a>
            <div class="fas fa-user" id="user-btn"></div>
            <div class="fas fa-bars" id="menu-btn"></div>
        </div>

        <div class="profile">
            @auth
                <p class="name">{{Auth::user()->name}}</p>
                <div class="flex">
                    <a href="{{url('/profile')}}" class="btn">profile</a>
                    <a href="{{route('user.logout')}}" class="delete-btn" onclick="return confirm('logout from this website?');">logout</a>
                </div>
                <p class="account"><a href="{{url('/login')}}">login</a> or  <a href="{{url('/register')}}">register</a></p>
            @else
                <p class="name">please login first</p>    
                <a href="{{url('/login')}}" class="btn">login</a>
            @endauth
        </div>
    </section>
</header>