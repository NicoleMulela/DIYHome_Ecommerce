<?php
require_once("dbconnect.php");



$qry="SELECT * FROM clientdetails WHERE UserID='1' ";


$result=mysqli_query($con,$qry) or die(mysqli_error($con));

while ($row=mysqli_fetch_array($result))
{
    echo '<script> alert("Login Successful");</script>';
    session_start();
    $_SESSION['UserID']=$row['UserID'];
    $_SESSION['UserName']=$row['UserName'];
    $url=("index.php");
    header("location: $url");
      
}

?>