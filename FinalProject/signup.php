<head>
    <title>Car Rental MYM</title>
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
    </style>
    <script>
        function validateForm() {
            var fname = document.getElementById("fname").value;
            var lname = document.getElementById("lname").value;
            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirm_password").value;
            var phone = document.getElementById("phone").value;
            var address = document.getElementById("address").value;

            if (fname == "" || lname == "" || email == "" || password == "" || confirmPassword == "" || phone == "") {
                var messageContainer = document.getElementById("message_container");
                messageContainer.innerHTML =
                    `<p class="error">Please fill out all fields!</p>`;
                return false;
            }

            if (password != confirmPassword) {
                console.log('password');
                var message_container = document.getElementById("message_container");
                message_container.innerHTML =
                    `<p class="error">Confirm password should match password</p>`;
                return false;
            }

            var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            if (!emailRegex.test(email)) {
                var messageContainer = document.getElementById("message_container");
                messageContainer.innerHTML =
                    `<p class="error">Please enter a valid email address!</p>`;
                return false;
            }

            var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/;
            if (!passwordRegex.test(password)) {
                var message_container = document.getElementById("message_container");
                message_container.innerHTML =
                    `<p class="error">Please enter a valid password. Password should contain at least 8 characters, one uppercase letter, one lowercase letter and one number!</p>`;
                return false;
            }

            return true;
        }
    </script>
</head>

<body class="d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <form action="signup_validation.php" method="POST" onsubmit="return validateForm()">
        <h3 class="d-flex align-items-center justify-content-center">Register</h3>
        <hr>
        <div id="message_container" class="mb-3 mt-3">
            <?php
            if (isset($_GET["error"])) { ?>
                <p id="error_paragraph" class="error"> <?php echo $_GET["error"]; ?> </p>
            <?php
            } ?>
        </div>
        <!-- First Name -->
        <div class="mb-3 mt-3">
            <label for="fname" class="form-label">First Name:</label>
            <?php
            if (isset($_GET['fname'])) { ?>
                <input type="name" class="form-control" id="fname" placeholder="Enter your first name" name="fname" value="<?php echo $_GET['fname'] ?> ">
            <?php
            } else { ?>
                <input type="name" class="form-control" id="fname" placeholder="Enter your first name" name="fname">
            <?php
            }
            ?>
        </div>
        <!-- Last Name -->
        <div class="mb-3 mt-3">
            <label for="lname" class="form-label">Last Name:</label>
            <?php
            if (isset($_GET['lname'])) { ?>
                <input type="name" class="form-control" id="lname" placeholder="Enter your last name" name="lname" value="<?php echo $_GET['lname'] ?> ">
            <?php
            } else { ?>
                <input type="name" class="form-control" id="lname" placeholder="Enter your last name" name="lname">
            <?php
            }
            ?>
        </div>
        <!-- Email -->
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Email:</label>
            <?php
            if (isset($_GET['email'])) {
            ?>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $_GET["email"]; ?>">
            <?php
            } else { ?>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            <?php
            }
            ?>
        </div>
        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
        </div>
        <!-- Confirm Password -->
        <div class="mb-3">
            <label for="confirm_password" class="form-label">Confirm Password:</label>
            <input type="password" class="form-control" id="confirm_password" placeholder="Confirm password" name="confirm_password">
        </div>
        <!-- Phone -->
        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number:</label>
            <?php
            if (isset($_GET['phone'])) {
            ?>
                <input type="phone" class="form-control" id="phone" placeholder="Enter your phone" name="phone" value="<?php echo $_GET["phone"]; ?>">
            <?php
            } else { ?>
                <input type="phone" class="form-control" id="phone" placeholder="Enter your phone" name="phone">
            <?php
            }
            ?>
        </div>
        <!-- Address -->
        <div class="mb-3">
            <label for="address" class="form-label">Address:</label>
            <?php
            if (isset($_GET['address'])) {
            ?>
                <input type="text" class="form-control" id="address" placeholder="Enter your address" name="address" value="<?php echo $_GET["address"]; ?>">
            <?php
            } else { ?>
                <input type="text" class="form-control" id="address" placeholder="Enter your address" name="address">
            <?php
            }
            ?>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

        <p class="small fw-bold mt-2 pt-1 mb-0">
            Already have an account? <a href="login.php" class="link-danger">Login</a>
        </p>
    </form>
</body>