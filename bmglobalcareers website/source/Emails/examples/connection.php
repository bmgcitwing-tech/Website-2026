<?php
//online db connection 


$servername = "localhost";
$username = "bmglobalcareers_bm";
$password = "nwY@nK8008RY";
$dbname = "bmglobalcareers_bm"; 

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

/* check connection */
if (mysqli_connect_errno())
{
   printf("Connect failed: %s\n", mysqli_connect_error());
   exit();
}


?>