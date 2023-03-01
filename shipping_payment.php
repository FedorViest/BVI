<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="css/shipping_payment.css" type="text/css">
    <link rel="stylesheet" href="css/header.css" type="text/css">
    <link rel="stylesheet" href="css/footer.css" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
<?php include("header.php"); ?>
<section class="content">
    <h2>Shipping and Payment</h2>
    <section class="inside_content">
        <section class="outline_block">
            <form class="details_block">
                <h3>Shipping Details</h3>
                <table>
                    <tr>
                        <td>
                            <input type="radio" id="store" name="shipping" value="Store">
                        </td>
                        <td>
                            <span class="material-symbols-outlined">store</span>
                        </td>
                        <td>
                            Store
                        </td>
                        <td>
                            Free
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="radio" id="pickup" name="shipping" value="Pickup">
                        </td>
                        <td>
                            <span class="material-symbols-outlined">archive</span>
                        </td>
                        <td>
                            Pickup Point
                        </td>
                        <td>
                            1.99€
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="radio" id="home" name="shipping" value="Home">
                        </td>
                        <td>
                            <span class="material-symbols-outlined">local_shipping</span>
                        </td>
                        <td>
                            Home Delivery
                        </td>
                        <td>
                            2.99€
                        </td>
                    </tr>
                </table>
            </form>
            <form class="details_block">
                <h3>Payment Details</h3>
                <table>
                    <tr>
                        <td>
                            <input type="radio" id="card" name="payment" value="Card">
                        </td>
                        <td>
                            <span class="material-symbols-outlined">credit_card</span>
                        </td>
                        <td>
                            Credit Card
                        </td>
                        <td>
                            Free
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="radio" id="cash" name="payment" value="Cash">
                        </td>
                        <td>
                            <span class="material-symbols-outlined">payments</span>
                        </td>
                        <td>
                            Cash
                        </td>
                        <td>
                            0.99€
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="radio" id="bank" name="payment" value="Bank">
                        </td>
                        <td>
                            <span class="material-symbols-outlined">payments</span>
                        </td>
                        <td>
                            Internet Banking
                        </td>
                        <td>
                            Free
                        </td>
                    </tr>
                </table>
            </form>
        </section>
        <section class="outline_block">
            <!-- shopping cart content -->
            <section class="cart_block">
                <img class="product_photo" src="assets/logo/wtech_logo_v2-removebg-preview.png" alt="logo">
                <h4>Product 1</h4>
                <h4>5.99€</h4>
            </section>
            <hr>
            <!-- duplicate shopping cart content -->
            <section class="cart_block">
                <img class="product_photo" src="assets/logo/wtech_logo_v2-removebg-preview.png" alt="logo">
                <h4>Product 1</h4>
                <h4>5.99€</h4>
            </section>
            <hr>
            <section class="cart_block">
                <img class="product_photo" src="assets/logo/wtech_logo_v2-removebg-preview.png" alt="logo">
                <h4>Product 1</h4>
                <h4>5.99€</h4>
            </section>
        </section>
    </section>
</section>
<?php include("footer.php"); ?>
</body>
</html>