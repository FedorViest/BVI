<header class="header">
    <section class="site_name_logo">
        <a href="{{url('index')}}" class="website_name_a">
            <img class="logo" src="{{asset('assets/logo/wtech_logo_v2-removebg-preview.png')}}" alt="logo">
            <h3 class="website-name">Plant Hub</h3>
        </a>
    </section>
    <form action="{{url('shop')}}" method="get" class="search-form">
        @csrf <!-- Add CSRF token for security -->
        <label class="search-form" for="query"></label>
        <input type="text" name="search_query" id="query" placeholder="Search..." value="{{isset($search_query) ? $search_query : ''}}">
        <button type="submit"><span class="material-symbols-outlined">search</span></button>
    </form>
    <nav class="show_all_nav">
        <ul class="nav_links">
            <li class="home_button"><a href="{{url('index')}}">Home</a></li>
            <li><a href="{{url('shop')}}">Shop</a></li>
            <li><a href="{{url('contact')}}">Contact</a></li>
            <li><a href="{{ url('cart/') }}"><span class="material-symbols-outlined">shopping_cart</span></a></li>
            <!--<p>{{auth()->user()}}</p>-->
            @if( auth()->check() and auth()->user()->role != \App\Enums\ProfileRoleEnum::Temp)
                <li>
                    <a href="#" data-bs-toggle="dropdown">
                        {{ auth()->user()->first_name . " " . auth()->user()->last_name }}
                    </a>
                    <ul class="dropdown-menu dropdown_content">
                        @if(auth()->user()->role == \App\Enums\ProfileRoleEnum::Admin)
                            <li><a href="{{url('admin')}}">Admin menu</a></li>
                        @endif
                            <li><a href="#" class="a_logout" onclick="document.forms['logout-form'].submit()">Logout</a></li>
                            <form name="logout-form" class="m-0 p-0" action="{{url('logout')}}" method="post">
                                @method('delete')
                                @csrf
                            </form>
                    </ul>
                </li>
            @else
                <li><a href="{{url('login')}}">Login</a></li>
            @endif
        </ul>
        <div class="dropdown dropdown-hover">
            <button type="button" class="btn shadow-none" data-bs-toggle="dropdown">
                <span class="material-symbols-outlined">menu</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end dropdown_content">
                <li><a href="{{url('index')}}">Home</a></li>
                <li><a href="{{url('shop')}}">Shop</a></li>
                <li><a href="{{url('contact')}}">Contact</a></li>
                <li><a href="{{url('cart')}}">Cart</a></li>
                @if(auth()->check() and auth()->user()->role == \App\Enums\ProfileRoleEnum::Admin)
                    <li><a href="{{url('admin')}}">Admin menu</a></li>
                @endif
                @if( auth()->check() and auth()->user()->role != \App\Enums\ProfileRoleEnum::Temp)
                    <li><a href="#" class="a_logout" onclick="document.forms['logout-form'].submit()">Logout</a></li>
                        <form name="logout-form" class="m-0 p-0" action="{{url('logout')}}" method="post">
                        @method('delete')
                        @csrf
                        </form>
                @else
                    <li><a href="{{url('login')}}">Login</a></li>
                @endif
            </ul>
        </div>
    </nav>
</header>
