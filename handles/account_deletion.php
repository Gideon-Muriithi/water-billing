<?php
    include "../config.php";

    session_start();

    if (isset($_SESSION["loggedin"]) and $_SESSION["loggedin" == true]) {

        header("location:../views/welcome.php");
        exit;

    }
    
        
    if (isset($_POST["cus_id"]) and !empty($_POST["cus_id"])) {
        $id = trim($_POST["cus_id"]);
        
        if (isset($_POST["delete"])) {
            $sql = "DELETE FROM `customers` WHERE id='$id'";
            $results = mysqli_query($link, $sql);
            

            echo "<script type='text/javascript'>alert('Account deleted successfully');
                window.location='../views/customers-admin.php';
                </script>";
           
        }  

    } 

    $cust_id = $_GET["id"];
    $sql2 = "SELECT `AccountName` FROM  `customers` WHERE id='$cust_id'";

    $result = mysqli_query($link, $sql2);
    $row = mysqli_fetch_array($result);

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

      <!-- Modal -->
                <div class="" id="delete" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title text-center" id="myModalLabel">Delete Confirmation</h4>
                                <a href="../views/customers-admin.php"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button></a>
                            </div>
                            <form action="" method="post">
                                
                                <div class="modal-body">
                                    <input type="hidden" name="cus_id" id="cus_id_2" value="<?php echo trim($_GET["id"]); ?>">
                                    <p class="text-center">
                                        Are you sure you want to delete account <?php echo $row["AccountName"];?>? 
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <a href="../views/customers-admin.php"><button type="button" class="btn btn-success" data-dismiss="modal">No</button></a>
                                    <button name="delete" type="submit" class="btn btn-danger">Yes </button>
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

