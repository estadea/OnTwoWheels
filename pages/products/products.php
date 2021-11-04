<html>

<head>
    <link rel="stylesheet" href="product.css">
</head>

<body>

    <?php

    include_once($_SERVER['DOCUMENT_ROOT'] . '/onTheWheel/constant.php');
    include ROOTDIR . '/components/header.php';
    include_once(ROOTDIR . '/controllers/Product.php');

    $productController = new Product();

    $result = $productController->getList();
    ?>

    <input type="text" oninput="filterSearch(this.value)" id="SearchFilter" />

    <?php if (count($result) > 0) { ?>

        <div class="product_container" id="productList">
            <div class="row">
                <?php foreach ($result as $product) {
                    $prod = htmlspecialchars(json_encode($product));
                    $imageUrl = "/onTheWheel/images/products/" . $product['image'];
                ?>
                    <div class="product_box col-4">
                        <img src="<?php echo $imageUrl ?>" alt="<?php echo $product['image'] ?>" />
                        <h4><?php echo $product['name'] ?></h4>
                        <p><?php echo $product['description'] ?></p>
                        <p><?php echo $product['price'] ?> €</p>
                        <button onclick="addToCart(<?php echo $prod ?>)">Add to cart</button>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php } ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function addToCart(product) {
            console.log(product);
            $.post('../../components/cart-handler.php', {
                product: product
            }).then(e => {
                console.log("ADDED", e);
            })
        }
        let timeout;

        function filterSearch(searchValue) {
            if (timeout) {
                clearTimeout(timeout);
            }
            timeout = setTimeout(function() {
                $.post('search_product.php', {
                        search: searchValue
                    })
                    .then(res => JSON.parse(res))
                    .then(res => buildSearchResult(res))
            }, 400);
        }

        function buildSearchResult(data) {
            const productList = document.getElementById('productList');

            let html = '';
            data.forEach(p => {
                html += `
                <div class="product_box col-4">
                    <img src="/onTheWheel/images/products/${p.image}" alt="${p.image}" />
                    <h4>${p.name}</h4>
                    <p>${p.description}</p>
                    <p>${p.price} €</p>
                    <button onclick="addToCart(${p})">Add to cart</button>
                </div>
                `;
            })

            productList.innerHTML = `
            <div class="row">
                ${html}
            </div>`;
        }
    </script>
</body>

</html>