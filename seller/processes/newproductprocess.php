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
    // Get name of images
  	$productImage = $_FILES['ProductImage']['name'];
  	
  	// image Path
  	$image_Path = "../images/product_images/".basename($productImage);


    $id=$_SESSION['UserID'];
    $qry=" INSERT INTO product(ProductName,ProductDescription,ProductPrice,ProductQuantity,ProductManufacturer,UserID,CategoryID, 
    ProductImage ) VALUES ('$productName','$productDescription','$productPrice','$productQuantity','$productManufacturer', 
    '$id','$productCategory','$productImage')";

    if (mysqli_query($conn,$qry)==TRUE)
    {   
        //find better ways to store images in the website i.e. random number generating, checking if file with similar name exists
        if (move_uploaded_file($_FILES['ProductImage']['tmp_name'], $image_Path)) {
            echo'<script> alert("Your Image uploaded successfully");</script>';
        }else{
            echo '<script> alert("Not Insert Image");</script>';
        }
        echo '<script> alert("Successful");</script>';
        $_SESSION['message']="Product has been Created";
        $_SESSION['msg_type']="success";
        
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