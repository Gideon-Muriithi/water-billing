<?php

include "../config.php";

session_start();

if (isset($_SESSION["loggedin"]) and $_SESSION["loggedin" == true]) {

    header("location:../views/welcome.php");
    exit;

}

if (isset($_POST["add-customer"])) {
    $account_number = trim($_POST["AccountNumber"]);
    $account_name = trim($_POST["AccountName"]);
    $phone_number = trim($_POST["PhoneNumber"]);
    $id_number = trim($_POST["IdNumber"]);
    $user_name = trim($_POST["sys-user"]);
    $description = trim($_POST["description"]);

    $get_id = "SELECT `id` FROM `users` WHERE name='$user_name'";
    $result = mysqli_query($link, $get_id);


    if ($result) {
        $row = mysqli_fetch_array($result);
        $user_id = $row["id"];

        $sql = "INSERT INTO `customers`(`AccountNumber`, `AccountName`, `PhoneNumber`, `IdNumber`, `Description`, `user_id`) 
        VALUES ('$account_number','$account_name','$phone_number','$id_number','$description','$user_id');";
        $results = mysqli_query($link, $sql);

        if ($results) {
            echo "Customer added successfully";
            header("location: ../views/customers-admin.php");
        } else {
            echo "Error $sql ".mysqli_error($link);
        }
    } else {
        echo "Error $get_id ".mysqli_error($link);
    }

}

mysqli_close($link);