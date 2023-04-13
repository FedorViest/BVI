<div class="orderby_buttons">
    <ul class="row">
        <li class="col order_by_link">
            <a href="{{ request()->fullUrlWithQuery(['order_by' => 'id','order_type'=>'asc']) }}">
                Best-sellers
            </a>
        </li>
        <li class="col order_by_link">
            <a href="{{ request()->fullUrlWithQuery(['order_by' => 'name','order_type'=>'asc']) }}">
                New
            </a>
        </li>
        <li class="col order_by_link">
            <a href="{{ request()->fullUrlWithQuery(['order_by' => 'price','order_type'=>'desc']) }}">
                € High to low
            </a>
        </li>
        <li class="col order_by_link">
        <a href="{{ request()->fullUrlWithQuery(['order_by' => 'price','order_type'=>'asc']) }}">
                € Low to high
            </a>
        </li>
    </ul>
</div>