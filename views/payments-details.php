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
        <!-- <link rel="stylesheet" href="css/style.css"> -->
        <style>

        </style>
    </head>

    <body>
        <div class="row">
            <div class="col-md-3 main-sidebar">
                <!-- Main Sidebar Container -->
                <aside class="main-sidebar elevation-4">
                    <a href="#" class="brand-link">
                        <h5 class="brand-text font-weight-light nav-item mt-4">Your Water Billing</h5>
                    </a>
                    <hr>
                    <!-- Sidebar -->
                    <div class="sidebar main-sidenav">
                        <!-- Sidebar user panel (optional) -->
                        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                            <div class="image">
                                <!-- <i class="fas fa-user-circle text-danger"></i> -->
                                <img src="../images/avatar.png" height="50px" class="img-circle elevation-2"
                                    alt="User Image">
                            </div>
                            <div class="info">
                                <a href="#" class="d-block nav-item ml-1">
                                    <?php
                                        include "../config.php";
                                        session_start();
                                        $user_email = $_SESSION["email"];

                                        $sql = "SELECT * FROM `users` WHERE `email`='$user_email'";
                                        $results = mysqli_query($link, $sql);

                                        if ($results) {
                                            $row = mysqli_fetch_array($results);

                                            echo $row["name"];
                                        } else {
                                            echo $_SESSION["email"];
                                        }

                                    ?>
                                </a>
                                <a href="#"><i class="fa fa-circle text-success ml-1"></i><span
                                        class="nav-item">Online</span></a>
                            </div>
                        </div>
                        <hr>

                        <!-- Sidebar Menu -->
                        <nav class="navbar-expand-lg navbar-dark scrolling-navbar">
                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                                data-accordion="false">
                                
                            <?php
                                include "../config.php";
                                session_start();
                                $user_email = $_SESSION["email"];

                                $sql = "SELECT * FROM `users` WHERE `email`='$user_email'";

                                $results = mysqli_query($link, $sql);

                                if ($results) {
                                    echo "<li class='nav nav-item has-treeview menu-open'>";
                                        echo "<ul class='nav'>";
                                    $row = mysqli_fetch_array($results);
                                    $user = $row["user_type"];
                                    // $user = "admin";
                                    if ($user == "customer") {
                                    echo "<li class='nav-item'>";
                                        echo "<a href='account-details.php' class='nav-link'>";
                                        echo "<p class='nav-item'><i class='fa fa-circle-o nav-icon mr-1'></i>Account Details</p>";
                                        echo "</a>";
                                        echo "</li>";

                                        echo "<li class='nav-item'>";
                                        echo "<a href='meter-readings.php' class='nav-link'>";
                                            echo "<p class='nav-item'><i class='fa fa-circle-o nav-icon mr-1'></i>Meter Readings</p>";
                                        echo "</a>";
                                        echo "</li>";


                                    echo "<li class='nav-item'>";
                                        echo "<a href='bills.php' class='nav-link'>";
                                            echo "<p class='nav-item'><i class='fa fa-circle-o nav-icon mr-1'></i>Bills</p>";
                                        echo "</a>";
                                        echo "</li>";


                                    echo "<li class='nav-item'>";
                                        echo "<a href='payments-details.php' class='nav-link'>";
                                            echo "<p class='nav-item'><i class='fa fa-circle-o nav-icon mr-1'></i>Payment Details</p>";
                                            echo "</a>";
                                        echo "</li>";


                                    echo "<li class='nav-item'>";
                                        echo "<a href='status.php' class='nav-link'>";
                                            echo "<p class='nav-item'><i class='fa fa-circle-o nav-icon mr-1'></i>Account Status</p>";
                                        echo "</a>";
                                        echo "</li>";


                                        } else {
                                            echo "<li class='nav-item'>";
                                                echo "<a href='customers-admin.php' class='nav-link'>";
                                                    echo "<p class='nav-item'><i class='fa fa-circle-o nav-icon mr-1'></i>Manage Customers</p>";
                                                echo "</a>";
                                                echo "</li>";
                                            }

                                        echo "</ul>";
                                        echo "</li>";
                                    }
                                ?>


                                <ul class="nav">

                                    </li>
                                    <li class="nav-item">
                                        <a href="../handle-authentication/logout.php" class="nav-link">
                                            <p class="nav-item"><i class="fa fa-circle-o nav-icon mr-1 text-danger"></i>Logout</p>
                                        </a>
                                    </li>

                                    </li>

                                    </li>
                                </ul>
                            </ul>
                        </nav>
                        <!-- /.sidebar-menu -->
                    </div>
                    <!-- /.sidebar -->
                </aside>
            </div>
            <div class="col-md-9 col9">
                <!-- Navbar -->
                <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">

                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="welcome.php" class="nav-link">Home</a>

                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="#" class="nav-link">Contact</a>
                        </li>
                    </ul>

                    <!-- SEARCH FORM -->
                    <form class="form-inline ml-3 mr-3">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn-navbar" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </nav>


                <div class="">
                    <div class="box">
                        <div class="box-header mt-3 text-center">
                            <h3 class="box-title">Financial Statements</h3>
                        </div>

                        <div class="box-body">
                            <table
                                class="table table-striped table-bordered table-hover table-responsive-lg table-dark id=table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Year</th>
                                        <th scope="col">Month</th>
                                        <th scope="col">C/F</th>
                                        <th scope="col">Amount Paid</th>
                                        <th scope="col">B/F</th>
                                        <th scope="col">Amount Due</th>
                                    </tr>
                                </thead>
                                <tbody>

                                 <?php
                                        include "../config.php";
                                        session_start();
                                        $user_email = $_SESSION["email"];

                                        $sql = "SELECT * FROM `users` WHERE `email`='$user_email'";
                                        $result = mysqli_query($link, $sql);

                                        if ($result) {
                                            $row = mysqli_fetch_array($result);
                                            $user_id = $row["id"];
                                            $sql2 = "SELECT * FROM `payments` WHERE `user_id`='$user_id'";
                                            $results = mysqli_query($link, $sql2);

                                            if ($results) {
                                                $num = 1;

                                                while ($row2 = mysqli_fetch_array($results)) {
                                                    echo "<tr>";
                                                        echo "<td>"."$num"."</td>";
                                                        echo "<td>".$row2["year"]."</td>";
                                                        echo "<td>".$row2["month"]."</td>";
                                                        echo "<td>".number_format($row2["c/f"])."</td>";
                                                        echo "<td>".number_format($row2["paid"])."</td>";
                                                        echo "<td>".number_format($row2["b/f"]+$row2["previous_charges"])."</td>";
                                                        echo "<td>".number_format($row2["b/f"]+$row2["due"])."</td>";
                                                        
                                                        $num += 1;
                                                    echo "</tr>";
                                                }
                                            }
                                        }
                                        
                                    ?>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>




                <footer class="main-footer">
                    <hr>
                    <small class="text-muted">Copyright &copy; 2021 Water Billing System
                        All rights reserved.</small>

                </footer>
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