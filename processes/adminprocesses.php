<?php
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
  	$image_Path = "../images/profile/admin/".basename($userImage);
    

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
            
            $url=("../admin/index.php");
            header("location: $url");
        }
        else{
            echo '<script> alert("Please try again");</script>';
            $url=("../admin/editprofile");
            header("location: $url");
        }
      
      mysqli_close($conn);
}


//******************************************************************************************************************** */
//create new admin user
if(isset($_POST['new_admin']))
{ 
    //User ID
    $id=$_SESSION['UserID'];
    
    $userName=$_POST["UserName"];
    $userEmail=$_POST["UserEmail"];
    $userPhone=$_POST["UserPhone"];
    $userPassword=$_POST["UserPassword"];

    //restrict pasword length
    if(strlen($userPassword)<5){
        //Warning password length
        $_SESSION['message']="Password should be longer than 4 characters";
        $_SESSION['msg_type']="danger";
        
        $url=("../admin/registeradmin.php");
        header("location: $url");
    }else{
        //Getting the image from the field
        // Get name of images
        $userImage = $_FILES['UserImage']['name'];
        
        // image Path
        $image_Path = "../images/profile/admin/".basename($userImage);
        
        //Generate VKey
        //$vkey= md5(time().$userName);
        //encrypt password
        $userPassEnc= md5($userPassword);

        //insert into database
        $sql = "INSERT INTO users(UserName, UserEmail, UserPhone, UserRole, UserPassword,UserImage,verified) VALUES($userName, $userEmail, $userPhone,'admin',$userPassEnc,$userImage, '1')";
        if (mysqli_query($conn,$sql)==TRUE)
            {   
                if (move_uploaded_file($_FILES['UserImage']['tmp_name'], $image_Path)) {
                    echo'<script> alert("Your Image uploaded successfully");</script>';
                }else{
                    echo '<script> alert("Not Insert Image");</script>';
                }
                echo '<script> alert("Update Successful");</script>';

                //Successful new admin message
                $_SESSION['message']="New Admin Created Sucessfully";
                $_SESSION['msg_type']="success";
                
                $url=("../admin/manageadmin.php");
                header("location: $url");
            }
            else{
                //Error new admin message
                $_SESSION['message']="Error in updating to Database";
                $_SESSION['msg_type']="danger";

                $url=("../admin/registeradmin.php");
                header("location: $url");
            }
        
        mysqli_close($conn);
    }
}
