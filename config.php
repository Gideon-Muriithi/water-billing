<?php

define("USERNAME", "root");
define("PASSWORD", "");
define("SERVER", "localhost");
define("DATABASE", "water-billing-sys");

$link = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASE);

if ($link == false) {
    die ("Error connecting to database ".mysqli_error($link));
} 