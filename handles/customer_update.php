<?php
    include "../config.php";

    session_start();

    if (isset($_SESSION["loggedin"]) and $_SESSION["loggedin" == true]) {

        header("location:../views/welcome.php");
        exit;

    }
    
    if (isset($_GET["id"]) and !empty($_GET["id"])) {
        $id = trim($_GET["id"]);

        $sql = "SELECT * FROM `customers` WHERE id='$id'";
        $results = mysqli_query($link, $sql);

        if ($results) {
            $row = mysqli_fetch_array($results);
            $account_number = $row["AccountNumber"];
            $account_name = $row["AccountName"];
            $phone_num = $row["PhoneNumber"];
            $id_num = $row["IdNumber"];
            $description = $row["Description"];
            $user_id = $row["user_id"];

            $sql2 = "SELECT `name` FROM `users` WHERE id='$users_id'";
            $result = mysqli_query($link, $sql2);
            $row2 = mysqli_fetch_array($result);
            $user_name = $row2["name"];


            if (isset($_POST["update-customer"])) {
                $account_number = trim($_POST["AccountNumber"]);
                $account_name = trim($_POST["AccountName"]);
                $phone_number = trim($_POST["PhoneNumber"]);
                $id_number = trim($_POST["IdNumber"]);

                $description = trim($_POST["description"]);


                $sql3 = "UPDATE `customers` SET `AccountNumber`='$account_number',`AccountName`='$account_name',
                `PhoneNumber`='$phone_number ',`IdNumber`='$id_number',`Description`='$description' WHERE id='$id'";
                $result3 = mysqli_query($link, $sql3);


                if ($result3) {

                    echo "Customer updated successfully";
                    header("location: ../views/customers-admin.php");
                    
                } else {
                    echo "Error $sql3 ".mysqli_error($link);
                    }

                }
            }
        }
        
mysqli_close($link);
?>


<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="http://www.w3schools.com/lib/w3data.js"></script>
        <!-- Font Awesome -->
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Bootstrap core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css"
            rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/css/mdb.min.css" rel="stylesheet">
        <!--Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Srisakdi&display=swap" rel="stylesheet">
        <title>Water Billing</title>
        <link rel="stylesheet" href="../css/style.css">
        <style>

        </style>
    </head>

    <body class="mt-2 mb-3">

     <!--Edit customer Modal -->
               
        <div class="row">
            <div class="col-md-3"></div>
                <div class="col-md-6">
                <div class="card mr-2">
                    <div class='card-header d-inline'>
                        <span class='card-title h6 text-center'>Account Update For Customer <?php echo $user_name ?></span>
                    </div>
                        <form action="" method="post">
                            <div class="modal-body">
                                <input type="hidden" name="customers_id" id="cus_id_1" value="">
                                <div class="modal-body">
                                    <label for="AccountNumber">Account Number</label>
                                    <input type="number" class="form-control" name="AccountNumber"
                                        id="AccountNumber" value="<?php echo $account_number?>">
                                </div>
                                <div class="modal-body">
                                    <label for="Account_Name">Account Name</label>
                                    <input type="text" class="form-control" name="AccountName" id="Account_Name" value="<?php echo $account_name?>">
                                </div>
                                <div class="modal-body">
                                    <label for="PhoneNumber">Phone Number</label>
                                    <input type="number" class="form-control" name="PhoneNumber" id="PhoneNumber" value="<?php echo $phone_num?>">
                                </div>
                                <div class="modal-body">
                                    <label for="IdNumber">ID Number</label>
                                    <input type="number" class="form-control" name="IdNumber" id="IdNumber" value="<?php echo $id_num?>">
                                </div>
                                <div class="form-group">
                                    <label for="des">Description</label>
                                    <input name="description" id="des" style="height:100px; width:100%;"
                                        class="form-control mr-2" value="<?php echo $description?>" placeholder="<?php echo $description?>">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="../views/customers-admin.php"><button type="button" class="btn btn-default btn-sm">Close</button></a>
                                <button name="update-customer" type="submit" class="btn btn-primary btn-sm">Save Changes </button>
                            </div>
                        </form>
                    </div>
            </div>
            <div class="col-md-3"></div>
        </div>

    <!-- JQuery -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/js/mdb.min.js"></script>
        <script>
            w3IncludeHTML();
        </script>
    </body>

</html>

