<?php require_once("../processes/dbconnect.php"); ?>
<?php include_once 'includes/header.inc.php' ?>

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

<?php
    $id=$_SESSION['UserID'];
    $sql= "SELECT * FROM shipping_details WHERE UserID='$id' ";
    $result = mysqli_query($conn, $sql);
?>

<section class="vh-100 pt-4 container">
    <div class="row">
        <div class=" col-8">
            <div class="card">
                <div class="card-header">
                    Shipping Address
                </div>
                <div class="card-body">
                    <?php
                      if (mysqli_num_rows($result)==0){
                    ?>
                    <a href="editdelivery.php" class="btn btn-outline-primary"><i class="fas fa-plus"></i> Add Address</a>
                    <?php 
                        }else{
                            while($rows = mysqli_fetch_assoc($result))
                                {
                    ?>
                    <p class="p-4">
                        <?php echo $rows['FullName'];?><br>
                        <?php echo $rows['Contact'];?><br>
                        <?php echo $rows['City'];?><br>
                        <?php echo $rows['AddressDesc'];?><br>
                        <a href="editdelivery.php?id=<?$rows['AddressID'];?>"class="link p-2"> <span class="text"><i class="far fa-edit"></i>Edit Address</span>  </a>
                    </p>
                    <?php 
                                }
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    Order Summary
                </div>
                <div class="card-body">
                    <?php 
                        $select_product= mysqli_query($conn, "SELECT * from product WHERE ProductID= '1'");
                        $fetch_product=mysqli_fetch_array($select_product);
                    
                    ?>
                    <div class="col-md-5 col-lg-3 col-xl-3">
                        <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                        <img class="img-fluid w-100"
                            src="../seller/images/product_images/<?php echo $fetch_product['ProductImage']?>" alt="Sample">
                        
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-9 col-xl-9">
                        <div>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5><?php echo $fetch_product['ProductName']?></h5>
                                    <p class="mb-3 text-muted text-uppercase small">Manufacture: <?php echo $fetch_product['ProductManufacturer']?></p>
                                    <p class="mb-2 text-muted text-uppercase small">Description: <?php echo $fetch_product['ProductDescription']?></p>
                                    <?php $VATTotal= number_format($fetch_product['ProductPrice']) *1.16?>
                                    <p class="mb-2 text-muted text-uppercase small">Total: Ksh<?php echo $VATTotal?></p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <?php
                        //Successful profile edit message
                        $_SESSION['message']="Your Order has been Recorded";
                        $_SESSION['msg_type']="success";
                    ?>
                    <a href="order.php" class="btn btn-primary btn-block col-6 mt-4">Place Order</a>
                    <a href="product.php" class="btn  btn-outline-secondary mt-2"> <span class="text">Continue Shopping</span></a>
                </div>
            </div>
        </div>
        
    </div>
</section>
<?php include_once 'includes/footer.inc.php' ?>