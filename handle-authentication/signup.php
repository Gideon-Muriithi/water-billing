<?php

require_once "../config.php";

if (isset($_POST["register"])) {
    $fname= trim($_POST["fname"]);
    $email = trim($_POST["email"]);
    $user_type = trim($_POST["user-type"]);
    $password = trim($_POST["pwd"]);
    $confirmpassword = trim($_POST["confirmpwd"]);

    if (strlen($password) < 6) {
        $password_error = "Password should have a minimum of 6 characters";
        echo "Password should have atleast 6 characters";
    } else {
        $store_password = password_hash($password, PASSWORD_DEFAULT);
    }

    if ($confirmpassword != $password) {
        $confirm_passwd_error = "Password and confirm password do not match";

        echo "Password and confirm password do not match";
    } else {
        $store_confirm_passwd = password_hash($confirmpassword, PASSWORD_DEFAULT);
    }

    if (empty($password_error) and empty($confirm_passwd_error)) {
        $sql = "INSERT INTO `users`(`name`,`email`,`password`,`user_type`) VALUES
        ('$fname','$email','$store_password','$user_type');";

        $results = mysqli_query($link, $sql);

        if ($results) {
            echo "User registered successfully";
            header("location: ../views/users-admin.php");
        } else {
            echo "Error $sql ".mysqli_error($link);
        }
    }
    
}

mysqli_close($link);