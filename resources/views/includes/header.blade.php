<header class="header">
    <section class="site_name_logo">
        <a href="index.html" class="website_name_a">
            <img class="logo" src="{{asset('assets/logo/wtech_logo_v2-removebg-preview.png')}}" alt="logo">
            <h3 class="website-name">Plant Hub</h3>
        </a>
    </section>
    <section class="search-form">
        <label class="search-form">
            <input type="text" placeholder="Search...">
        </label>
        <button type="submit" onclick="window.location.href='shop.html'"><span
            class="material-symbols-outlined">search</span></button>
    </section>
    <nav class="show_all_nav">
        <ul class="nav_links">
            <li class="home_button"><a href="index.html">Home</a></li>
            <li><a href="shop.html">Shop</a></li>
            <li><a href="contact.html">Contact</a></li>
            <li><a href="{{ url('cart/') }}"><span class="material-symbols-outlined">shopping_cart</span></a></li>
            <p>{{auth()->user()}}</p>
        @if( auth()->check() and auth()->user()->first_name != NULL)
                <li><a href="#">{{ auth()->user()->first_name . " " . auth()->user()->last_name }}</a></li>
            @else
                <li><a href="{{url('login')}}">Login</a></li>
            @endif
        </ul>
        <div class="dropdown dropdown-hover">
            <button type="button" class="btn shadow-none" data-bs-toggle="dropdown">
                <span class="material-symbols-outlined">menu</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end dropdown_content">
                <li><a href="index.html">Home</a></li>
                <li><a href="shop.html">Shop</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="{{url('cart')}}">Cart</a></li>
                @if( auth()->check() /*and auth()->user()->first_name != NULL*/)
                    <li><form name="logout-form" class="m-0 p-0" action="{{url('logout')}}" method="post">
                        <a onclick="document.forms['logout-form'].submit()">Logout</a>
                        @method('delete')
                        @csrf
                        </form></li>
                @else
                    <li><a href="{{url('login')}}">Login</a></li>
                @endif
            </ul>
        </div>
    </nav>
</header>
