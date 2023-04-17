<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Billing</title>
    <link rel="stylesheet" href="{{asset('css/billing_address.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/header.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/footer.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/button_1.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/shipping_cart_table.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/cart_navbar.css')}}" type="text/css">
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
    <!-- end Cart navigation -->
    <section class="inside_content">
        <section class="outline_block">
            <form class="details_block">
                <h3>Billing address</h3>
                <!-- Billing section -->
                <section class="billing_section">
                    <Label for="profiles.first_name">First Name<br></Label>
                    <label class="input_label">
                        <input type="text" placeholder="Type in your first name..." id="profiles.first_name" value="{{$profile->first_name ?? ''}}">
                    </label>
                </section>
                <!-- end Billing section -->
                <!-- Billing section -->
                <section class="billing_section">
                    <Label for="profiles.last_name">Last Name<br></Label>
                    <label class="input_label">
                        <input type="text" placeholder="Type in your last name..." id="profiles.last_name" value="{{$profile->last_name ?? ''}}">
                    </label>
                </section>
                <!-- end Billing section -->
                <!-- Billing section -->
                <section class="billing_section">
                    <Label for="addresses.postcode">Postcode<br></Label>
                    <label class="input_label">
                        <input type="text" placeholder="Type in your postcode..." id="addresses.postcode" value="{{$profile->postcode ?? ''}}">
                    </label>
                </section>
                <!-- end Billing section -->
                <section class="billing_section">
                    <Label for="profiles.phone_number">Phone Number<br></Label>
                    <div class="input_label">
                        +<label for="profiles.phone_prefix"></label><input type="text" placeholder="421" id="profiles.phone_prefix" style="width: 50px" value="{{$profile->phone_prefix ?? ''}}">
                        <input type="text" placeholder="Mobile phone number" id="profiles.phone_number" value="{{$profile->phone_number ?? ''}}">
                    </div>
                </section>
                <!-- Billing section -->
                <section class="billing_section">
                    <Label for="profiles.email">Email address<br></Label>
                    <label class="input_label">
                        <input type="text" placeholder="Type in your Email address..." id="profiles.email" value="{{$profile->email ?? ''}}">
                    </label>
                </section>
                <!-- end Billing section -->
                <section class="billing_section">
                    <Label for="addresses.street">Street address<br></Label>
                    <div class="input_label">
                        <input type="text" placeholder="Type in your street name" id="addresses.street" value="{{$profile->street ?? ''}}">
                        <label for="addresses.street_number"></label><input type="text" placeholder="Nr." style="width: 70px" id="addresses.street_number" value="{{$profile->street_number ?? ''}}">
                    </div>
                </section>
            </form>
            <script>
                // get the form element

                function send_ajax(formData) {
                    var success = false;

                    $.ajax({
                        url: '{{ route('billing.update', $cart->id) }}',
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


                const form = document.querySelector('.details_block');

                // define the event listener function
                function inputHandler(event) {
                    // this function will be called whenever the input value changes
                    if (event.target.id !== 'profiles.email'){
                        var formData = new FormData();
                        formData.append('_method', 'PATCH');
                        formData.append('column', event.target.id);
                        formData.append('value', event.target.value);
                        send_ajax(formData);
                    }
                    console.log('Input value changed:', event.target.value, event.target.id);
                    // do whatever you need to do with the input value here
                }

                // add the event listener to the form
                form.addEventListener('change', function(event) {
                    // check if the event target is an input element
                    if (event.target.tagName.toLowerCase() === 'input') {
                        // call the event listener function
                        inputHandler(event);
                    }
                });
            </script>
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
                    <div class="col-2 p-0 m-0  align-items-center d-flex">
                        <label for="total-price">
                        </label>
                        <input class="total-price p-0 m-0" id="total-price" type="text" readonly
                               value="<?php  $val = 0;
                                        foreach ($cart->products as $product)
                                        {$val += $product->quantity * $product->price;}
                                        echo($val + $cart->delivery_price + $cart->payment_price);
                                        ?>€">
                    </div>
                </div>
            </div>
        </section>
    </section>
    <section class="w-50 text-center d-flex justify-content-center pe-4">
        <button type="submit" id="submit_billing_button" class="btn_custom">
            Purchase
        </button>
    </section>

    <script>

        var button = document.getElementById('submit_billing_button')

        button.addEventListener('click', function (){
            get_email();
        })

        function create_order(formData) {
            var success = false;
            $.ajax({
                url: '{{ route('order.store') }}',
                data: formData,
                method: "POST",
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    success = true;
                    if (response === "1"){
                        window.location.href = '{{url('order')}}';
                    }
                    else{
                        alert('Something is missing, check your cart.');
                    }
                },
                error: function (response) {
                    success = false;
                    alert('Something is missing, check your cart.');
                }
            });
            return success;
        }

        function get_email() {

            var formData = new FormData();
            console.log(document.getElementById('profiles.email').value);
            formData.append('email', document.getElementById('profiles.email').value);
            formData.append('cart_id', {{$cart->id ?? 0}});

            create_order(formData);
        }

    </script>
</section>
<!-- Footer -->
@include('includes.footer')
<!-- end Footer -->

</body>
</html>
