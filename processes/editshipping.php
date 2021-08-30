<?php
//edit shipping address
require("dbconnect.php");
session_start();


if(isset($_POST['edit_address']))
{ 
    //User ID
    $UserID=$_SESSION['UserID'];

    $id = $_POST["AID"];
    $fullName=$_POST["Fullname"];
    $phone=$_POST["Phone"];
    $address=$_POST["Address"];
    $city=$_POST["City"];
    
    //update database
    
    $sql = "UPDATE shipping_details SET FullName='$fullName', Contact='$phone', City='$city',AddressDesc='$address'
     WHERE shipping_details.ShippingID='$id'";
    
    if (mysqli_query($conn,$sql)==TRUE)
        {   
             //Successful profile edit message
            $_SESSION['message']="Address updated Successfully";
            $_SESSION['msg_type']="success";
            
            $url=("../client/delivery.php");
            header("location: $url");
        }
        else{
            $_SESSION['message']="Error In Inserting to DB";
            $_SESSION['msg_type']="danger";
            $url=("../client/editdelivery.php");
            header("location: $url");
        }
      
      mysqli_close($conn);
}