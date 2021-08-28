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
    //Fetch orders table 
    $id=$_SESSION['UserID'];
    $sql= "SELECT * FROM order_details INNER JOIN product ON order_details.ProductID = product.ProductID ";
    $result = mysqli_query($conn, $sql);
  ?>
  <h1>Manage Sellers</h1>
  <table class="table table-hover table-sm">
    <!-- PHP CODE TO FETCH DATA FROM ROWS-->

    <?php   // LOOP TILL END OF DATA 
            if (mysqli_num_rows($result) > 0) {//show table only if there are any sellers
            ?>
    <thead>
    
      <tr>
        
        <th scope="col">Order Detail ID</th>
        <th scope="col">Product Name</th>
        <th scope="col">Image</th>
        <th scope="col">Quantity</th>
        <th scope="col">Status</th>
        <th scope="col">Payment</th>
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
         
                    <td><?php echo $rows['OrderDetailsID'];?></td>
                    <td><?php echo $rows['ProductName'];?></td>
                    <td><img src="../seller/images/product_images/<?php echo $rows['UserImage']; ?>" width="auto" height="100"></td>
                    <td><?php echo $rows['OrderQuantity'];?></td>
                    <td><?php echo $rows['OrderStatus'];?></td>
                    <td><?php echo $rows['OrderPayment'];?></td>
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