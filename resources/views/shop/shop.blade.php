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
    <link rel="stylesheet" href="css/header.css" type="text/css">
    <link rel="stylesheet" href="css/footer.css" type="text/css">
    <link rel="stylesheet" href="css/side_nav.css" type="text/css">
    <link rel="stylesheet" href="css/shop_content.css" type="text/css">


    <script>

        function order_by_clicked(num) {
            var num_clicked = Number('<?php echo $orderby_clicked; ?>');
            var order_by_buttons = document.getElementsByClassName("order_by_link");

            for (let i = 0; i < order_by_buttons.length; i++) {
                if(i === num_clicked) {
                    order_by_buttons[i].style.backgroundColor = "var(--nyanza)";
                    order_by_buttons[i].style.border = "3px solid var(--avocado)";
                    order_by_buttons[i].style.borderBottom = "3px solid var(--nyanza)";
                }
                else {
                    order_by_buttons[i].style.backgroundColor = "var(--honeydew)";
                    order_by_buttons[i].style.border = "3px solid var(--nyanza)";
                    order_by_buttons[i].style.borderBottom = "3px solid var(--avocado)";
                }
            }
        }

        function category_clicked() {
            var num_clicked = Number('<?php echo $category_clicked; ?>');
            var category_buttons = document.getElementsByClassName("side_nav_link");

            for (let i = 0; i < category_buttons.length; i++) {
                if(i === num_clicked) {
                    category_buttons[i].style.backgroundColor = "var(--honeydew)";
                }
                else {
                    category_buttons[i].style.backgroundColor = "var(--nyanza)";
                }
            }
        }


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
    </script>

</head>
<body onload="order_by_clicked(), category_clicked()">
<!-- Header-->
@include('includes.header')
<!-- end Header -->


<!-- SHOP CONTENT -->
<main class="row">
    @include('includes.side_nav')


    <div class="shop col-md-9">
        @include('includes.order_by_nav')

        <div class="products_wrapper items row row-cols-2 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 rows-cols-xl-4 g-3">
            @foreach($products as $product)
                <div class="col">
                    <article class="card">
                        <a href="/product/{{$product->id}}">
                            <img class="card-img" src="{{ asset('photos/' . $product->photo_path) }}" alt="{{$product->name}}">
                            <section class="card-body">
                                <h3 class="card-title">{{$product->name}}</h3>
                                <p class="card-price">{{number_format($product->price, 2)}} €</p>
                            </section>
                        </a>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</main>

<!-- end SHOP CONTENT -->


<!-- FOOTER -->
@include('includes.footer')
<!-- /FOOTER -->
</body>
</html>