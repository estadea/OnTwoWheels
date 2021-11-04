<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/onTheWheel/constant.php');
include_once(ROOTDIR . '/controllers/Product.php');

if (isset($_POST['search'])) {
    
    $search = $_POST['search'];
    $productController = new Product();
    $result = $productController->searchProduct($search);
    echo json_encode($result);

}
