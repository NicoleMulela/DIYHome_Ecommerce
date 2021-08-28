<?php
require_once("dbconnect.php");


$un=$_POST['userEmail'];
$pwd=$_POST['userPass'];

$qry="SELECT * FROM users WHERE UserEmail='$un' ";


$result=mysqli_query($conn,$qry) or die(mysqli_error($conn));

while ($row=mysqli_fetch_array($result))
{
      if ($pwd==$row['UserPassword'])
      {
                  echo '<script> alert("Login Successful");</script>';
                  session_start();
                  $_SESSION['UserID']=$row['UserID'];
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
      else
      {
            echo '<script> alert("Incorrect UserName/User Type/Password");</script>';
            $url=("../login.php");
            header("location: $url");
      }
}

?>