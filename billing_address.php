<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="css/billing_address.css" type="text/css">
    <link rel="stylesheet" href="css/header.css" type="text/css">
    <link rel="stylesheet" href="css/footer.css" type="text/css">
    <link rel="stylesheet" href="css/button_1.css" type="text/css">
    <link rel="stylesheet" href="css/shipping_cart_table.css" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
<?php include("Components/header.php"); ?>
<section class="content">
    <h2>Address Details</h2>
    <section class="inside_content">
        <section class="outline_block">
            <form class="details_block">
                <h3>Billing address</h3>
                <?php include("Components/billing_address_holder.php"); ?>
                <?php include("Components/billing_address_holder.php"); ?>
                <?php include("Components/billing_address_holder.php"); ?>
                <section class="billing_section">
                    <Label for="">First Name<br></Label>
                    <label class="input_label">
                        +<input type="text" placeholder="421" id="id" style="width: 50px">
                        <input type="text" placeholder="Mobile phone number">
                    </label>
                </section>
                <?php include("Components/billing_address_holder.php"); ?>
                <section class="billing_section">
                    <Label for="">Street address<br></Label>
                    <label class="input_label">
                        <input type="text" placeholder="Type in your street name" >
                        <input type="text" placeholder="Nr." style="width: 70px">
                    </label>
                </section>
            </form>
        </section>
        <section class="outline_cart_block">
            <!-- shopping cart content -->
            <table class="shipping_cart_table">
                <?php include("Components/shipping_cart.php"); ?>
                <?php include("Components/shipping_cart.php"); ?>
                <?php include("Components/shipping_cart.php"); ?>
            </table>
            <table class="price_table">
                <tr>
                    <th>
                        Total price:
                    </th>
                    <td>
                        17.97€
                    </td>
                </tr>
            </table>
        </section>
    </section>
    <section class="price_content">
        <button type="button" class="btn">
            Purchase
        </button>
    </section>
</section>
<?php include("Components/footer.php"); ?>
</body>
</html>