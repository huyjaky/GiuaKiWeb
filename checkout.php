<!DOCTYPE html>
<?php
session_start();
require "functions/functions.php";
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Online Shop</title>
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">
</head>

<body>
    <div class="main_wrapper">
        <div class="menubar">
            <ul id="menu">
                <li><a href="index.php">Home</a></li>
                <div class="dropdown">
                    <a href="all_products.php" class="dropbtn">All Products</a>
                    <div class="dropdown-content">
                        <a href="#">Laptops</a>
                        <a href="#">Cameras</a>
                        <a href="#">Mobiles</a>
                        <div class="dropdown1">
                            <a href="all_products.php" class="dropbtn1">Categories</a>
                            <div class="dropdown-content1">
                                <a href="#">Tablets</a>
                                <a href="#">iPads</a>
                                <a href="#">Watches</a>
                            </div>
                        </div>

                        <div class="dropdown1">
                            <a href="all_products.php" class="dropbtn1">Brands</a>
                            <div class="dropdown-content1" style="right: -250%;">
                                <a href="#">Sony</a>
                                <a href="#">Samsung</a>
                                <a href="#">Apple</a>
                            </div>
                        </div>
                    </div>
                </div>                <li><a href="my_account.php">My Account</a></li>
                <li><a href="#">Sign Up</a></li>
                <li><a href="cart.php">Cart</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
            <div id="form">
                <form method="get" action="results.php">
                    <input type="text" name="user_query" placeholder="Search products">
                    <input type="submit" name="search" value="Search">
                </form>
            </div>
        </div>
        <div class="content_wrapper">
            <div id="sidebar">
                <div class="sidebar_title">Categories </div>
                <ul class="cats">
                    <?php getCats(); ?>
                </ul>
                <div class="sidebar_title">Brands </div>
                <ul class="cats">
                    <?php getBrands(); ?>
                </ul>
            </div>
            <div id="content_area">
                <div class="shopping_cart">
                    <?php cart(); ?>
                    <span style="float: right;
                    font-size: 18px; padding: 5px;line-height: 40px;">
                        <?php
                        if (!isset($_SESSION['customer_email']))
                            echo "Welcome guest!";
                        else
                            echo "Welcome " . $_SESSION['customer_email'];
                        ?>
                        <b style="color: yellow">
                            Shopping Cart - </b>
                        Total Items: <?php total_items(); ?>
                        Total Price: <?php total_price(); ?>
                        <a style="color: yellow" href="cart.php">Go to Cart</a>
                    </span>
                </div>
                <?php
                if (!isset($_SESSION['customer_email'])) {
                    include("customer_login.php");
                } else {
                    include("payment.php");
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>
