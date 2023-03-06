<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="css/shopping_cart.css" type="text/css">
    <link rel="stylesheet" href="css/header.css" type="text/css">
    <link rel="stylesheet" href="css/footer.css" type="text/css">
    <link rel="stylesheet" href="css/button_1.css" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
<?php include("Components/header.php"); ?>
<section class="content">
    <h2>Shopping cart</h2>
    <section class="inside_content">
        <table class="cart">
            <?php include("Components/shopping_cart_table_row.php"); ?>
            <?php include("Components/shopping_cart_table_row.php"); ?>
            <?php include("Components/shopping_cart_table_row.php"); ?>
        </table>
    </section>
    <section class="price_content">
        <button type="button" class="btn">
            Checkout
        </button>
    </section>
</section>
<?php include("Components/footer.php"); ?>
</body>
</html>
