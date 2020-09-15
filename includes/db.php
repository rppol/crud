<?php
// MySQL connection
$dbServer = "localhost";
$dbUser = "id14778031_rutik";
$dbPassword = "Aaaaa111***";
$database = "id14778031_collegedb";

$conn = mysqli_connect($dbServer, $dbUser, $dbPassword, $database) or die('Mysql Connection Error:' . mysqli_connect_error());
