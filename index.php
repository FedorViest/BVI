<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="css/index.css" type="text/css">
    <link rel="stylesheet" href="css/header.css" type="text/css">
    <link rel="stylesheet" href="css/footer.css" type="text/css">
    <link rel="stylesheet" href="css/Components_css/product_box.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php include("Components/header.php"); ?>
    <section class="content">
        <section class="welcome_banner">
            <img class="welcome_image" src="assets/Screenshot_4.png" alt="welcome_image">
            <h1 class="welcome_text">Welcome to<br>our store</h1>
        </section>
    </section>
    <section class="best-sellers">
        <h2 class="best_sellers_text">Best-sellers</h2>
    </section>
    <div id="carouselControls" class="carousel carousel-dark slide" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="card-wrapper">

                    <!-- PRODUCT CARD START -->

                    <section class="card">
                        <img class="card-img" src="/assets/logo/wtech_logo_v2.png" alt="product_image">
                        <section class="card-body">
                            <h3 class="card-title">AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA</h3>
                            <p class="card-price">19.99€</p>
                        </section>
                    </section>

                    <section class="card">
                        <img class="card-img" src="/assets/logo/wtech_logo_v2.png" alt="product_image">
                        <section class="card-body">
                            <h3 class="card-title">Product 2</h3>
                            <p class="card-price">19.99€</p>
                        </section>
                    </section>

                    <section class="card">
                        <img class="card-img" src="/assets/logo/wtech_logo_v2.png" alt="product_image">
                        <section class="card-body">
                            <h3 class="card-title">Product 3</h3>
                            <p class="card-price">19.99€</p>
                        </section>
                    </section>

                    <section class="card">
                        <img class="card-img" src="/assets/logo/wtech_logo_v2.png" alt="product_image">
                        <section class="card-body">
                            <h3 class="card-title">Product 4</h3>
                            <p class="card-price">19.99€</p>
                        </section>
                    </section>

                </div>
            </div>
            <div class="carousel-item">
                <div class="card-wrapper">

                    <!-- PRODUCT CARD START -->

                    <section class="card">
                        <img class="card-img" src="/assets/logo/wtech_logo_v2.png" alt="product_image">
                        <section class="card-body">
                            <h3 class="card-title">Product 5</h3>
                            <p class="card-price">19.99€</p>
                        </section>
                    </section>

                    <section class="card">
                        <img class="card-img" src="/assets/logo/wtech_logo_v2.png" alt="product_image">
                        <section class="card-body">
                            <h3 class="card-title">Product 6</h3>
                            <p class="card-price">19.99€</p>
                        </section>
                    </section>

                    <section class="card">
                        <img class="card-img" src="/assets/logo/wtech_logo_v2.png" alt="product_image">
                        <section class="card-body">
                            <h3 class="card-title">Product 7</h3>
                            <p class="card-price">19.99€</p>
                        </section>
                    </section>

                    <section class="card">
                        <img class="card-img" src="/assets/logo/wtech_logo_v2.png" alt="product_image">
                        <section class="card-body">
                            <h3 class="card-title">Product 8</h3>
                            <p class="card-price">19.99€</p>
                        </section>
                    </section>

                </div>
            </div>
            <div class="carousel-item">
                <div class="card-wrapper">

                    <!-- PRODUCT CARD START -->

                    <section class="card">
                        <img class="card-img" src="/assets/logo/wtech_logo_v2.png" alt="product_image">
                        <section class="card-body">
                            <h3 class="card-title">Product 9</h3>
                            <p class="card-price">19.99€</p>
                        </section>
                    </section>

                    <section class="card">
                        <img class="card-img" src="/assets/logo/wtech_logo_v2.png" alt="product_image">
                        <section class="card-body">
                            <h3 class="card-title">Product 10</h3>
                            <p class="card-price">19.99€</p>
                        </section>
                    </section>

                    <section class="card">
                        <img class="card-img" src="/assets/logo/wtech_logo_v2.png" alt="product_image">
                        <section class="card-body">
                            <h3 class="card-title">Product 11</h3>
                            <p class="card-price">19.99€</p>
                        </section>
                    </section>

                    <section class="card">
                        <img class="card-img" src="/assets/logo/wtech_logo_v2.png" alt="product_image">
                        <section class="card-body">
                            <h3 class="card-title">Product 12</h3>
                            <p class="card-price">19.99€</p>
                        </section>
                    </section>

                </div>
            </div>
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

    <hr>
    <section class="recommended_items">
        <h2 class="recommended_items_text"> Recommended items</h2>
    </section>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="products_wrapper row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-3">
                    <div class="col">
                        <div class="card">
                            <img class="card-img" src="/assets/products/apple_tree.png" alt="product_image">
                            <div class="card-body">
                                <h3 class="card-title">AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA</h3>
                                <p class="card-text">19.99€</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img class="card-img" src="/assets/logo/wtech_logo_v2.png" alt="product_image">
                            <div class="card-body">
                                <h3 class="card-title">Product 1</h3>
                                <p class="card-text">19.99€</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img class="card-img" src="/assets/logo/wtech_logo_v2.png" alt="product_image">
                            <div class="card-body">
                                <h3 class="card-title">Product 1</h3>
                                <p class="card-text">19.99€</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img class="card-img" src="/assets/logo/wtech_logo_v2.png" alt="product_image">
                            <div class="card-body">
                                <h3 class="card-title">Product 1</h3>
                                <p class="card-text">19.99€</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img class="card-img" src="/assets/logo/wtech_logo_v2.png" alt="product_image">
                            <div class="card-body">
                                <h3 class="card-title">Product 1</h3>
                                <p class="card-text">19.99€</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img class="card-img" src="/assets/logo/wtech_logo_v2.png" alt="product_image">
                            <div class="card-body">
                                <h3 class="card-title">Product 1</h3>
                                <p class="card-text">19.99€</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("Components/footer.php"); ?>

</body>
</html>