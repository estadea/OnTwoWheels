<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/onTheWheel/constant.php');
include ROOTDIR . '/components/header.php';
include_once(ROOTDIR . '/config/database.php');

$products = $_SESSION['products'];

// $_SESSION['products'] = [];

echo "<br />";
if ($products) {
    
    foreach ($products as $key=>$product) {

        $prod = htmlspecialchars(json_encode($product));
        echo '<html>

        <head>
            
        </head>
        
        <body>
        ' . $product['name'] . ' - ' . $product['price'] . ' €
        <button onclick="removeProduct(' . $key . ')"> - </button>
        <br />
        </body>
        </html> ';
    }
} else {
    echo "No products in the cart.";
}

?>
<html>

<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function removeProduct(index) {
            console.log(index);
            $.post('../../components/cart-handler.php', {
                product_delete: index
            }).then(e => {
                location.reload();
            })
        }
    </script>
</body>

</html>