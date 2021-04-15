<?php
    include "../config.php";

    session_start();

    if (isset($_SESSION["loggedin"]) and $_SESSION["loggedin" == true]) {

        header("location:../views/welcome.php");
        exit;

    }
    
    if (isset($_GET["id"]) and !empty($_GET["id"])) {
        $id = trim($_GET["id"]);

        $sql = "SELECT * FROM `users` WHERE id='$id'";
        $results = mysqli_query($link, $sql);

        if ($results) {
            $row = mysqli_fetch_array($results);
            $name = $row["name"];
            $email = $row["email"];
            $user_type = $row["user_type"];
            $password = $row["password"];


            if (isset($_POST["update-user"])) {
                $name= trim($_POST["name"]);
                $email = trim($_POST["email"]);
                $user_type = trim($_POST["user-type"]);
                $password = trim($_POST["password"]);

                $sql2 = "UPDATE `users` SET `name`='$name',`email`='$email' WHERE id='$id'";
                $result2 = mysqli_query($link, $sql2);


                if ($result2) {

                    echo "<script type='text/javascript'>alert('User updated successfully');
                            window.location='../views/users-admin.php';
                            </script>";
                    
                } else {
                    echo "Error $sql2 ".mysqli_error($link);
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

    <body class="">
        <div class="" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Edit User Details</h4>
                        <a href="../views/users-admin.php"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button></a>
                    </div>
                    <form action="" method="post">
                        <div class="modal-body">
                            <input type="hidden" name="customers_id" id="cus_id_1" value="">
                            <div class="modal-body">
                                <label for='name'>Name</label>
                                <input type='text' class='form-control' name='name' id='name'
                                    value="<?php echo $name;?>">
                            </div>
                            <div class="modal-body">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email" id="email" value="<?php echo $email;?>">
                            </div>

                            <div class="modal-body">
                                <label for="user_type">User Type</label>
                                <input type="text" class="form-control" name="user_type" id="user_type" value="<?php echo $user_type;?>">
                            </div>

                            <div class="modal-body">
                                <label for="password">New Password</label>
                                <input type="text" class="form-control" name="password" id="password" value="<?php $password;?>">
                            </div>

                            <div class="modal-footer">
                                <a href="../views/users-admin.php"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></a>
                                <button name="update-user" type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                    </form>
                </div>
            </div>
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

