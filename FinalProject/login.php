<head>
    <title>Car Rental MYM</title>
    <script>
        function validateForm() {
            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;

            if (email == "" || password == "") {
                // alert("Please fill out all fields!");
                var messageContainer = document.getElementById("message_container");

                messageContainer.innerHTML =
                    `<p class="error">Please fill out all fields!</p>`;

                return false;
            }

            var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            if (!emailRegex.test(email)) {
                var messageContainer = document.getElementById("message_container");
                messageContainer.innerHTML =
                    `<p class="error">Please enter a valid email address!</p>`;
                return false;
            }
            return true;
        }
    </script>
    <?php
    include 'links.html';
    ?>
    <style>
        form {
            width: 300px;
            padding: 16px;
            background-color: white;
            box-shadow: 0px 0px 8px 0px rgba(0, 0, 0, 0.1);
        }

        .error {
            background: #F2DEDE;
            color: #A94442;
            padding: 10px;
            width: 95%;
            border-radius: 5px;
        }

        .success {
            background: #D4EDDA;
            color: #40754C;
            padding: 10px;
            width: 95%;
            border-radius: 5px;
            margin: 20px auto;
        }
    </style>
</head>

<body class="d-flex align-items-center justify-content-center" style="min-height: 100vh;">

    <form action="login_validation.php" method="POST" onsubmit="return validateForm()">
        <h3 class="d-flex align-items-center justify-content-center">Login</h3>
        <hr>

        <div id="message_container" class="mb-3 mt-3">
            <?php

            if (isset($_GET["error"])) {
            ?>
                <p id="error_paragraph" class="error"> <?php echo $_GET["error"]; ?> </p>
            <?php } elseif (isset($_GET["success"])) { ?>
                <p id="success_paragraph" class="success"> <?php echo $_GET["success"]; ?> </p>
            <?php
            } ?>
        </div>

        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Email:</label>
            <?php
            if (isset($_GET['email'])) { // From Validation
            ?>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $_GET["email"]; ?>">
            <?php
            } elseif (isset($_COOKIE['remember_email'])) { // From Cookie
            ?>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $_COOKIE['remember_email']; ?>">
            <?php
            } else { ?>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            <?php
            }
            ?>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <?php
            if (isset($_COOKIE['remember_password'])) {
            ?>
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" value="<?php echo $_COOKIE['remember_password']; ?>">
            <?php } else { ?>
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
            <?php
            }
            ?>
        </div>

        <div class="mb-3">
            <label for="user_type" class="form-label">User Type:</label>
            <div class="btn-group" role="group" aria-label="User Type">
                <input class="btn-check" type="radio" name="user_type" id="customer" value="customer" checked>
                <label class="btn btn-outline-primary" for="customer">Customer</label>

                <input class="btn-check" type="radio" name="user_type" id="office" value="office">
                <label class="btn btn-outline-primary" for="office">Office</label>

                <input class="btn-check" type="radio" name="user_type" id="admin" value="admin">
                <label class="btn btn-outline-primary" for="admin">Admin</label>
            </div>
        </div>

        <div class="form-check mb-3">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember"> Remember me
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <p class="small fw-bold mt-2 pt-1 mb-0">
            Don't have an account? <a href="signup.php" class="link-danger">Register</a>
        </p>
    </form>
</body>