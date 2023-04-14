<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
    <link rel="stylesheet" href="css/index.css" type="text/css">
    <link rel="stylesheet" href="css/header.css" type="text/css">
    <link rel="stylesheet" href="css/footer.css" type="text/css">
    <link rel="stylesheet" href="css/Components_css/product_box.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<!-- Header-->
@include('includes.header')
<!-- end Header -->


<section class="content">
    <section class="welcome_banner">
        <h1 class="welcome_text">Grow Your World with PlantHub!</h1>
    </section>
</section>
<hr>
<main>
    <section class="best-sellers">
        <h2 class="best_sellers_text">Best-sellers</h2>
        <div id="carouselControls" class="carousel carousel-dark slide" data-bs-ride="carousel" data-bs-interval="0">
            <div class="carousel-inner">
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <hr>
    <section class="recommended_items">
        <h2 class="recommended_items_text">New Arrivals</h2>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div
                        class="products_wrapper row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-xl-6 row-cols-lg-4 g-3">
                        @foreach($products_new as $product)
                            <div class="col">
                                <article class="card">
                                    <a href="/product/{{$product->id}}">
                                        <img class="card-img" src="{{asset('photos/' . $product->photos[0])}}"
                                             alt="{{$product->photos[0]}}">
                                        <!-- https://pixabay.com/photos/apple-tree-apples-leaves-fall-3735679/ -->
                                        <section class="card-body">
                                            <h3 class="card-title">{{$product->name}}</h3>
                                            <p class="card-price">{{$product->price}}€</p>
                                        </section>
                                    </a>
                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
    var product = @json($products_best);
    var productLength = Math.floor(product.length / 4) * 4;
    product = product.slice(0, productLength);
    var previewContainer = document.querySelector('.carousel-inner');

    var itemsPerCarouselItem = {
        default: 4,
        medium: 3,
        small: 2
    };

    function updateCarouselItems() {
        var windowWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

        var numItemsPerCarouselItem = itemsPerCarouselItem.default;
        if (windowWidth < 1299) {
            numItemsPerCarouselItem = itemsPerCarouselItem.medium;
        }
        if (windowWidth < 815) {
            numItemsPerCarouselItem = itemsPerCarouselItem.small;
        }

        previewContainer.innerHTML = '';

        for (let i = 0; i < product.length; i++) {
            if (i % numItemsPerCarouselItem === 0) {
                var carouselItem = document.createElement('div');
                if (i === 0) {
                    carouselItem.className = 'carousel-item active';
                } else {
                    carouselItem.className = 'carousel-item';
                }
                var cardWrapper = document.createElement('div');
                cardWrapper.className = 'card-wrapper';

                carouselItem.append(cardWrapper);
            }
            var articleElement = create_card(product[i]);
            cardWrapper.append(articleElement);
            previewContainer.insertBefore(carouselItem, previewContainer.firstChild);
        }
    }

    updateCarouselItems();

    window.addEventListener('resize', updateCarouselItems);

    function create_card(product) {
        var path = '{!! asset('photos/') !!}';
        var articleElement = document.createElement('article');
        articleElement.className = 'card';

        var anchorElement = document.createElement('a');
        anchorElement.href = '/product/{{$product->id}} ';

        var imageElement = document.createElement('img');
        imageElement.className = 'card-img';
        imageElement.src = path + '/' + product.photos[0];
        imageElement.alt = product.photos[0];

        var sectionElement = document.createElement('section');
        sectionElement.className = 'card-body';

        var h3Element = document.createElement('h3');
        h3Element.className = 'card-title';
        h3Element.textContent = product.name;

        var pElement = document.createElement('p');
        pElement.className = 'card-price';
        pElement.textContent = product.price + '€';

        sectionElement.appendChild(h3Element);
        sectionElement.appendChild(pElement);

        anchorElement.appendChild(imageElement);
        anchorElement.appendChild(sectionElement);

        articleElement.appendChild(anchorElement);
        return articleElement;
    }

</script>


<!-- Footer -->
@include('includes.footer')
<!-- end Footer -->

</body>
</html>
