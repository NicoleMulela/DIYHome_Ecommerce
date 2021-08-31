<?php include_once 'includes/header.inc.php' ?>
<div class="container">

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
                    <a class="nav-link" href="order.php">My Orders</a>
                </nav>
            </div>
            <div class="col-sm">
                <?php
                /*all orders
                        $sql = "SELECT * FROM order_details ";*/
                    //Fetch order table data for particular user
                    $id=$_SESSION['UserID'];
                    $sql= "SELECT * FROM orders WHERE UserID='$id'";
                    $result = mysqli_query($conn, $sql);
                ?>
                <div class="card mt-4">
                <h5 class="card-header">Your Orders</h5>
                <div class="card-body">
                    <table class="table table-hover table-sm">
                    <!-- PHP CODE TO FETCH DATA FROM ROWS-->
                    <?php   // LOOP TILL END OF DATA 
                            if (mysqli_num_rows($result) > 0) {//show table only if there are any products
                                
                    ?>
                    <thead>
                    
                        <tr>
                        <th scope="col">Order ID</th>
                        <th scope="col" colspan="2">Product</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Status</th>
                        <th scope="col">Payment</th>
                        <!--<th scope="col">Cancelled Date</th>
                        <th scope="col">Delivered Date</th>-->
                        </tr>
                    </thead>
                    <tbody>
                        <?php   
                            $count=1; 
                                while($rows = mysqli_fetch_assoc($result))
                                {
                                    //get order details
                                $OrderID=$rows['OrderID'];
                                $qry="SELECT * FROM order_details WHERE OrderID='$OrderID'";
                                $get_order = mysqli_query($conn, $qry);
                                $fetch_order= mysqli_fetch_assoc($get_order);

                                //get product details
                                $productID=$fetch_order['ProductID'];
                                $productqry="SELECT * FROM product WHERE ProductID='$productID'";
                                $get_product = mysqli_query($conn, $productqry);
                                $fetch_product= mysqli_fetch_assoc($get_product);

                        ?>
                        <tr>
                        <!--FETCHING DATA FROM EACH ROW OF EVERY COLUMN-->
                                    <td><?php echo $fetch_order['OrderDetailsID'];?></td>
                                    
                                    <td><a href='productdetails.php?id=<?=$productID?>' ><?php echo $fetch_product['ProductName'];?></a></td>
                                    <td><img src="../seller/images/product_images/<?php echo $fetch_product['ProductImage']; ?>" width="100" height="auto"></td>
                                    
                                    <td><?php echo $fetch_order['OrderQuantity'];?></td>
                                    <td><?php echo $fetch_order['OrderStatus'];?></td>
                                    <td><?php echo $fetch_order['OrderPayment'];?></td>
                                    
                        </tr>
                        <?php $count++;  ?>
                            
                            <?php
                                    }
                            ?>
                    </tbody>
                    </table>
                    <?php
                            } else {
                                echo "You don\'t have any orders yet";
                            }
                            mysqli_close($conn);
                    ?>
                </div>
                </div>
                </div>
            </div>
    
  </div>
</div>

<!--Main layout-->
<?php include_once 'includes/footer.inc.php' ?>