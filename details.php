<!DOCTYPE html>
<?php
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
                        <a href="#">Link 1</a>
                        <a href="#">Link 2</a>
                        <a href="#">Link 3</a>
                        <div class="dropdown1">
                            <a href="all_products.php" class="dropbtn1">Categories</a>
                            <div class="dropdown-content1">
                                <a href="#">Link 1</a>
                                <a href="#">Link 2</a>
                                <a href="#">Link 3</a>
                            </div>
                        </div>

                        <div class="dropdown1">
                            <a href="all_products.php" class="dropbtn1">Brands</a>
                            <div class="dropdown-content1" style="right: -250%;">
                                <a href="#">Link 1</a>
                                <a href="#">Link 2</a>
                                <a href="#">Link 3</a>
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
                    <span style="float: right;
                    font-size: 18px; padding: 5px;line-height: 40px;">
                        Welcome guest! <b style="color: yellow">
                            Shopping Cart - </b>
                        Total Items: <?php total_items(); ?>
                        Total Price: <?php total_price(); ?>
                        <a style="color: yellow" href="cart.php">Go to Cart</a>
                    </span>

                </div>
                <div class="products_box">
                    <?php
                    if(isset($_GET['pro_id'])) {
                        $product_id = $_GET['pro_id'];
                        global $con;
                        $get_pro = "select * from products where pro_id='$product_id'";
                        $run_pro = mysqli_query($con, $get_pro);
                        while ($row_pro = mysqli_fetch_array($run_pro)) {
                            $pro_id = $row_pro['pro_id'];
                            $pro_title = $row_pro['pro_title'];
                            $pro_price = $row_pro['pro_price'];
                            $pro_image = $row_pro['pro_image'];
                            $pro_desc = $row_pro['pro_desc'];
                            echo "
                                <div class='single_product'>
                                    <h3>$pro_title</h3>
                                    <img src='admin/product_images/$pro_image' width='400' height='300'>
                                    <p> <b> Rs $pro_price/-  </b> </p>
                                    <p>$pro_desc</p>
                                    <a href='index.php' style='float: left'>Go Back</a>
                                    <a href='index.php?pro_id=$pro_id'><button style='float: right;'>Add to Cart</button></a>
                                </div>
                        ";
                        }
                    }
                    ?>
                </div>

            </div>
        </div>
    </div>
</body>
</html>
