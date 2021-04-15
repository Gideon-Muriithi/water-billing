<?php
    include "../config.php";

    session_start();

    if (isset($_SESSION["loggedin"]) and $_SESSION["loggedin" == true]) {

        header("location:../views/welcome.php");
        exit;

    }

    if (isset($_GET["id"]) and !empty($_GET["id"])) {
        $id = trim($_GET["id"]);

        $sql2 = "SELECT * FROM `disputed_units` WHERE id='$id'";
        $results = mysqli_query($link, $sql2);

        if ($results) {
            $row = mysqli_fetch_array($results);
            $customer_units = $row["customer_units"];
            $account = $row["account_number"];


            if (isset($_POST["units-confirmation"])) {
                $readings_id = $row["readings_id"];

                $sql2 = "UPDATE `meter_readings` SET `current_units`='$customer_units' WHERE id='$readings_id'";
                $result2 = mysqli_query($link, $sql2);

                if ($result2) {

                    echo "<script type='text/javascript'>alert('Units updated successfully');
                            window.location='../views/meter-readings.php';
                            </script>";

                    $sql3 = "DELETE FROM `disputed_units` WHERE id='$id'";
                    mysqli_query($link, $sql3);
                    
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

        <div class="" id="units-confirmation" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-center" id="myModalLabel">Units Confirmation</h4>
                        <a href="../views/users-admin.php"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button></a>
                    </div>
                    <form action="" method="post">
                        
                        <div class="modal-body">
                            <input type="hidden" name="user_id" id="user_id" value="<?php echo trim($_GET["id"]); ?>">
                            <p class="text-center">
                                Are you sure you want to confirm units for account <?php echo $account;?>? 
                            </p>
                        </div>
                        <div class="modal-footer">
                            <a href="../views/users-admin.php"><button type="button" class="btn btn-success" data-dismiss="modal">No</button></a>
                            <button name="units-confirmation" type="submit" class="btn btn-danger">Yes </button>
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

