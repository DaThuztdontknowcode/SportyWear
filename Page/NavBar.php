<?php
session_start();
$name = $_SESSION['user_name'];
$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script>
    "use strict";

    ! function() {
        var t = window.driftt = window.drift = window.driftt || [];
        if (!t.init) {
            if (t.invoked) return void(window.console && console.error && console.error(
                "Drift snippet included twice."));
            t.invoked = !0, t.methods = ["identify", "config", "track", "reset", "debug", "show", "ping", "page",
                    "hide", "off", "on"
                ],
                t.factory = function(e) {
                    return function() {
                        var n = Array.prototype.slice.call(arguments);
                        return n.unshift(e), t.push(n), t;
                    };
                }, t.methods.forEach(function(e) {
                    t[e] = t.factory(e);
                }), t.load = function(t) {
                    var e = 3e5,
                        n = Math.ceil(new Date() / e) * e,
                        o = document.createElement("script");
                    o.type = "text/javascript", o.async = !0, o.crossorigin = "anonymous", o.src =
                        "https://js.driftt.com/include/" + n + "/" + t + ".js";
                    var i = document.getElementsByTagName("script")[0];
                    i.parentNode.insertBefore(o, i);
                };
        }
    }();
    drift.SNIPPET_VERSION = '0.3.1';
    drift.load('utsez2c7b623');
    </script>
    <!-- End of Async Drift Code -->

</head>

<body>

    <nav class="navbarr">
        <ul>
            <li><a href="home.php">Home</a></li>
            <li class="dropdownn">
                <a href="../Page/Products.php" class="dropbtnn">Product</a>
                <div class="dropdownn-content">
                    <a href="../Page/all_products.php?category=1">Shoe</a>

                    <a href="../Page/all_products.php?category=2">T-Shirt</a>
                    <!-- Add more items -->
                    <a href="../Page/all_products.php?category=3">Top</a>
                    <a href="../Page/all_products.php?category=4">Sock</a>
                    <a href="../Page/all_products.php?category=5">Tight</a>
                    <a href="../Page/all_products.php?category=6">Short</a>
                    <a href="../Page/all_products.php?category=7">Jacket</a>
                    <a href="../Page/all_products.php?category=8">Headwear</a>
                    <a href="../Page/all_products.php?category=9">Bra</a>
                    <a href="../Page/all_products.php?category=10">Skirt dress</a>
                    <a href="../Page/all_products.php?category=11">Polo</a>
                    <a href="../Page/all_products.php?category=12">Sandal</a>
                    <a href="../Page/all_products.php?category=13">Sweatshirt</a>
                    <a href="../Page/all_products.php?category=14">Accessories</a>
                </div>
            </li>
            <li style="float: right;"><a href="./viewCart.php"><i class="fa-solid fa-shopping-cart"></i></a></li>
            <li style="float: right;"><a href="../Page/user_page.php"><i class="fa-solid fa-user"></i></a></li>
            <ul>
                <li class="search-bar">
                    <form action="../Page/search.php" method="GET" id="search-bar">
                        <input type="text" name="query" placeholder="Search..." id="search-text">
                        <button id="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </li>
            </ul>
    </nav>

</body>

</html>