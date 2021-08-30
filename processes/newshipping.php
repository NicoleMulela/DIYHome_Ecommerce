<?php
require("dbconnect.php");
if(isset($_POST['new_address']))
{ 
    $id=$_POST["UserID"];
    $fullName=$_POST["FullName"];
    $phone=$_POST["phone"];
    $address=$_POST["address"];
    $city=$_POST["city"];
    
    
    $qry=" INSERT INTO shipping_details(FullName, Contact,  City,AddressDesc, UserID ) VALUES ('$fullName', '$phone','$address', '$city', '$id')";

    if (mysqli_query($conn,$qry)==TRUE)
    {   
        
        $_SESSION['message']="Address has been added";
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
echo '<script> alert("Error");</script>';
?>