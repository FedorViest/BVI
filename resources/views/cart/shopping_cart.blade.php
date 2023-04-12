<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="{{asset('css/shopping_cart.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/header.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/footer.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/button_1.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/cart_navbar.css')}}" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function increase(element) {
            var num = parseInt(document.getElementById(element).value);
            document.getElementById(element).value = num + 1;
        }

        function decrease(element) {
            var num = parseInt(document.getElementById(element).value);
            if (num > 1) {
                num = num - 1;
            }
            document.getElementById(element).value = num;
        }


    </script>
</head>
<body>
<!-- Header-->
@include('includes.header')
<!-- end Header -->


<section class="content">
    <!-- Cart Navbar-->
    <nav class="cart_navigation">
        <a class="nav_cart" href="shopping_cart.html">Shopping Cart</a>
        >>
        <a class="nav_shipping" href="shipping_payment.html">Shipping & Payment</a>
        >>
        <a class="nav_billing" href="billing_address.html">Billing Address</a>
    </nav>
    <!-- Cart Navbar-->
    <section class="inside_content">
        <div class="container-fluid w-100 p-0 m-0">
            @foreach($cart->products as $product)
                <div class="row justify-content-around m-0">
                    <div class="col-9 col-lg-5 col-md-6 col-sm-7 d-inline-block m-0 p-0">
                        <div class="flex-row d-flex">
                            <img class="img-thumbnail" src="{{asset('photos/' . $product->photos[0])}}" alt="Cherry tree">  <!-- https://pixabay.com/photos/a-tree-nature-heart-cherry-flowers-5255288/ -->
                            <div class="col m-2">
                                <h3>{{$product->name}}</h3>
                                <p>{{$product->short_description}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-3 col-lg-3 col-md-3 col-sm-5 align-items-center gap-4 justify-content-end m-0 p-0">
                        <div class="d-flex justify-content-between flex-row align-items-center m-0 p-0">
                            <!--<div class="align-items-center d-flex">-->
                            <div class="counter m-0 p-0">
                                <button class="button_counter" onclick="increase('num_counter-{{$product->id}}')"><span
                                        class="material-symbols-outlined">add</span></button>
                                <label>
                                    <input class="num_counter" id="num_counter-{{$product->id}}" type="number" value="{{$product->quantity}}">
                                </label>
                                <button class="button_counter align-items-center" onclick="decrease('num_counter-{{$product->id}}')"><span
                                        class="material-symbols-outlined">remove</span></button>
                            </div>
                            <!--</div>-->
                            <div class="price-div align-items-center d-flex  m-0 p-0">{{$product->price}}</div>
                            <div class="delete-div align-items-center d-flex  m-0 p-0">
                                <span class="material-symbols-outlined">delete</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <hr>
            <div class="row d-flex justify-content-around m-0">
                <div class="col-6"></div>
                <div class="row d-flex flex-column align-content-end">
                    <div class="col-4">
                        <div class="row-12 d-flex">
                            <div class="col-6">
                                <h6 class="total_price">Total price</h6>
                            </div>
                            <div class="col-6">
                                <div class="total_price">53.77€</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 d-flex justify-content-center text-center m-0">
                        <button type="button" class="btn_custom" onclick="window.location.href='shipping_payment.html'">
                            Checkout
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
<!-- Footer-->
@include('includes.footer')

<!-- end Footer-->
</body>
</html>
