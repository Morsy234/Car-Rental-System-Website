<?php
include 'connection.php';
if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password']) && isset($_POST['phone']) && isset($_POST['address'])) {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    $user_input = "fname=" . $fname . "&lname=" . $lname . "&email=" . $email . "&phone=" . $phone . "&address=" . $address;
    if (empty($fname)) {
        header("Location: signup.php?error=First Name is required.&lname=" . $lname . "&email=" . $email . "&phone=" . $phone . "&address=" . $address);
        exit();
    } elseif (empty($lname)) {
        header("Location: signup.php?error=Last Name is required.&email=" . $email . "&phone=" . $phone . "&address=" . $address);
        exit();
    } elseif (empty($email)) {
        header("Location: signup.php?error=Email is required.&fname=" . $fname . "&lname=" . $lname . "&phone=" . $phone . "&address=" . $address);
        exit();
    } elseif (empty($password)) {
        header("Location: signup.php?error=Password is required.&$user_input");
        exit();
    } elseif ($password != $confirmPassword) {
        header("Location: signup.php?error=Confirm password should match password.&$user_input");
        exit();
    } elseif (empty($phone)) {
        header("Location: signup.php?error=phone is required.&fname=" . $fname . "&lname=" . $lname . "&email=" . $email . "&address=" . $address);
        exit();
    } elseif (empty($address)) {
        header("Location: signup.php?error=address is required.&fname=" . $fname . "&lname=" . $lname . "&email=" . $email . "&phone=" . $phone);
        exit();
    } else {
        $sql1 = 'SELECT * FROM `customers` WHERE `email`="' . $email . '"';

        $result = $conn->query($sql1);

        if ($result->num_rows > 0) {
            header("Location: signup.php?error=Email is already taken.&$user_input");
            exit();
        } else {
            // $password = md5($password);
            $sql2 = 'INSERT INTO customers ( `fname`, `lname` , `email`, `password`, `phone`, `address` )
                    VALUES ("' . $fname . '","' . $lname . '","' . $email . '","' . $password . '", "' . $phone . '","' . $address . '")';

            $result2 = mysqli_query($conn, $sql2);

            if ($result2) {
                header("Location: login.php?success=You have successfully registered!");
                exit();
            } else {
                header("Location: signup.php?error=Unknown error!");
                exit();
            }
            $conn->close();
        }
    }
} else {
    header("Location: signup.php");
    exit();
}
