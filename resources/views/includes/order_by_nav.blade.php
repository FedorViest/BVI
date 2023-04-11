<div class="orderby_buttons">
    <ul class="row">
        <li class="col">
            <a href="{{ request()->fullUrlWithQuery(['order_by' => 'id','order_type'=>'asc']) }}">
                <button class="order_by_btn" onclick="order_by_clicked(0)">Best-sellers</button>
            </a>
        </li>
        <li class="col">
            <a href="{{ request()->fullUrlWithQuery(['order_by' => 'name','order_type'=>'asc']) }}">
                <button class="order_by_btn" onclick="order_by_clicked(1)">New</button>
            </a>
        </li>
        <li class="col">
            <a href="{{ request()->fullUrlWithQuery(['order_by' => 'price','order_type'=>'desc']) }}">
                <button class="order_by_btn" onclick="order_by_clicked(2)">€ High to low</button>
            </a>
        </li>
        <li class="col">
        <a href="{{ request()->fullUrlWithQuery(['order_by' => 'price','order_type'=>'asc']) }}">
                <button class="order_by_btn" onclick="order_by_clicked(3)">€ Low to high</button>
            </a>
        </li>
    </ul>
</div>