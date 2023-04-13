<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shipping & Payment</title>
    <link rel="stylesheet" href="{{asset('css/shipping_payment.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/shopping_cart.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/header.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/footer.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/button_1.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/cart_navbar.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/shipping_cart_table.css')}}" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<!-- Header-->
@include('includes.header')
<!-- end Header -->

<section class="content">
    <!-- Cart Navigation -->
    @include('includes.nav_cart')
    <!-- end Cart navigation -->
    <section class="inside_content">
        <section class="outline_block">
            <form class="details_block">
                <h3 class="m-3 ms-4">Shipping Details</h3>
                <div class="row d-flex m-0 ps-5 pe-3">
                    <div class="col-1 p-0">
                        <label for="store"></label><input type="radio" id="store" name="shipping" value="Store">
                    </div>
                    <div class="col-1 p-0">
                        <span class="material-symbols-outlined">store</span>
                    </div>
                    <div class="col-4 p-0">
                        Store
                    </div>
                    <div class="col-4 p-0">
                    </div>
                    <div class="col-2 p-0">
                        Free
                    </div>
                </div>
                <div class="row d-flex m-0 ps-5 pe-3">
                    <div class="col-1 p-0">
                        <label for="pickup"></label><input type="radio" id="pickup" name="shipping" value="Pickup">
                    </div>
                    <div class="col-1 p-0">
                        <span class="material-symbols-outlined">archive</span>
                    </div>
                    <div class="col-4 p-0">
                        Pickup Point
                    </div>
                    <div class="col-4 p-0">
                    </div>
                    <div class="col-2 p-0">
                        1.99€
                    </div>
                </div>
                <div class="row d-flex m-0 ps-5 pe-3">
                    <div class="col-1 p-0">
                        <label for="home"></label><input type="radio" id="home" name="shipping" value="Home">
                    </div>
                    <div class="col-1 p-0">
                        <span class="material-symbols-outlined">local_shipping</span>
                    </div>
                    <div class="col-4 p-0">
                        Home Delivery
                    </div>
                    <div class="col-4 p-0">
                    </div>
                    <div class="col-2 p-0">
                        2.99€
                    </div>
                </div>
            </form>
            <form class="details_block">
                <h3 class="m-3 ms-4">Payment Details</h3>
                <div class="row d-flex m-0 ps-5 pe-3">
                    <div class="col-1 p-0">
                        <label for="card"></label><input type="radio" id="card" name="payment" value="Card">
                    </div>
                    <div class="col-1 p-0">
                        <span class="material-symbols-outlined">credit_card</span>
                    </div>
                    <div class="col-4 p-0">
                        Credit Card
                    </div>
                    <div class="col-4 p-0">
                    </div>
                    <div class="col-2 p-0">
                        Free
                    </div>
                </div>
                <div class="row d-flex m-0 ps-5 pe-3">
                    <div class="col-1 p-0">
                        <label for="cash"></label><input type="radio" id="cash" name="payment" value="Cash">
                    </div>
                    <div class="col-1 p-0">
                        <span class="material-symbols-outlined">payments</span>
                    </div>
                    <div class="col-4 p-0">
                        Cash
                    </div>
                    <div class="col-4 p-0">
                    </div>
                    <div class="col-2 p-0">
                        0.99€
                    </div>
                </div>
                <div class="row d-flex m-0 ps-5 pe-3">
                    <div class="col-1 p-0">
                        <label for="bank"></label><input type="radio" id="bank" name="payment" value="Bank">
                    </div>
                    <div class="col-1 p-0">
                        <span class="material-symbols-outlined">payments</span>
                    </div>
                    <div class="col-4 p-0">
                        Internet Banking
                    </div>
                    <div class="col-4 p-0">
                    </div>
                    <div class="col-2 p-0">
                        Free
                    </div>
                </div>
            </form>
        </section>
        <section class="outline_cart_block">
            <!-- shopping cart content -->
            <div class="container">
                @foreach($cart->products as $product)
                <div class="row d-flex justify-content-around">
                    <div class="col-7 d-inline-block">
                        <div class="row-12 d-flex">
                            <img class="img-thumbnail" src="{{asset('photos/' . $product->photos[0])}}" alt="{{$product->photos[0]}}">
                            <!-- https://pixabay.com/photos/a-tree-nature-heart-cherry-flowers-5255288/ -->
                            <h4 class="col m-2">{{$product->name}}</h4>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="row d-flex">
                            <div class="col-4">{{$product->quantity}}x</div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="row d-flex">
                            <div class="col-4">{{$product->price * $product->quantity}}€</div>
                        </div>
                    </div>
                </div>
                <hr>
                @endforeach
                <div class="row d-flex justify-content-around">
                    <div class="col-8 align-items-center">
                        <p class="total_price">Total price</p>
                    </div>
                    <div class="col-2">
                        <div class="total_price"><?php $val = 0; foreach ($cart->products as $product){$val += $product->quantity * $product->price;} echo($val . '€'); ?></div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <section class="w-50 d-flex justify-content-center text-center pe-4">
        <button type="button" class="btn_custom" onclick="window.location.href='billing_address.html'">
            Checkout
        </button>
    </section>
</section>
<!-- Footer -->
@include('includes.footer')
<!-- end Footer -->
</body>
</html>
