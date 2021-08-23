<?php
require_once("dbconnect.php");
session_start();
if(isset($_POST['add_product']))
{ 
    $productName=$_POST["ProductName"];
    $productDescription=$_POST["ProductDescription"];
    $productManufacturer=$_POST["ProductManufacturer"];
    $productQuantity=$_POST["ProductQuantity"];
    $productPrice=$_POST['ProductPrice'];
    $productCategory=$_POST['ProductCategory'];
    
    //Getting the image from the field
    $productImage= $_FILES['ProductImage']['name'];
    $productImageTmp= $_FILES['ProductImage']['tmp_name'];

    move_uploaded_file($productImage, "images/product_images/$productImageTmp");

    $id=$_SESSION['UserID'];
    $qry=" INSERT INTO product(ProductName,ProductDescription,ProductPrice,ProductQuantity,ProductManufacturer,UserID,CategoryID, 
    ProductImage ) VALUES ('$productName','$productDescription','$productPrice','$productQuantity','$productManufacturer', 
    '$id','$productCategory','$productImage')";

    if (mysqli_query($conn,$qry)==TRUE)
    {
        echo '<script> alert("Successful");</script>';
        session_start();
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