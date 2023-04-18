<div class="side_nav col-sm-12 col-md-3">
    <ul class="side_nav_links">
        <li>
            <button class="side_nav_button" onclick="display('sub_side_nav_links')">
                Categories<span class="material-symbols-outlined">expand_more</span>
            </button>
            <ul id="sub_side_nav_links" class="sub_side_nav_links">
                <li class="side_nav_link">
                <!-- <a href="{{ route('shop', ['category' => 'vegetables', 'price' => 10]) }}" class="side_nav_link"> -->
                    <a href="{{ url('/shop') }}">
                        All<!-- <button class="side_nav_button">All</button> -->
                    </a>
                </li>
                <li class="side_nav_link">
                    <a href="{{ url('/shop') . '?' . http_build_query(['category' => 'flowers']) }}">
                        Flowers<!-- <button class="side_nav_button">Flowers</button> -->
                    </a>
                </li>
                <li class="side_nav_link">
                    <a href="{{ url('/shop') . '?' . http_build_query(['category' => 'trees']) }}">
                        Trees<!-- <button class="side_nav_button">Trees</button> -->
                    </a>
                </li>
                <li class="side_nav_link">
                    <a href="{{ url('/shop') . '?' . http_build_query(['category' => 'fruits']) }}">
                        Fruits<!-- <button class="side_nav_button">Fruits</button> -->
                    </a>
                </li>
                <li class="side_nav_link">
                    <a href="{{ url('/shop') . '?' . http_build_query(['category' => 'vegetables']) }}">
                        Vegetables<!-- <button class="side_nav_button">Vegetables</button> -->
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <button class="side_nav_button" onclick="display('side_nav_filters')">
                Price<span class="material-symbols-outlined">expand_more</span>
            </button>
            <ul id="side_nav_filters" class="side_nav_filters">
                <li>
                    <!-- <form method="get" action="{{ route('shop', ['a' => 'a']) }}"> -->
                    <form method="get" action="{{ route('shop') }}">
                    <!-- <form> -->
                        <!-- <label class="filter_label">Price</label> -->
                        <div class="price_values">
                            <div class="price_value_range">
                                <label class="price_label" for="price_input_min">Min</label>
                                <input id="price_input_min" class="price_input" name="min_price" type="number" min="0" max="{{ $max_price }}" value="{{ $min_price }}" step="0.01">
                            </div>
                            <div class="price_value_range">
                                <label class="price_label" for="price_input_max">Max</label>
                                <input id="price_input_max" class="price_input" name="max_price" type="number" min="{{ $min_price }}" value="{{ $max_price }}" step="0.01">
                            </div>
                        </div>
                        <button class="set_price_button" type="submit">Set</button>
                    </form>
                </li>
            </ul>
        </li>
        <li>
            <button class="side_nav_button" onclick="display('')">
                Filter<span class="material-symbols-outlined">expand_more</span>
            </button>
        </li>
    </ul>

    <ul class="side_nav_links_SS row">  <!-- small screen = SS -->
        <li class="col">
            <button class="side_nav_button_SS dropdown dropdown-hover" data-bs-toggle="dropdown">
                Categories<span class="material-symbols-outlined">expand_more</span>
            </button>
            <ul class="side_nav_sub_links_SS dropdown-menu">
                <li>
                    <a href="{{ url('/shop') }}" class="side_nav_link_SS dropdown-item">
                        All
                    </a>
                </li>
                <li>
                    <a href="{{ url('/shop') . '?' . http_build_query(['category' => 'flowers']) }}" class="side_nav_link_SS dropdown-item">
                        Flowers
                    </a>
                </li>
                <li>
                    <a href="{{ url('/shop') . '?' . http_build_query(['category' => 'trees']) }}" class="side_nav_link_SS dropdown-item">
                        Trees
                    </a>
                </li>
                <li>
                    <a href="{{ url('/shop') . '?' . http_build_query(['category' => 'fruits']) }}" class="side_nav_link_SS dropdown-item">
                        Fruits
                    </a>
                </li>
                <li>
                    <a href="{{ url('/shop') . '?' . http_build_query(['category' => 'vegetables']) }}" class="side_nav_link_SS dropdown-item">
                        Vegetables
                    </a>
                </li>
            </ul>
        </li>
        <li class="col">
            <button class="side_nav_button_SS dropdown dropdown-hover" data-bs-toggle="dropdown">
                Filters<span class="material-symbols-outlined">expand_more</span>
            </button>
            <ul class="side_nav_filters_SS side_nav_sub_links_SS dropdown-menu">
                <li class="dropdown-item">
                    <label class="filter_label">Price</label>
                    <!-- <form method="get" action="{{ route('shop', ['a' => 'a']) }}"> -->
                    <form method="get" action="{{ route('shop') }}">
                    <!-- <form> -->
                        <!-- <label class="filter_label">Price</label> -->
                        <div class="price_values">
                            <div class="price_value_range">
                                <label class="price_label" for="price_input_min">Min</label>
                                <input id="price_input_min" class="price_input" name="min_price" type="number" min="0" max="{{ $max_price }}" value="{{ $min_price }}" step="0.01">
                            </div>
                            <div class="price_value_range">
                                <label class="price_label" for="price_input_max">Max</label>
                                <input id="price_input_max" class="price_input" name="max_price" type="number" min="{{ $min_price }}" value="{{ $max_price }}" step="0.01">
                            </div>
                        </div>
                        <button class="set_price_button" type="submit">Set</button>
                    </form>
                </li>
                <li class="dropdown-item">
                    <label class="filter_label">Filter</label>
                </li>
            </ul>
        </li>
        <li class="col">
            <button class="side_nav_button_SS dropdown dropdown-hover" data-bs-toggle="dropdown">
                Order by<span class="material-symbols-outlined">expand_more</span>
            </button>
            <ul class="side_nav_sub_links_SS dropdown-menu dropdown-menu-end">
                <li>
                    <a href="{{ request()->fullUrlWithQuery(['order_by' => 'best_sellers','order_type'=>'asc']) }}"  class="side_nav_link_SS dropdown-item">
                        Best-sellers
                    </a>
                </li>
                <li>
                    <a href="{{ request()->fullUrlWithQuery(['order_by' => 'updated_at','order_type'=>'desc']) }}"  class="side_nav_link_SS dropdown-item">
                        New
                    </a>
                </li>
                <li>
                    <a href="{{ request()->fullUrlWithQuery(['order_by' => 'price','order_type'=>'desc']) }}"  class="side_nav_link_SS dropdown-item">
                        € High to low
                    </a>
                </li>
                <li>
                <a href="{{ request()->fullUrlWithQuery(['order_by' => 'price','order_type'=>'asc']) }}"  class="side_nav_link_SS dropdown-item">
                        € Low to high
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>