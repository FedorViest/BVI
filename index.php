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
    </head>
<body>
    <?php include("Components/header.php"); ?>
    <section class="content">
        <section class="welcome_banner">
            <img class="welcome_image" src="assets/Screenshot_4.png" alt="welcome_image">
            <h1 class="welcome_text">Welcome to<br>our store</h1>
        </section>
        <section class="best_sellers_box">
            <section class="best_sellers_text">
                <h2>Best sellers</h2>
            </section>
            <section class="best_sellers_products">
                <table class="products_table">
                    <tr>
                        <td><?php include("Components/product_box.php"); ?></td>
                        <td><?php include("Components/product_box.php"); ?></td>
                        <td><?php include("Components/product_box.php"); ?></td>
                        <td><?php include("Components/product_box.php"); ?></td>
                        <td><?php include("Components/product_box.php"); ?></td>
                        <td><?php include("Components/product_box.php"); ?></td>
                        <td><?php include("Components/product_box.php"); ?></td>
                        <td><?php include("Components/product_box.php"); ?></td>
                    </tr>
                </table>
            </section>
        </section>
    </section>
    <?php include("Components/footer.php"); ?>
</body>
</html>