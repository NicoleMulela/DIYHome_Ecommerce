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
    $id = $_GET['id'];
    $select_product= mysqli_query($conn, "SELECT * from product WHERE PRODUCTID= '$id'");
    $fetch_product=mysqli_fetch_array($select_product);
?>

<section class="vh-100 pt-4 container">
<div class="card">
	<div class="row no-gutters">
		<aside class="col-md-6">
            <article class="gallery-wrap">
            <div class="img-big-wrap">
            <div><img src="../images/product_images/<?php echo $fetch_product['ProductImage']?>"></div>
            </div> <!-- slider-product.// -->
            </article> <!-- gallery-wrap .end// -->
		</aside>
		<main class="col-md-6 border-left">
            <article class="content-body p-4">

                <h2 class="title"><?php echo $fetch_product['ProductName']?></h2>

                <div class="mb-3">
                    <var class="price h4">Ksh <?php echo $fetch_product['ProductManufacturer']?></var>
                </div> <!-- manufacturer-detail-wrap .// -->
                <div class="mb-3">
                    <var class="price h4">Ksh <?php echo $fetch_product['ProductPrice']?></var>
                </div> <!-- price-detail-wrap .// -->
                
                <p><?php echo $fetch_product['ProductDescription']?></p>

                    <a href="#" class="btn  btn-outline-primary"> <span class="text">Add to cart</span> <i class="fas fa-shopping-cart"></i>  </a>
                    <a href="product.php" class="btn  btn-outline-secondary"> <span class="text">Back</span></a>
            </article> <!-- product-info-aside .// -->
		</main> <!-- col.// -->
	</div> <!-- row.// -->
</div> <!-- card.// -->
</section>
<?php include_once 'includes/footer.inc.php' ?>