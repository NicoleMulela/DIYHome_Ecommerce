<?php
require_once("dbconnect.php");
session_start();
if(isset($_POST['edit_product']))
{ 
    //product ID
    
    $productID=$_POST["ProductID"];
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
    

    //update category missing ( ProductCategory='$productCategory' )
    
    $sql = "UPDATE product SET ProductName='$productName', ProductDescription='$productDescription', ProductManufacturer='$productManufacturer',
    ProductQuantity='$productQuantity', ProductPrice='$productPrice', ProductImage='$productImage' WHERE ProductID='$productID'";
    
    if (mysqli_query($conn,$sql)==TRUE)
        {   
            if (move_uploaded_file($_FILES['ProductImage']['tmp_name'], $image_Path)) {
                echo'<script> alert("Your Image uploaded successfully");</script>';
            }else{
                echo '<script> alert("Not Insert Image");</script>';
            }
            echo '<script> alert("Update Successful");</script>';
            
                $url=("../product.php");
                header("location: $url");
        }
        else{
            echo '<script> alert("Please try again");</script>';
            $url=("../editproduct.php?id=$productID");
            header("location: $url");
        }
      
      mysqli_close($conn);

    /*//update to DB trial
   
      //get product information to compare changes before making updates
      $sql="SELECT * from product WHERE ProductID= '$id'";
      $result= mysqli_query($conn, $sql);

      $rows=mysqli_fetch_array($run_cats);

      if($rows)
      {
        $Prod_id= $rows['ProductID'];
        $Prod_name= $rows['ProductName'];
        $Prod_desc= $rows['ProductDescription'];
        $Prod_man =$rows['ProductManufacturer'];
        $prod_Image= $rows['ProductImage'];
        $prod_quantity =$rows['ProductQuantity'];
        $prod_price= $rows['ProductPrice'];
        $prod_cat= $rows['ProductCategory'];
      }
      //compare information to find changes
      if($productName!= $Prod_name || $productDescription!=$Prod_desc || $productManufacturer!= $Prod_man
      || $productQuantity!= $prod_quantity || $productCategory!= $Prod_cat)
      {
        $sql = "UPDATE product SET ProductName='$productName', ProductDescription='$productDescription', ProductManufacturer='$productManufacturer',
        ProductQuantity='$productQuantity', ProductPrice='$productPrice', ProductCategory='$productCategory'  WHERE id='$id'";
        
        if (mysqli_query($conn,$sql)==TRUE)
        {   
        
            echo '<script> alert("Update Successful");</script>';
            session_start();
                $url=("../product.php");
                header("location: $url");
        }
        else{
            echo '<script> alert("Please try again");</script>';
            $url=("../product.php");
            header("location: $url");
        }
      }
      mysqli_close($conn);
    */
    
}
echo '<script> alert("Error");</script>';