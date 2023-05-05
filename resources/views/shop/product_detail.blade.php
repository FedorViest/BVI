<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Product</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
    <link rel="stylesheet" href="{{ asset('css/header.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/side_nav.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/shop_content.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/product_detail.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/button_1.css') }}" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <script>
        function display(element) {
            var x = document.getElementById(element);
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function clicked_checkbox(checkbox, input_element) {
            var inp = document.getElementById(input_element);
            if (checkbox.checked === false) {
                inp.style.pointerEvents = "none";
            } else {
                inp.style.pointerEvents = "auto";
            }
        }

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

        function product_added() {
            var x= document.getElementById('product_added');
            x.style.display = 'flex';
            setTimeout(() => {
                x.style.display = 'none';
            }, 3000);
        }

    </script>

</head>

<body>
<!-- Header-->
@include('includes.header')
<!-- end Header -->


<!-- Product detail -->
<main class="row">

    @include('includes.side_nav')

    <!-- Product part -->
    <div class="product_detail col-sm-12 col-md-9">
        <div class="main_info row">
            <div id="product_detail_carousel" class="product_images col-xs-12 col-md-6 carousel slide" data-bs-ride="carousel" data-bs-interval="false">
                <div class="carousel-inner">
                    @if(count($photos) > 0)
                    <div class="carousel-item active">
                        <img class="d-block product_img" src="{{ asset('photos/' . $photos[0]->photo_path) }}" alt="{{ $product_detail->name }}">
                    </div>
                    @else
                    <div class="carousel-item active">
                        <img class="d-block product_img" src="" alt="{{ $product_detail->name }}">
                    </div>
                    @endif

                    @if(count($photos) > 1)
                        @foreach($photos as $key => $photo)
                            @if($key == 0)
                                @continue
                            @endif
                            <div class="carousel-item">
                                <img class="d-block product_img" src="{{ asset('photos/' . $photo->photo_path) }}" alt="{{ $product_detail->name }}">
                            </div>
                        @endforeach
                    @endif

                    <button class="carousel-control-prev" data-bs-target="#product_detail_carousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" data-bs-target="#product_detail_carousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>

                </div>
            </div>
            <div class="product_info col-md-6">
                <section class="main_product_info">
                    <h1>{{ $product_detail->name }}</h1>
                    <p class="short_description">{{ $product_detail->short_description }}</p>
                    <div class="product_detail_price">{{number_format($product_detail->price, 2)}} €</div>
                    <hr>
                </section>
                <div class="buyer_interaction">
                    <div class="counter m-0 p-0">
                        <button class="button_counter" onclick="increase('num_counter1')"><span
                                class="material-symbols-outlined">add</span></button>
                        <label>
                            <input class="num_counter" id="num_counter1" type="number" value="1">
                        </label>
                        <button class="button_counter align-items-center" onclick="decrease('num_counter1')"><span
                                class="material-symbols-outlined">remove</span></button>
                    </div>
                    <div class="buy_button">
                        <button type="button" class="btn_custom" id="cart_button" onclick="product_added()">
                            <img class="shopping_cart_img" src="{{ asset('assets/shoppping_cart.png') }}" alt="shopping_cart">
                            Add to cart
                            <!-- id produtku, quantity POSLAT NA ENDPOINT -->
                        </button>
                    </div>
                </div>
                <section id="product_added" class="product_added">
                    <p><strong>
                        Product added to cart
                    </strong></p>
                </section>
            </div>
        </div>
        <script>
            var button = document.getElementById('cart_button');
            button.addEventListener("click", function (){
                var formData = new FormData();
                formData.append('product_id', {{$product_detail->id}});
                formData.append('quantity', document.getElementById("num_counter1").value);

                $.ajax({
                        url: '{{route('cart.store')}}',
                        method: 'POST',
                        data: formData,
                        contentType : false,
                        processData : false,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response){
                            console.log("success");
                        },
                        error: function (response){
                            console.log("error");
                        }
                    }
                );
            });
        </script>
        <div class="description">
            <section class="long_description">
                <h2>Description</h2>
                <pre>{{ $product_detail->description }}</pre>
                <!-- <ul>
                @foreach(explode('\n', $product_detail->description) as $info)
                    <li>{{ $info }}</li>
                @endforeach
                </ul> -->
            </section>
        </div>

        <!-- Recommended items -->
        <section class="recommended_items">
            <h2 class="recommended_items_text">Best-sellers</h2>
        </section>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="products_wrapper row row-cols-2 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 g-3">
                    @foreach($best_sellers as $best_seller)
                        <div class="col">
                            <article class="card">
                                <a href="/product/{{$best_seller->id}}">
                                    <img class="card-img" src="{{ asset('photos/' . $best_seller->photo_path) }}" alt="{{$best_seller->name}}">
                                    <section class="card-body">
                                        <h3 class="card-title">{{$best_seller->name}}</h3>
                                        <p class="card-price">{{number_format($best_seller->price, 2)}} €</p>
                                    </section>
                                </a>
                            </article>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- Recommended items -->
    </div>
    <!-- end Product part -->
</main>

<!-- end Product detail -->


<!-- FOOTER -->
@include('includes.footer')
<!-- /FOOTER -->
</body>
</html>
