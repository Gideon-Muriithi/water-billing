
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
                                    
                                    // echo "User: ".$user;                                       

                                    } else {
                                        echo "<li class='nav-item'>";
                                            echo "<a href='customers-admin.php' class='nav-link'>";
                                                echo "<p class='nav-item'><i class='fa fa-circle-o nav-icon mr-1'></i>Manage Customers</p>";
                                            echo "</a>";
                                            echo "</li>";

                                        echo "<li class='nav-item'>";
                                            echo "<a href='users-admin.php' class='nav-link'>";
                                                echo "<p class='nav-item'><i class='fa fa-circle-o nav-icon mr-1'></i>Manager System Users</p>";
                                            echo "</a>";
                                            echo "</li>";

                                        echo "<li class='nav-item'>";
                                        echo "<a href='disputed-units.php' class='nav-link'>";
                                            echo "<p class='nav-item'><i class='fa fa-circle-o nav-icon mr-1'></i>Disputed Units</p>";
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
                                            <p class="nav-item"><i
                                                    class="fa fa-circle-o nav-icon mr-1 text-danger"></i>Logout</p>
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


                <?php
                    include "../config";
                    echo "<div class='container mt-3'>";
                        echo "<div class='row'>";
                            echo "<div class='col-sm-12'>";
                                echo "<div class='card mr-2'>";
                                    echo "<div class='card-header d-inline'>";
                                        echo "<span class='card-title h4'>All System Users</span>";
                                        echo "<span class='card-tools pull-right'>";
                                            echo "<button type='button' class='btn-primary px-2' data-toggle='modal'
                                                data-target='#user-registration'>";
                                                echo "Add New";
                                            echo "</button>";
                                        echo" </span>";
                                    echo "</div>";

                                    $sql = "SELECT * FROM `users`";
                                    $results = mysqli_query($link, $sql);

                                    if ($results){

                                        if (mysqli_num_rows($results) > 0) {
                                            echo "<div class='card-body'>";
                                            echo "<table class='table table-responsive-lg'>";
                                            echo "<tr>";

                                            echo "<th>Name</th>";
                                            echo "<th>Email</th>";
                                            echo "<th>User Type</th>";
                                            echo "<th>Modify</th>";
                                            echo "</tr>";

                                            echo "";

                                            while ($row = mysqli_fetch_array($results)) {
                                                echo "<tr>";
                                                    echo "<td>".$row["name"]."</td>";
                                                    echo "<td>".$row["email"]."</td>";
                                                    echo "<td>".$row["user_type"]."</td>";

                                                    echo "<td><a href='../handles/user_update.php?id=".$row['id']."'><i
                                                        class='fa fa-pencil-square-o text-info h6'
                                                                aria-hidden='true'></i></a>";

                                                    echo "<a href='../handles/user_deletion.php?id=".$row['id']."'
                                                    class='ml-2 text-danger h6'><i class='fa fa-trash'
                                                        aria-hidden='true'></i></a>";
                                                    echo "</td>";

                                                echo "<tr>";
                                            }

                                            echo "</table>";
                                        echo "<tr>";     
                                        echo "</tr>";
                                        echo "</div>";
                                    } else {
                                        echo "<p class='ml-4 mt-3 text-danger'>No user records found</p>";
                                    }
                                }else {
                                    echo "Error $sql".mysqli_error($link);
                                }
                                       
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";

                            mysqli_close($link);
                        ?>           


                <!--Add User Modal -->
                <div class="modal fade" id="user-registration" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Add User</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            </div>
                            <form action="../handle-authentication/signup.php" class="form-signin" method="POST">
                                <div class="modal-body">
                                    <div class="form-label-group">
                                    <label for="inputFName"></label>
                                    <input type="text" id="inputFName" name="fname" class="form-control"
                                        placeholder="Full Name" required autofocus>
                                </div><br>


                                <div class="form-label-group">
                                    <label for="inputEmail"></label>
                                    <input type="email" id="inputEmail" name="email" class="form-control"
                                        placeholder="Email address" required autofocus>
                                </div><br>

                                <label for="user-type">User type:</label><br>
                                <select name="user-type" id="user-type" class="form-control">
                                    <option value="customer">customer</option>
                                    <option value="admin">admin</option>
                                </select><br>

                                <div class="form-label-group">
                                    <label for="inputPassword"></label>
                                    <input type="password" id="inputPassword" name="pwd" class="form-control"
                                        placeholder="Password" required>
                                </div><br>

                                <div class="form-label-group">
                                    <label for="inputConPassword"></label>
                                    <input type="password" id="inputConPassword" name="confirmpwd" class="form-control"
                                        placeholder="Confirm Password" required>
                                </div><br>
                                </div>
                                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button name="register" type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
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