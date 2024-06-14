<?php
session_start();
?>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Landing Page - Start Bootstrap Theme</title>
    <?php
    include 'links.html';
    ?>

</head>
<header>
    <!-- Navigation-->
    <nav class="navbar navbar-light bg-light static-top">
        <div class="container">
            <a class="navbar-brand" href="#!">MYM</a>
            <div class="d-flex">
                <?php
                if (!isset($_SESSION['email'])) { ?>
                    <a class="btn btn-primary me-1" href="signup.php">Sign Up</a>
                    <a class="btn btn-primary me-1" href="login.php">Login</a>
                <?php
                }else{?>
                    <a class="btn btn-primary me-1" href="logout.php">Log Out</a>
                <?php }
                ?>

            </div>
        </div>
    </nav>
</header>