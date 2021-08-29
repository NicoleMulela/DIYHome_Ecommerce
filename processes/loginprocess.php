<?php
require_once("dbconnect.php");
session_start();

$un=$_POST['userEmail'];
$pwd=$_POST['userPass'];

$qry="SELECT * FROM users WHERE UserEmail='$un' ";


$result=mysqli_query($conn,$qry) ;
      
if($row=mysqli_fetch_array($result))
{
      
      if ($pwd!=$row['UserPassword'])
      {
            //Wrong password message
            $_SESSION['message']="Wrong Password";
            $_SESSION['msg_type']="danger";
            $url=("../auth/login.php");
            header("location: $url");
      }else{
            if ($pwd==$row['UserPassword'])
      {
                  echo '<script> alert("Login Successful");</script>';
                  session_start();
                  $_SESSION['UserID']=$row['UserID'];
                  //Successful login message
                  $_SESSION['message']="Successful login";
                  $_SESSION['msg_type']="success";

                  if($row['UserRole']==admin){
                  $url=("../admin/index.php");
                  header("location: $url");
                  }elseif($row['UserRole']==seller)
                  {
                        $url=("../seller/index.php");
                        header("location: $url");
                  }/*elseif($row['UserRole']==customer)
                  {
                        $url=("../client/index.php");
                        header("location: $url");
                  }*/
      }
      }
}
else{
      //Unsuccessful profile edit message
      $_SESSION['message']="User does not exist";
      $_SESSION['msg_type']="danger";
      $url=("../auth/login.php");
      header("location: $url");
}
?>