<?php
session_start();

$products = $_SESSION['products'];

// Add a product in the cart
if (isset($_POST['product'])) {
    $product = $_POST['product'];
    if ($products) {
        array_push($products, $product);
    } else {
        $products = array($product);
    }
    $_SESSION['products'] = $products;
}

// delete a product in the cart
if (isset($_POST['product_delete'])) {
    $productIndex = $_POST['product_delete'];
    array_splice($products,$productIndex,1);
    $_SESSION['products'] = $products;
    // echo $key;
}
