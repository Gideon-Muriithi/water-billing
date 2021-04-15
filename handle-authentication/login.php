<?php 

include "../config.php";

session_start();

if (isset($_SESSION["loggedin"]) and $_SESSION["loggedin" == true]) {

    header("location:../views/welcome.php");
    exit;

}

if (isset($_POST["login"])) {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    $passwd_hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "SELECT  `id`,`email`, `password` FROM `users` WHERE email='$email'";

    $results = mysqli_query($link, $sql);

    // $results = "";

    if ($results) {
        if (mysqli_num_rows($results) == 1) {
            $row = mysqli_fetch_array($results);

            if (password_verify($password, $row["password"])) {
                session_start();
                $_SESSION["loggedin"] = true;
                $_SESSION["email"] = $email;
                $_SESSION["success"] = "Logged in successfully";

                header("location:../views/welcome.php");
            } else {
                echo "Wrong password";
            }
        } else {
            echo "Wrong email or password";
        }
    } else {
            echo "Wrong email or password";
        }
} else {
    echo "Check your email and password";
}