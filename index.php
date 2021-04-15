<!DOCTYPE html>
<html lang="en">

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
        <link rel="stylesheet" href="css/style.css">
        <title>Water Billing</title>
    </head>
    <style>
        img {
            opacity: 0.7;
        }

        .footer_area {
            background-color: rgb(137, 137, 235);
            overflow-y: auto; 
        }

        .body {
            overflow-y: auto; 
        }

        .footer_social_area {
            text-align: center;
        }
    </style>


    <body class="body">

        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark primary-color fixed-top"
            style="background-color: rgb(54, 54, 233);">
            <!-- Navbar brand -->
            <a class="navbar-brand" href="#">WATER BILLS SYSTEM</a>
            <!-- Collapse button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
                aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Collapsible content -->
            <div class="collapse navbar-collapse" id="basicExampleNav">
                <!-- Links -->
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="#">ABOUT US</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">CONTACT US</a>
                    </li>
                </ul>
                <!-- Links -->
                <div class="">
                    <div class="my-0">
                        <p style="cursor: pointer;" class="text-white" data-toggle="modal"
                            data-target="#login">LOGIN</p>
                    </div>
                </div>
            </div>
            <!-- Collapsible content -->
        </nav>
        <!--/.Navbar-->


        <div style="margin-top: 70px;" class="ml-1 mr-1">
            <div>
                <div class="overlay">
                    <div class="card" id="header">
                        <!-- <img class="card-img" src="images/water_background.jpg"> -->

                        <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel"
                            data-interval="5000">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-1z" data-slide-to="1"></li>
                                <li data-target="#carousel-example-1z" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active">
                                    <img class="d-block w-100 card-img" src="images/water_background.jpg"
                                        alt="First slide" height="400px">
                                    <div class="carousel-caption text-center">
                                        <h3 class="mb-5">WELCOME<br>TO YOUR WATER BILLING SYSTEM</h3>
                                    </div>
                                </div>


                                <div class="carousel-item">
                                    <img class="d-block w-100 card-img" src="images/unsplash4.jpg"
                                        alt="Second slide" height="400px">
                                    <div class="carousel-caption text-center">
                                        <h3 class="mb-5">WELCOME<br>TO YOUR WATER BILLING SYSTEM</h3>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100 card-img" src="images/unsplash3.jpg"
                                        alt="Third slide" height="400px">
                                    <div class="carousel-caption text-center">
                                        <h3 class="mb-5">WELCOME<br>TO YOUR WATER BILLING SYSTEM</h3>
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carousel-example-1z" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel-example-1z" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Login Modal -->
            <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h4 class="modal-title text-bold" id="myModalLabel">Sign In</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                        <form action="handle-authentication/login.php" method="post">
                            <div class="modal-body">
                                <input type="hidden" name="customer" id="add-customer" value="">
                                <div class="modal-body">
                                    <input type="email" id="inputEmail" class="form-control" name="email"
                                        placeholder="Email address" required autofocus>
                                    <label for="inputEmail">Email address</label>
                                </div>

                                <div class="modal-body">
                                    <input type="password" name="password" id="inputPassword" class="form-control"
                                        placeholder="Password" required>
                                    <label for="inputPassword">Password</label>
                                </div>

                                <div class="modal-body">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Remember password</label>
                                    </div>
                                </div>


                            </div>
                            <div class="modal-footer">

                                <button name="login" class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign
                                    in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="mb-3">
                <footer class="footer_area clearfix text-white footer px-3">
                    <div class="">
                        <div class="row">
                            <!-- Single Widget Area -->
                            <div class="col-md-4">
                                <div class="single_widget_area d-flex">
                                    <!-- Footer Menu -->
                                    <div class="ml-0">
                                        <ul class="mt-3">
                                            <h4><span>Visit Our </span><a href="#">Blog</a></h4>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Widget Area -->
                            <div class="col-md-3">
                                <div class="single_widget_area ml-5">
                                    <div class="footer_heading mt-3 ">
                                        <h4>Subscribe</h4>
                                    </div>
                                    <div class="subscribtion_form">
                                        <form class="form-inline">
                                            <div class="md-form my-0">
                                                <input class="form-control mr-sm-2" type="text"
                                                    placeholder="Your Email Address" aria-label="Search">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Widget Area -->
                            <div class="col-md-5">
                                <div class="single_widget_area">
                                    <ul class="footer_widget_menu mt-3">
                                        <h4>Have an account with us?</h4>
                                        <h5>Login <a href="#" data-toggle="modal" data-target="#login"> Here</a></h5>
                                    </ul>
                                </div>
                            </div>


                            <div class="">
                                <!-- Single Widget Area -->
                                <div class="col-md-12">
                                    <div class="single_widget_area social-media">
                                        <div class="footer_social_area">
                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i
                                                    class="fa fa-facebook mr-4" aria-hidden="true"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i
                                                    class="fa fa-instagram mr-4" aria-hidden="true"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i
                                                    class="fa fa-twitter mr-4" aria-hidden="true"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest"><i
                                                    class="fa fa-pinterest mr-4" aria-hidden="true"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Youtube"><i
                                                    class="fa fa-youtube-play mr-4" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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