<?php

require_once("dbconnect.php"); // Using database connection file here

$id = $_GET['id']; // get id through query string

$query = "DELETE FROM product WHERE ProductID = '$id' ";// delete query
;

$result=mysqli_query($conn,$query); 

if($result)
{
    mysqli_close($conn); // Close connection
    header("location:../product.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>