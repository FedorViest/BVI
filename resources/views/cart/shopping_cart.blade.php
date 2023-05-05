<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cart</title>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script>
        async function increase(element, id) {
            var num = parseInt(document.getElementById(element).value);
            if (await send_quantity(element, id, num + 1)){
                document.getElementById(element).value = num + 1;
            }
            //send_quantity(element, id);
            set_total_price();
        }

        async function decrease(element, id) {
            var num = parseInt(document.getElementById(element).value);
            if (num > 1) {
                num = num - 1;
            }
            if (await send_quantity(element, id, num)) {
                document.getElementById(element).value = num;
            }
            //send_quantity(element, id);
            set_total_price();
        }

        function set_total_price(){
            var products = @json($cart->products);
            var total_price = 0;
            for (let i = 0; i < products.length; i++){
                total_price += products[i].price * document.getElementById('num_counter-' + products[i].id).value;
                //total_price = total_price.toFixed(2);
            }
            document.getElementById('total-price').value = total_price.toFixed(2) + "€";
        }

        /*var products = @json($cart->products);
        for (let i = 0; i < products.length; i++){
            var counter = document.getElementById('num_counter-' + products[i].id);
            counter.addEventListener("change", send_quantity('num_counter-' + products[i].id, products[i].id));
        }*/

        async function send_quantity(element, id, quantity){
            var formData = new FormData();
            formData.append('_method', 'PATCH');
            formData.append('product_id', id);
            formData.append('quantity', quantity);
            var success = false;
            await $.ajax({
                    url: '{{route('cart.update', $cart->id)}}',
                    method: 'POST',
                    data: formData,
                    contentType : false,
                    processData : false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response){
                        success = true;
                    },
                    error: function (response){
                        success = false;
                    }
                }
            );
            return success;
        }

    </script>
</head>
<body>
<!-- Header-->
@include('includes.header')
<!-- end Header -->


<section class="content">
    <!-- Cart Navbar-->
    @include('includes.nav_cart')
    <!-- Cart Navbar-->
    <section class="inside_content">
        <div class="container-fluid w-100 p-0 m-0">
            @foreach($cart->products as $product)
                <div class="row justify-content-around m-0">
                    <div class="col-9 col-lg-5 col-md-6 col-sm-7 d-inline-block m-0 p-0">
                        <div class="flex-row d-flex">
                            <img class="img-thumbnail" src="{{asset('photos/' . $product->photos[0])}}" alt="{{$product->photos[0]}}">  <!-- https://pixabay.com/photos/a-tree-nature-heart-cherry-flowers-5255288/ -->
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
                                <button class="button_counter" onclick="increase('num_counter-{{$product->id}}', {{$product->id}})"><span
                                        class="material-symbols-outlined">add</span></button>
                                <label>
                                    <input class="num_counter" id="num_counter-{{$product->id}}" type="number" readonly value="{{$product->quantity}}">
                                </label>
                                <button class="button_counter align-items-center" onclick="decrease('num_counter-{{$product->id}}', {{$product->id}})"><span
                                        class="material-symbols-outlined">remove</span></button>
                            </div>
                            <!--</div>-->
                            <div class="price-div align-items-center d-flex  m-0 p-0">{{number_format($product->price, 2)}}€</div>
                            <div class="delete-div align-items-center d-flex  m-0 p-0">
                                <form name="deleteForm-{{$product->id}}" class="delete-div align-items-center d-flex  m-0 p-0" action="{{route('cart.destroy', ['cart' => $cart->id, 'id' => $cart->id ,'product_id' => $product->id])}}" method="post">
                                    <span class="material-symbols-outlined" onclick="document.forms['deleteForm-{{$product->id}}'].submit()">delete</span>
                                    @method('delete')
                                    @csrf
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <hr>
            @endforeach
            <div class="row d-flex justify-content-around m-0">
                <div class="col-6"></div>
                <div class="row d-flex flex-column align-content-end">
                    <div class="col-4">
                        <div class="row-12 d-flex align-items-center">
                            <div class="col-6">
                                <h6 class="total_price m-0">Total price</h6>
                            </div>
                            <div class="col-6">
                                <div class="total_price align-items-center d-flex">
                                    <label for="total-price">
                                    </label>
                                    <input class="total-price" id="total-price" type="text" value="0" readonly></div>
                            <script>set_total_price();</script>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 d-flex justify-content-center text-center m-2">
                        <button type="submit" class="btn_custom" onclick="window.location.href='{{url('shipping_payment')}}'">
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
