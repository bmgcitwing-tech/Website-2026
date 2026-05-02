<?php
//online db connection 


$servername = "localhost";
$username = "bmglobalcareers";
$password = "qjibc*EFAmS*Opbx";
$dbname = "bmglobalcareers"; 


$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

/* check connection */
if (mysqli_connect_errno())
{
   printf("Connect failed: %s\n", mysqli_connect_error());
   exit();
}


?>