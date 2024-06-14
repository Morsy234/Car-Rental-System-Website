<?php
include 'connection.php';
include 'constants.php';

if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['user_type'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $userType = $_POST["user_type"];
    echo $userType;
    if (empty($email) || empty($password) || empty($userType)) {
        header("Location: login.php?error=Email and password are required.");
        exit();
    } else {
        $tableName = '';
        switch ($userType) {
            case 'admin':
                $tableName = 'admins';
                break;
            case 'customer':
                $tableName = 'customers';
                break;
            case 'office':
                $tableName = 'offices';
                break;
            default:
                header("Location: login.php?error=Invalid user type.");
                exit();
        }

        $sql = "SELECT `email`, `password` FROM `$tableName` WHERE `email`='$email'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if ($row['password'] == $password) {
                if (isset($_POST['remember'])) {
                    setcookie('remember_email', $email, time() + (30 * 24 * 3600), '/'); // Cookie expires in 30 days
                    setcookie('remember_password', $password, time() + (30 * 24 * 3600), '/'); // Cookie expires in 30 days
                }
                session_start();
                $_SESSION['email'] = $row['email'];

                if ($tableName == 'admins') {
                    $_SESSION['userRole'] = ROLE_ADMIN;     
                    header("Location: admin_page.php");
                } else if ($tableName == 'customers') {
                    $_SESSION['userRole'] = ROLE_CUSTOMER;
                    header("Location: index.php");
                } else if ($tableName == 'offices') {
                    $_SESSION['userRole'] = ROLE_OFFICE;
                    header("Location: index.php");
                }
            } else {
                header("Location: login.php?error=Password is wrong.&email=$email");
                exit();
            }
        } else {
            header("Location: login.php?error=Email is not found.");
            exit();
        }

        $conn->close();
    }
} else {
    header("Location: login.php");
    exit();
}
