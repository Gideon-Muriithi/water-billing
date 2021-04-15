<?php

include "../config.php";

session_start();

if (isset($_SESSION["loggedin"]) and $_SESSION["loggedin" == true]) {

    header("location:../views/welcome.php");
    exit;

}

if (isset($_POST["unit_id"]) and !empty($_POST["unit_id"])) {
    $unit_id = $_POST["unit_id"];

    $sql = "SELECT * FROM `meter_readings` WHERE `id`='$unit_id'";
    $result = mysqli_query($link, $sql);

    if ($result) {
        $row = mysqli_fetch_array($result);
        $user_id = $row["user_id"];

        $sql2 = "SELECT * FROM `customers` WHERE `user_id`='$user_id'";
        $results = mysqli_query($link, $sql2);

        if ($results) {
            $row2 = mysqli_fetch_array($results);

            $year = $row["year"];
            $month =  $row["month"];
            $account_name = $row2["AccountName"];
            $account_number = $row2["AccountNumber"];
            $customer_units = trim($_POST["units"]);
            $system_units = $row["current_units"];
            $readings_id = $row["id"];

            $sql3 = "INSERT INTO `disputed_units`(`year`, `month`, `account_name`, `account_number`, `customer_units`, `system_units`, `user_id`, `readings_id`) 
            VALUES ('$year', '$month', '$account_name', '$account_number', '$customer_units', '$system_units', '$user_id', '$readings_id')";

            $results2 = mysqli_query($link, $sql3);

            if ($results2) {
                echo "<script type='text/javascript'>alert('Meter readings submitted succefully. Kindly wait a few days the readings to be updated on the system')
                window.location='../views/meter-readings.php';
                </script>";
            } else {
                echo "<h5 class='text-white m-4 text-center bg-danger'>An account can only have one record of disputed units at a time. You have uncofirmed disputed units. Please try again
                after a few days.</h5>";
            }
        } else {
            echo "An error has occurred";
        }

        }  else {
            echo "An error has occurred";
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
       
        <div class="" id="customer-units" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Current Meter Readings</h4>
                    <a href="../views/meter-readings.php"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button></a>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="unit_id" id="unit_id" value="<?php echo trim($_GET["id"])?>">
                        <div class="modal-body">
                            <label for='name'>Enter The Meter Readings Here:</label>
                            <input type='number' class='form-control' name='units' id='units' required>
                        <div class="modal-footer">
                            <a href="../views/meter-readings.php"><button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button></a>
                            <button name="customer-units" type="submit" class="btn btn-primary btn-sm">Save</button>
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

