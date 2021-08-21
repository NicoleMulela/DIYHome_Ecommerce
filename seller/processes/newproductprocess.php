<?php
require_once("dbconnect.php");

if(isset($_POST['add']))
{ 
    $productName=$_POST["ProductName"];
    $productDescription=$_POST["ProductDescription"];
    $productManufacturer=$_POST["ProductManufacturer"];
    $productQuantity=$_POST["ProductQuantity"];
    $productPrice=$_POST['ProductPrice'];

    $id=$_SESSION['UserID'];
    $qry=" INSERT INTO product(ProductName,ProductDescription,ProductPrice,ProductQuantity,ProductManufacturer,UserID,CategoryID ) 
    VALUES ('$productName','$productDescription','$productPrice','$productQuantity','$productManufacturer', '1','1')";
    if (mysqli_query($conn,$qry)==TRUE)
    {
        echo '<script> alert("Successful");</script>';
        session_start();
        $_SESSION['User']=$un;
            echo ("login successful. Welcome").$_SESSION['User'];
            $url=("../product.php");
            header("location: $url");
    }
    else{
        echo '<script> alert("Please try again");</script>';
        $url=("../newproduct.php");
        header("location: $url");
    }

    mysqli_close($conn);
}
echo '<script> alert("Error");</script>';