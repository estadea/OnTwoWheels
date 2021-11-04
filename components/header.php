<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- for mobile devices-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ecommerce Website Design </title>

    <link rel="stylesheet" href="/onTheWheel/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bitter&family=Roboto&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/c7cad4103c.js" crossorigin="anonymous"></script>

</head>

<body>
    <div class="header">
        <div class="container">
            <div class="navbar">
                <h1>Online Shop</h1>

                <nav>
                    <ul id="MenuItems">

                        <li><a href="/onTheWheel/index.php">Home</a></li>
                        <li><a href="/onTheWheel/pages/products/products.php">Products</a></li>
                        <li><a href="">About</a></li>
                        <li><a href="/onTheWheel/pages/contacts/contacts.php">Contact</a></li>
                        <?php
                        if (session_status() == PHP_SESSION_NONE) {
                            session_start();
                        }
                        if (isset($_SESSION['session_id'])) {
                            echo '<li><a href="/onTheWheel/pages/admin/admin.php">Admin</a></li>';
                            echo '<li><a href="/onTheWheel/pages/logout/logout.php">Logout</a></li>';
                        } else {
                            echo '<li><a href="/onTheWheel/pages/login/login.php">Account</a></li>';
                        }
                        ?>
                    </ul>
                </nav>
                <a href="/onTheWheel/pages/cart/cart.php"><img src="/onTheWheel/images/cart.png" width="40px" height="40px"></a>
                <img src="/onTheWheel/images/menu.png" class="menu-icon" onclick="menutoggle()">
            </div>
        </div>
    </div>
    <!-- js for toggle menu -->
    <script>
        var MenuItemsNode = document.getElementById("MenuItems");


        function menutoggle() {
            if (MenuItemsNode.classList.contains('open')) {
                MenuItemsNode.classList.remove('open')
            } else {
                MenuItemsNode.classList.add('open')

            }
        }
    </script>
