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

<section class="vh-100 pt-4 container">
    <!--Section: Block Content-->
<section>

<!--Grid row-->
<div class="row">

  <!--Grid column-->
  <div class="col-lg-8">

    <!-- Card -->
    <div class="mb-3">
        <div class="pt-4 wish-list">

            <h5 class="mb-4">Cart (<span>1</span> items)</h5>

            <div class="row mb-4">
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
                            </div>
                            <div>
                                <div class="mb-3" >
                                    <select class="form-select" style="width: 100px;" name='ProductQuantity' id="ProductQuantity">
                                        <?php
                                        //get quantity
                                        $quantity=$fetch_product['ProductQuantity'];
                                        $countquantity= 1;
                                        do{
                                            echo "<option value='$countquantity' >$countquantity</option>";
                                            $quantity--;
                                            $countquantity++;
                                        }while($quantity !=0 );
                                        ?>
                                    </select>
                                </div>
                                <small id="passwordHelpBlock" class="form-text text-muted text-center">
                                Select Quantity
                                </small>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <a href="#!" type="button" class="card-link-secondary small text-uppercase mr-3"><i
                                    class="fas fa-trash-alt mr-1"></i> Remove item </a>
                            </div>
                            <p class="mb-0"><span><strong id="summary">Ksh <?php echo $fetch_product['ProductPrice']?></strong></span></p class="mb-0">
                        </div>
                    </div>
                </div>
            </div>
            <hr class="mb-4">
        

        </div>
    </div>
    <!-- Card -->

    

    
  </div>
  <!--Grid column-->

  <!--Grid column-->
  <div class="col-sm card mt-4">
    <h5 class="card-header">Total</h5>
    <div class="card-body" >
        <!-- Card -->
        <div class="mb-3">
        <div class="pt-4">

        
            <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                Subtotal
                <span>Ksh <?php echo $fetch_product['ProductImage']?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                Shipping
                <span>Gratis</span>
            </li>
            <hr class="mb-4">
            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                <div>
                <strong>Total</strong>
                <strong>
                    <p class="mb-0">(including VAT)</p>
                </strong>
                </div>
                <?php $VATTotal= number_format($fetch_product['ProductPrice']) *1.16?>
                <span><strong>Ksh <?php echo $VATTotal?></strong></span>
            </li>
            <p class="text-primary mb-0"><i class="fas fa-info-circle mr-1"></i> Delivery within 5-7 work days</p>
            <p class="text-primary mb-0"><i class="fas fa-info-circle mr-1"></i> Pay On Delivery</p>
            </ul>

            <a href="delivery.php" class="btn btn-primary btn-block col-6 mt-4">Checkout</a>
            <a href="product.php" class="btn  btn-outline-secondary mt-2"> <span class="text">Continue Shopping</span></a>

        </div>
        </div>
    </div>
    <!-- Card -->

    

  </div>
  <!--Grid column-->

</div>
<!-- Grid row -->

</section>
<!--Section: Block Content-->
</section>
<?php include_once 'includes/footer.inc.php' ?>