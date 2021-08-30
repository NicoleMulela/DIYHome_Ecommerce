<?php include_once 'includes/header.inc.php' ?>
<div class="container">
<?php
    $id=$_SESSION['UserID'];
    $sql = "SELECT * FROM users WHERE UserID= '$id'";
    $result = mysqli_query($conn, $sql);
?>
<?php   
    $count=1; 
        while($rows = mysqli_fetch_assoc($result))
        {
?>

<!--Main Navigation-->

<!--Main layout-->

  <div class="container pt-2">
    <!-- session messages--> 
    <?php
      //session messages
      if (isset($_SESSION['message'])):
    ?>

      <div class="alert alert-<?=$_SESSION['msg_type']?>">
        <?php
          echo $_SESSION['message'];
          unset($_SESSION['message']);
        ?>
      </div>
    <?php endif; ?>
        <div class="row">
            <div class="col-2">
                <nav class="nav flex-column">
                    <a class="nav-link active" href="profile.php">My Profile</a>
                    <a class="nav-link" href="#">My Orders</a>
                </nav>
            </div>
            <div class="col-sm">
                <div id="content" class="content p-0">
                    <div class="profile-header">
                    <div class="profile-header-cover"></div>
                    <div class="profile-header-content">
                        <div class="profile-header-img mb-4">
                        <!--Profile image show default image if new user hasn't updated their profile-->
                        <?php if(empty($rows['UserImage'])){
                            echo "<img src='https://bootdey.com/img/Content/avatar/avatar7.png' class='mb-4' alt='' />";
                        }else{
                            //echo "<img src='images/product_images/$rows['UserImage']>";
                        ?>
                            <img src="../images/profile/client/<?php echo $rows['UserImage']; ?>">
                        <?php
                            }
                        ?>
                        </div>

                        <div class="profile-header-info">
                            <h4 class="m-t-sm"><?php echo $rows['UserName']; ?></h4>
                            <p class="m-b-sm"><?php echo $rows['UserRole']; ?></p>
                            <a href="editprofile.php" class="btn btn-xs btn-primary mb-2">Edit Profile</a><br>
                            
                        </div>
                    </div>

                    
                </div>

                <div class="profile-container">
                    <div class="row row-space-20">
                        

                        <div class="col-md-8 hidden-xs hidden-sm">
                            <ul class="profile-info-list">
                                <li class="title">ACCOUNT INFORMATION</li>
                                <li>
                                    <div class="field">User ID:</div>
                                    <div class="value"><?php echo $rows['UserID']; ?></div>
                                </li>
                                <li>
                                    <div class="field">User Role:</div>
                                    <div class="value"><?php echo $rows['UserRole']; ?></div>
                                </li>
                                <li>
                                    <div class="field">User Name:</div>
                                    <div class="value"><?php echo $rows['UserName']; ?></div>
                                </li>
                                <li>
                                    <div class="field">User Email:</div>
                                    <div class="value"><?php echo $rows['UserEmail']; ?></div>
                                </li>
                                <li>
                                    <div class="field">Phone No.:</div>
                                    <div class="value"> 
                                    <?php if(empty($rows['UserPhone'])){
                                        echo "NOT FILLED IN";
                                    }else{
                                        echo $rows['UserPhone'];
                                    } ?>
                                </div>
                                </li>
                                <li>
                                    <!--add account creation date on login-->
                                    <div class="field">Account Creation Date</div>
                                    <div class="value">
                                    <?php $date=$rows['createdDate'];
                                            $date= strtotime($date);
                                            $date= date('M d Y',$date);
                                            echo $date;
                                    ?>
                                    </div>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
  </div>
</div>
<?php
//close while loop
        }
        mysqli_close($conn);
?>
<!--Main layout-->
<?php include_once 'includes/footer.inc.php' ?>