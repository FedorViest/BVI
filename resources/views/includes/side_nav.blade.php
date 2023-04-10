<div class="side_nav col-md-3">
    <ul class="side_nav_links">
        <li>
            <button class="side_nav_button" onclick="display('sub_side_nav_links')">
                Categories<span class="material-symbols-outlined">expand_more</span>
            </button>
            <ul id="sub_side_nav_links" class="sub_side_nav_links">
                <li>
                    <button class="side_nav_button">Flowers</button>
                </li>
                <li>
                    <button class="side_nav_button">Trees</button>
                </li>
                <li>
                    <button class="side_nav_button">Fruit</button>
                </li>
                <li>
                    <button class="side_nav_button">Vegetables</button>
                </li>
            </ul>
        </li>
        <li>
            <button class="side_nav_button" onclick="display('side_nav_filters')">
                Filters<span class="material-symbols-outlined">expand_more</span>
            </button>
            <ul id="side_nav_filters" class="side_nav_filters">
                <li>
                    <label class="filter_label">Price</label>
                    <div class="price_values">
                        <div class="price_value_range">
                            <label>
                                <input class="checkbox" type="checkbox"
                                        onclick="clicked_checkbox(this, 'price_input_min')">
                            </label>
                            <label class="price_label" for="price_input_min">Min</label>
                            <input id="price_input_min" class="price_input price_input_min" type="number" value="0">
                        </div>
                        <div class="price_value_range">
                            <label>
                                <input class="checkbox" type="checkbox" checked
                                        onclick="clicked_checkbox(this, 'price_input_max')">
                            </label>
                            <label class="price_label" for="price_input_max">Max</label>
                            <input id="price_input_max" class="price_input" type="number" value="19.99">
                        </div>
                    </div>
                    <button class="set_price_button">Set</button>
                </li>
            </ul>
        </li>
    </ul>

    <ul class="side_nav_links_SS row">  <!-- small screen = SS -->
        <li class="col">
            <button class="side_nav_button_SS dropdown dropdown-hover" data-bs-toggle="dropdown">
                Categories<span class="material-symbols-outlined">expand_more</span>
            </button>
            <ul class="side_nav_sub_links_SS dropdown-menu">
                <li>
                    <button class="side_nav_button_SS dropdown-item">Flowers</button>
                </li>
                <li>
                    <button class="side_nav_button_SS dropdown-item">Trees</button>
                </li>
                <li>
                    <button class="side_nav_button_SS dropdown-item">Fruit</button>
                </li>
                <li>
                    <button class="side_nav_button_SS dropdown-item">Vegetables</button>
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
                    <div class="price_values">
                        <div class="price_value_range">
                            <label>
                                <input class="checkbox" type="checkbox"
                                        onclick="clicked_checkbox(this, 'price_input_min_SS')">
                            </label>
                            <label class="price_label" for="price_input_min_SS">Min</label>
                            <input id="price_input_min_SS" class="price_input price_input_min" type="number" value="0">
                        </div>
                        <div class="price_value_range">
                            <label>
                                <input class="checkbox" type="checkbox" checked
                                        onclick="clicked_checkbox(this, 'price_input_max_SS')">
                            </label>
                            <label class="price_label" for="price_input_max_SS">Max</label>
                            <input id="price_input_max_SS" class="price_input" type="number" value="19.99">
                        </div>
                    </div>
                    <button class="set_price_button_SS">Set</button>
                </li>
            </ul>
        </li>
        <li class="col">
            <button class="side_nav_button_SS dropdown dropdown-hover" data-bs-toggle="dropdown">
                Order by<span class="material-symbols-outlined">expand_more</span>
            </button>
            <ul class="side_nav_sub_links_SS dropdown-menu dropdown-menu-end">
                <li>
                    <button class="side_nav_button_SS dropdown-item">Best-sellers</button>
                </li>
                <li>
                    <button class="side_nav_button_SS dropdown-item">New</button>
                </li>
                <li>
                    <button class="side_nav_button_SS dropdown-item">€ High to low</button>
                </li>
                <li>
                    <button class="side_nav_button_SS dropdown-item">€ Low to high</button>
                </li>
            </ul>
        </li>
    </ul>
</div>