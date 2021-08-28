<?php include_once 'includes/header.inc.php' ?>
<div class="container">

<!--Main Navigation-->

<!--Main layout-->
<main style="margin-top: 25px;">
  <div class="container pt-4">
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
    <<?php
    //Fetch users table where role is client
    $id=$_SESSION['UserID'];
    $sql= "SELECT * FROM users WHERE UserRole='client' ";
    $result = mysqli_query($conn, $sql);
  ?>
  <h1>Manage Clients</h1>
  <table class="table table-hover table-sm">
    <!-- PHP CODE TO FETCH DATA FROM ROWS-->

    <?php   // LOOP TILL END OF DATA 
            if (mysqli_num_rows($result) > 0) {//show table only if there are any sellers
            ?>
    <thead>
    
      <tr>
        
        <th scope="col">User ID</th>
        <th scope="col">User Name</th>
        <th scope="col">Email</th>
        <th scope="col">contact</th>
        <th scope="col">Images</th>
        <th scope="col">Created Date</th>
        <th scope="col" colspan="2" >Actions</th><!-- change status-->
        <!--<th scope="col">Cancelled Date</th>
        <th scope="col">Delivered Date</th>
-->
      </tr>
    </thead>
    <tbody>
    <?php   
            $count=1; 
                while($rows = mysqli_fetch_assoc($result))
                {
             ?>
      <tr>
         <!--FETCHING DATA FROM EACH ROW OF EVERY COLUMN-->
         
                    <td><?php echo $rows['UserID'];?></td>
                    <td><?php echo $rows['UserName'];?></td>
                    <td><?php echo $rows['UserEmail'];?></td>
                    <td><?php echo $rows['UserPhone'];?></td>
                    <td><img src="../images/profile/admin/<?php echo $rows['UserImage']; ?>" width="auto" height="100"></td>
                    <td><?php echo $rows['createdDate'];?></td>
                    <?php
                    echo "
                    <td>
                        <a href='orderdetails.php?id=$rows[UserID]'>Details</a>
                    </td>
                    ";
                    ?>
                    
      </tr>
      <?php $count++;  ?>
            
            <?php
                    }
            ?>
    </tbody>
  </table>
</div>
<?php
              } else {
                echo "You don\'t have any orders yet";
              }
                mysqli_close($conn); //close connection
             ?>

</main>

<!--Main layout-->
<?php include_once 'includes/footer.inc.php' ?>