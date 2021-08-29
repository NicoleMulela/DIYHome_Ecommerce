<?php
//edit client profile
require("dbconnect.php");
session_start();

//edit profile
if(isset($_POST['edit_profile']))
{ 
    //User ID
    $id=$_SESSION['UserID'];
    
    $userName=$_POST["UserName"];
    $userEmail=$_POST["UserEmail"];
    $userPhone=$_POST["UserPhone"];
    
    //Getting the image from the field
    // Get name of images
    $userImage = $_FILES['UserImage']['name'];
  	
  	// image Path
  	$image_Path = "../images/profile/client/".basename($userImage);
    

    //update database
    
    $sql = "UPDATE users SET UserName='$userName', UserEmail='$userEmail', UserPhone='$userPhone',
    UserImage='$userImage' WHERE UserID='$id'";
    
    if (mysqli_query($conn,$sql)==TRUE)
        {   
            if (move_uploaded_file($_FILES['UserImage']['tmp_name'], $image_Path)) {
                echo'<script> alert("Your Image uploaded successfully");</script>';
            }else{
                echo '<script> alert("Not Insert Image");</script>';
            }
            echo '<script> alert("Update Successful");</script>';

            //Successful profile edit message
            $_SESSION['message']="Profile updated Sucessfully";
            $_SESSION['msg_type']="success";
            
            $url=("../client/profile.php");
            header("location: $url");
        }
        else{
            echo '<script> alert("Please try again");</script>';
            $url=("../client/editprofile.php");
            header("location: $url");
        }
      
      mysqli_close($conn);
}