<?php require_once("processes/dbconnect.php"); ?>
<?php include_once 'includes/header.inc.php' ?>
<?php
    //OrderDetailsID
    $id = $_GET['id'];
    
    $sql = "SELECT * FROM order_details WHERE OrderDetailsID= '$id'";
    $result = mysqli_query($conn, $sql);
?>
<?php
//edit order status
if(isset($_POST['edit_status']))
{ 
    //User ID
    $id=$_SESSION['UserID'];
    
    $OrderStatus=$_POST["OrderStatus"];
    
    //update database
    if($OrderStatus=='delivered'){
        $sql = "UPDATE order_details SET OrderStatus='$OrderStatus', OrderPayment='paid' WHERE OrderDetailsID='$id'";

    }elseif($OrderStatus=='cancelled'){
        $sql = "UPDATE order_details SET OrderStatus='$OrderStatus', OrderPayment='not paid' WHERE OrderDetailsID='$id'";

    }
    
    if (mysqli_query($conn,$sql)==TRUE)
        {   
            //Successful profile edit message
            $_SESSION['message']="The Order has been ".$OrderStatus;
            $_SESSION['msg_type']="success";
            $url=("order.php");
            header("location: $url");
            
        }
        else{
            //Error Updating to DataBase
            $_SESSION['message']="Error Updating to DataBase";
            $_SESSION['msg_type']="danger";
            $url=("order.php");
            header("location: $url");
        }
      
}
?>
<section class="vh-100 pt-4 container">
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
        <div class=" col-8">
            <div class="card">
                <div class="card-header">
                    Order Details
                </div>
                <div class="card-body">
                    <?php   
                        $count=1; 
                        $rows = mysqli_fetch_array($result);
                        
                            //get product details
                            $productID=$rows['ProductID'];
                            $qry="SELECT * FROM product WHERE ProductID='$productID'";
                            $get_product = mysqli_query($conn, $qry);
                            $fetch_product= mysqli_fetch_assoc($get_product);

                    ?>
                    <div class="row">
                        <div class="col">
                            <img src="images/product_images/<?php echo $fetch_product['ProductImage']; ?>" width="250" height="auto">
                        </div>
                        <div class="col">
                            <span>Order ID:</span> <?php echo $rows['OrderDetailsID']; ?><br>
                            <span>Product:</span> <?php echo $fetch_product['ProductName']; ?> <br>
                            <span>Product ID:</span> <?php echo $rows['ProductID']; ?><br>
                            <span>Quantity:</span><?php echo $rows['OrderQuantity']; ?><br>
                            <span>Order Status:</span> <?php echo $rows['OrderStatus']; ?><br>
                            <!--<span>OrderDate:</span> -->
                        </div>
                    </div>
                     
                    
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    Shipping Address
                </div>
                <div class="card-body">
                    <?php
                        //get main OrderID
                        $OrderID=$rows['OrderID'];

                        //get ClientID from Orders table
                        $query="SELECT * FROM orders WHERE OrderID='$OrderID'";
                        $get_client = mysqli_query($conn, $query);
                        $fetch_client=mysqli_fetch_array($get_client);
                        $ClientID=$fetch_client['UserID'];

                        //get shipping details
                        $shipqry="SELECT * FROM shipping_details WHERE UserID='$ClientID'";
                        $get_ship = mysqli_query($conn, $shipqry);
                        $fetch_ship=mysqli_fetch_array($get_ship);
                    ?>
                    <span>Name: </span><?php echo $fetch_ship['FullName']; ?><br>
                    <span>Contact: </span><?php echo $fetch_ship['Contact']; ?><br>
                    <span>Address:</span><br><?php echo $fetch_ship['AddressDesc']; ?><br>
                    <span>City: </span><?php echo $fetch_ship['City']; ?><br>


                </div>
            </div>
            <form action="" method="post">
                <div class="col-6 pt-4">
                    <span>Change Order Status</span>
                    <select class="form-select" name="OrderStatus">
                        <?php
                        if($rows['OrderStatus']=='pending'){
                        ?>
                        <option disabled>Pending</option>
                        <option value="delivered">Delivered</option>
                        <option value="cancelled">Cancelled</option>
                        <?php
                            }elseif($rows['OrderStatus']=='delivered'){
                        ?>
                        <option disabled>Pending</option>
                        <option selected value="delivered">Delivered</option>
                        <option value="cancelled">Cancelled</option>
                        <?php
                            }elseif($rows['OrderStatus']=='cancelled'){
                        ?>
                        <option disabled>Pending</option>
                        <option value="delivered">Delivered</option>
                        <option selected value="cancelled">Cancelled</option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <button type="submit" name="edit_status" class="btn  btn-outline-primary m-4">Update</button>
                <a href="order.php" class="btn  btn-outline-secondary m-4"> <span class="text">Back</span></a>
            </form>
        </div>
        
    </div>
</section>

<?php include_once 'includes/footer.inc.php' ?>