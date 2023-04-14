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
    <script>
        const methods = {!! json_encode($methods) !!};
        $(document).ready(function () {
            $('input[type="radio"][name="shipping"]').click(async function () {
                var selectedValue = $(this).val();
                var formData = new FormData();
                formData.append('_method', 'PATCH');
                formData.append('shipping', selectedValue);
                // You can use AJAX to send the selected value to the Laravel backend
                if (await send_ajax(formData)) {
                    $('.details_shipping').text(selectedValue);
                    $('.details_shipping_price').text(methods.shipping[selectedValue].price);
                    set_total_price();
                }


            });
            $('input[type="radio"][name="payment"]').click(async function () {
                var selectedValue = $(this).val();
                var formData = new FormData();
                formData.append('_method', 'PATCH');
                formData.append('payment', selectedValue);

                // You can use AJAX to send the selected value to the Laravel backend
                if (await send_ajax(formData)) {
                    $('.details_payment').text(selectedValue);
                    $('.details_payment_price').text(methods.payment[selectedValue].price + " €");
                    set_total_price();
                }
            });
        });

        function set_total_price() {
            var products = @json($cart->products);
            var total_price = 0;
            for (let i = 0; i < products.length; i++) {
                total_price += products[i].price * products[i].quantity;
            }

            if (document.querySelector('input[name="shipping"]:checked')) {
                var shipping = methods.shipping[document.querySelector('input[name="shipping"]:checked').value];
                if (shipping) {
                    var val_s = parseFloat(shipping.price);
                    if (!isNaN(val_s)) {
                        total_price += val_s;
                    }
                }
            }
            if (document.querySelector('input[name="payment"]:checked')) {
                var payment = methods.payment[document.querySelector('input[name="payment"]:checked').value];
                if (payment) {
                    var val_p = parseFloat(payment.price);
                    if (!isNaN(val_p)) {
                        total_price += val_p;
                    }
                }
            }
            document.getElementById('total-price').value = total_price;
        }

        async function send_ajax(formData) {
            var success = false;
            await $.ajax({
                url: '{{ route('shipping_payment.update', $cart->id) }}',
                data: formData,
                method: "POST",
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    success = true;
                },
                error: function (response) {
                    success = false;
                    //console.log(response.responseText);
                }
            });
            return success;
        }

        /*var shipping = "{{$cart->delivery ?? 'None'}}";
        var radioButtonsShipping = document.getElementsByName("shipping");
        for(var i = 0; i < radioButtonsShipping.length; i++) {
            if(radioButtonsShipping[i].value === shipping) {
                radioButtonsShipping[i].checked = true;
                $('.details_shipping').text(shipping);
                $('.details_shipping_price').text(methods.shipping[shipping].price);
                set_total_price();
                break;
            }
        }

        var payment = "{{$cart->payment ?? 'None'}}";
        var radioButtonsPayment = document.getElementsByName("payment");
        for(var i = 0; i < radioButtonsPayment.length; i++) {
            if(radioButtonsPayment[i].value === payment) {
                radioButtonsPayment[i].checked = true;
                $('.details_payment').text(payment);
                $('.details_payment_price').text(methods.payment[payment].price);
                set_total_price();
                break;
            }
        }
        set_total_price();*/
    </script>
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
                @foreach($methods->shipping as $key => $value)
                    <div class="row d-flex m-0 ps-5 pe-3">
                        <div class="col-1 p-0">
                            @if($cart->delivery == $key)
                            <label for="{{$key}}"></label><input type="radio" id="{{$key}}" name="shipping"
                                                                 value='{{$key}}' checked>
                            @else
                            <label for="{{$key}}"></label><input type="radio" id="{{$key}}" name="shipping"
                                                                 value='{{$key}}'>
                            @endif
                        </div>
                        <div class="col-1 p-0">
                            <span class="material-symbols-outlined">{{$value->icon}}</span>
                        </div>
                        <div class="col-4 p-0">
                            {{$key}}
                        </div>
                        <div class="col-4 p-0">
                        </div>
                        <div class="col-2 p-0">
                            @if($value->price == 0)
                                Free
                            @else
                                {{$value->price}}€
                            @endif
                        </div>
                    </div>
                @endforeach
            </form>
            <form class="details_block">
                <h3 class="m-3 ms-4">Payment Details</h3>
                @foreach($methods->payment as $key => $value)
                    <div class="row d-flex m-0 ps-5 pe-3">
                        <div class="col-1 p-0">
                            @if($cart->payment == $key)
                                <label for="{{$key}}"></label><input type="radio" id="{{$key}}" name="payment"
                                                                     value='{{$key}}' checked>
                            @else
                                <label for="{{$key}}"></label><input type="radio" id="{{$key}}" name="payment"
                                                                     value='{{$key}}'>
                            @endif
                        </div>
                        <div class="col-1 p-0">
                            <span class="material-symbols-outlined">{{$value->icon}}</span>
                        </div>
                        <div class="col-4 p-0">
                            {{$key}}
                        </div>
                        <div class="col-4 p-0">
                        </div>
                        <div class="col-2 p-0">
                            @if($value->price == 0)
                                Free
                            @else
                                {{$value->price}}€
                            @endif
                        </div>
                    </div>
                @endforeach
            </form>
        </section>
        <section class="outline_cart_block">
            <!-- shopping cart content -->
            <div class="container">
                @foreach($cart->products as $product)
                    <div class="row d-flex justify-content-around">
                        <div class="col-7 d-inline-block">
                            <div class="row-12 d-flex">
                                <img class="img-thumbnail" src="{{asset('photos/' . $product->photos[0])}}"
                                     alt="{{$product->photos[0]}}">
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
                        <div class="details_shipping">{{$cart->delivery ?? "Not selected"}}</div>
                    </div>
                    <div class="col-2">
                        <div class="details_shipping_price">{{$cart->delivery_price}} €</div>
                    </div>
                </div>
                <div class="row d-flex justify-content-around">
                    <div class="col-4 align-items-center p-0 mb-2">
                        <p class="details m-0 p-0">Payment</p>
                    </div>
                    <div class="col-3">
                        <div class="details_payment">{{$cart->payment ?? "Not selected"}}</div>
                    </div>
                    <div class="col-2">
                        <div class="details_payment_price">{{$cart->payment_price}} €</div>
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
                        <input class="total-price p-0 m-0" id="total-price" type="number"
                               value="<?php  $val = 0;
                                        foreach ($cart->products as $product)
                                        {$val += $product->quantity * $product->price;}
                                        echo($val + $cart->delivery_price + $cart->payment_price);
                                        ?>">
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
