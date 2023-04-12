<div class="orderby_buttons">
    <ul class="row">
        <li class="col">
            <a href="{{ request()->fullUrlWithQuery(['order_by' => 'id','order_type'=>'asc']) }}">
                <button class="order_by_btn">Best-sellers</button>
            </a>
        </li>
        <li class="col">
            <a href="{{ request()->fullUrlWithQuery(['order_by' => 'name','order_type'=>'asc']) }}">
                <button class="order_by_btn">New</button>
            </a>
        </li>
        <li class="col">
            <a href="{{ request()->fullUrlWithQuery(['order_by' => 'price','order_type'=>'desc']) }}">
                <button class="order_by_btn">€ High to low</button>
            </a>
        </li>
        <li class="col">
        <a href="{{ request()->fullUrlWithQuery(['order_by' => 'price','order_type'=>'asc']) }}">
                <button class="order_by_btn">€ Low to high</button>
            </a>
        </li>
    </ul>
</div>