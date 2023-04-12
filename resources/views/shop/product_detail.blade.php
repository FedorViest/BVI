<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

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
            <div class="product_images col-xs-12 col-md-6 carousel slide">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="product_img" src="{{ asset('assets/products/cherry_tree.jpg') }}" alt="product_image">  <!-- https://pixabay.com/photos/a-tree-nature-heart-cherry-flowers-5255288/ -->
                    </div>
                    <div class="carousel-item">
                        <img class="product_img" src="{{ asset('assets/products/cherry_tree.jpg') }}" alt="product_image">  <!-- https://pixabay.com/photos/a-tree-nature-heart-cherry-flowers-5255288/ -->
                    </div>

                    <button class="carousel-control-prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </div>
            <div class="product_info col-md-6">
                <section class="main_product_info">
                    <h1>{{ $product_detail->name }}</h1>  <!-- Zdroj: https://www.zones.sk/studentske-prace/biologia/14520-ceresna-vtacia/ -->
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
                        <button type="button" class="btn_custom">
                            <img class="shopping_cart_img" src="{{ asset('assets/shoppping_cart.png') }}" alt="shopping_cart">
                            Add to cart
                            <!-- id produtku, quantity POSLAT NA ENDPOINT -->
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="description">
            <section class="long_description">
                <h2>Description</h2>
                <pre>
                    {{ $product_detail->description }}
                </pre>
                <!-- <ul>
                @foreach(explode('\n', $product_detail->description) as $info)
                    <li>{{ $info }}</li>
                @endforeach
                </ul> -->
            </section>
        </div>

        <!-- Recommended items -->
        <section class="recommended_items">
            <h2 class="recommended_items_text"> Recommended items</h2>
        </section>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="products_wrapper row row-cols-2 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 g-3">
                        <div class="col">
                            <section class="card">
                                <a href="product_detail.html">
                                    <img class="card-img" src="{{ asset('assets/products/apple_tree.png') }}" alt="product_image">
                                    <section class="card-body">
                                        <h3 class="card-title">Apple tree</h3>
                                        <p class="card-price">19.99€</p>
                                    </section>
                                </a>
                            </section>
                        </div>
                        <div class="col">
                            <section class="card">
                                <a href="product_detail.html">
                                    <img class="card-img" src="{{ asset('assets/products/cherry_tree.jpg') }}" alt="product_image">
                                    <section class="card-body">
                                        <h3 class="card-title">Cherry tree</h3>
                                        <p class="card-price">19.99€</p>
                                    </section>
                                </a>
                            </section>
                        </div>
                        <div class="col">
                            <section class="card">
                                <a href="product_detail.html">
                                    <img class="card-img" src="{{ asset('assets/products/beech_tree.jpg') }}" alt="product_image">
                                    <section class="card-body">
                                        <h3 class="card-title">Beech tree</h3>
                                        <p class="card-price">19.99€</p>
                                    </section>
                                </a>
                            </section>
                        </div>
                        <div class="col">
                            <section class="card">
                                <a href="product_detail.html">
                                    <img class="card-img" src="{{ asset('assets/products/linden_tree.jpg') }}" alt="product_image">
                                    <section class="card-body">
                                        <h3 class="card-title">Linden tree</h3>
                                        <p class="card-price">19.99€</p>
                                    </section>
                                </a>
                            </section>
                        </div>
                        <div class="col">
                            <section class="card">
                                <a href="product_detail.html">
                                    <img class="card-img" src="{{ asset('assets/products/pine_tree.jpg') }}" alt="product_image">
                                    <section class="card-body">
                                        <h3 class="card-title">Pine tree</h3>
                                        <p class="card-price">19.99€</p>
                                    </section>
                                </a>
                            </section>
                        </div>
                        <div class="col">
                            <section class="card">
                                <a href="product_detail.html">
                                    <img class="card-img" src="{{ asset('assets/products/plum_tree.jpg') }}" alt="product_image">
                                    <section class="card-body">
                                        <h3 class="card-title">Plum tree</h3>
                                        <p class="card-price">19.99€</p>
                                    </section>
                                </a>
                            </section>
                        </div>
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