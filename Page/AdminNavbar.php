<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$name = $_SESSION['admin_name'];
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
?>
<?php include '../Control/CheckUserType.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
</head>
<body>

<nav class="navbarr">
    <ul>
    <ul>
            <li><a href="home.php">Home</a></li>
            <?php
            // Display the "Admin" button conditionally
            if (isset($_SESSION['user_id'])) {
                $userId = $_SESSION['user_id'];
                $userType = getUserType($userId, $conn);
                // Output result to the console
                echo '<script>';
                echo 'console.log("User Type:", ' . json_encode($userType) . ');';
                echo '</script>';
                if ($userType === 'admin') {
                    echo '<li  class="dropdownn "><a href="../Page/Admin.php" class="dropbtnn">Admin</a>';
                    echo '<div class="dropdownn-content ">';
                    echo '<a href="../Page/Admin.php">Edit</a>';
                    echo ' <a href="../Page/AddProduct.php">Add</a>';
                    echo ' <a href="../Page/ViewHoaDon.php">DonHang</a>';
                    echo '   </div>';
                    echo '</li>';
                }
            } else {
                echo '</script>';
            }
            ?>


            <?php
            if (isset($_SESSION['user_id']) && $userType === 'user') {
                echo '<li style="float: right;"><a href="./viewCart.php"><i class="fa-solid fa-shopping-cart"></i></a></li>';
                echo '<li style="float: right;"><a href="../Page/user_page.php"><i class="fa-solid fa-user"></i></a></li>';
            } else if (isset($_SESSION['user_id'])&& $userType === 'admin')  {
                echo '<li style="float: right;"><a href="../Page/admin_page.php"><i class="fa-solid fa-user"></i></a></li>';
            } else {
                echo '<li style="float: right;"><a href="login_form.php">Sign In</a></li>';
                echo '<li style="float: right;"><a href="register_form.php">Sign Up</a></li>';
            }
            ?>
            
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
