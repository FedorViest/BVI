<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>
<body>
<!-- Header-->
@include('includes.header')
<!-- end Header -->

<section class="content">
    <!-- Cart Navigation -->
    @include('includes.nav_cart')
    <script>
        $(document).ready(function() {
            $('input[type="radio"][name="shipping"]').click(async function() {
                var selectedValue = JSON.parse($(this).val());
                var formData = new FormData();
                formData.append('_method', 'PATCH');
                formData.append('payment', selectedValue.type);
                if (selectedValue.price === "Free"){
                    formData.append('price', 0);
                }
                else{
                    formData.append('price', parseInt(selectedValue.price.split("€")[0]));
                }

                // You can use AJAX to send the selected value to the Laravel backend
                if (await send_ajax(formData)){
                    $('.details_shipping').text(selectedValue.type);
                    $('.details_shipping_price').text(selectedValue.price);
                    set_total_price();
                }


            });
            $('input[type="radio"][name="payment"]').click(async function() {
                var selectedValue = JSON.parse($(this).val());
                var formData = new FormData();
                formData.append('_method', 'PATCH');
                formData.append('shipping', selectedValue.type);
                if (selectedValue.price === "Free"){
                    formData.append('price', 0);
                }
                else{
                    formData.append('price', parseInt(selectedValue.price.split("€")[0]));
                }

                // You can use AJAX to send the selected value to the Laravel backend
                if (await send_ajax(formData)){
                    $('.details_payment').text(selectedValue.type);
                    $('.details_payment_price').text(selectedValue.price);
                    set_total_price();
                }
            });
        });

        function set_total_price(){
            var products = @json($cart->products);
            var total_price = 0;
            for (let i = 0; i < products.length; i++){
                total_price += products[i].price * products[i].quantity;
                //total_price = total_price.toFixed(2);
            }
            //var shipping = JSON.parse(document.querySelector('input[name="shipping"]:checked').value).price;
            //console.log(shipping);
            if (document.querySelector('input[name="shipping"]:checked')){
                const shipping_regex = JSON.parse(document.querySelector('input[name="shipping"]:checked').value).price.match(/^\d+(?:\.\d+)?/);
                if (shipping_regex){
                    const shipping = parseFloat(shipping_regex[0]);
                    if (!isNaN(shipping)){
                        total_price += shipping;
                    }
                }
            }
            if (document.querySelector('input[name="payment"]:checked')){
                const payment_regex = JSON.parse(document.querySelector('input[name="payment"]:checked').value).price.match(/^\d+(?:\.\d+)?/);
                if (payment_regex){
                    const payment = parseFloat(payment_regex[0]);
                    if (!isNaN(payment)){
                        total_price += payment;
                    }
                }
            }
            document.getElementById('total-price').value = total_price;
        }

        async function send_ajax(formData){
            var success = true;
            await $.ajax({
                url: '{{ route('shipping_payment.update', $cart->id) }}',
                data: formData,
                method: "POST",
                contentType : false,
                processData : false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response){
                    success = true;
                },
                error: function (response){
                    success = true;
                    //console.log(response.responseText);
                }
            });
            return success;
        }
    </script>
    <!-- end Cart navigation -->
    <section class="inside_content">
        <section class="outline_block">
            <form class="details_block">
                <h3 class="m-3 ms-4">Shipping Details</h3>
                <div class="row d-flex m-0 ps-5 pe-3">
                    <div class="col-1 p-0">
                        <label for="store"></label><input type="radio" id="store" name="shipping" value='{"type": "Store", "price": "Free"}'>
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
                        <label for="pickup"></label><input type="radio" id="pickup" name="shipping" value='{"type": "Pickup Point", "price": "1.99€"}'>
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
                        <label for="home"></label><input type="radio" id="home" name="shipping" value='{"type": "Home Delivery", "price": "2.99€"}'>
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
            <script>
                var shipping = {{$cart->delivery}};
                var radioButtons = document.getElementsByName("shipping");
                for(var i = 0; i < radioButtons.length; i++) {
                    if(JSON.parse(radioButtons[i].value).type === shipping) {
                        radioButtons[i].checked = true;
                        break;
                    }
                }
            </script>
            <form class="details_block">
                <h3 class="m-3 ms-4">Payment Details</h3>
                <div class="row d-flex m-0 ps-5 pe-3">
                    <div class="col-1 p-0">
                        <label for="card"></label><input type="radio" id="card" name="payment" value='{"type": "Credit Card", "price": "Free"}'>
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
                        <label for="cash"></label><input type="radio" id="cash" name="payment" value='{"type": "Cash", "price": "0.99€"}'>
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
                        <label for="bank"></label><input type="radio" id="bank" name="payment" value='{"type": "Bank", "price": "Free"}'>
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
        <script>
            var payment = {{$cart->payment}};
            var radioButtons = document.getElementsByName("payment");
            for(var i = 0; i < radioButtons.length; i++) {
                if(JSON.parse(radioButtons[i].value).type === payment) {
                    radioButtons[i].checked = true;
                    break;
                }
            }
        </script>
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
                        <div class="col-4 align-items-center p-0 mb-2">
                            <p class="details m-0 p-0">Shipping</p>
                        </div>
                        <div class="col-3">
                            <div class="details_shipping"></div>
                        </div>
                        <div class="col-2">
                            <div class="details_shipping_price"></div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-around">
                        <div class="col-4 align-items-center p-0 mb-2">
                            <p class="details m-0 p-0">Payment</p>
                        </div>
                        <div class="col-3">
                            <div class="details_payment"></div>
                        </div>
                        <div class="col-2">
                            <div class="details_payment_price"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="row d-flex justify-content-around p-0 m-0">
                        <div class="col-9 align-items-center p-0 m-0">
                            <p class="total_price p-0 m-0">Total price</p>
                        </div>
                        <div class="col-2 p-0 m-0">
                                <label for="total-price">
                                </label>
                                <input class="total-price p-0 m-0" id="total-price" type="number" value="0">
                            <script>set_total_price();</script>
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
