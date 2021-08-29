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
<div class="row">
        <?php
        $sql = "SELECT * FROM product";
        $result = mysqli_query($conn, $sql);
        ?>
        <?php   
            $count=1; 
                while($rows = mysqli_fetch_assoc($result))
                {
        ?>

            <div class="col-md-3 col-sm-6">
                <figure class="card card-product-grid">
                    <div class="img-wrap"> <img src="../images/product_images/<?php echo $rows['ProductImage']; ?>" width="250" height="auto"></div>
                    <figcaption class="info-wrap border-top m-3">
                        <p><?php echo $rows['ProductName']; ?></p>
                        <div class="price mt-2">Ksh <?php echo $rows['ProductPrice']; ?> </div> <!-- price-wrap.// -->
                        <?php
                        echo "
                            <a href='productdetails.php?id=$rows[ProductID]' class='btn btn-primary  m-3'> View Product</i></a>
                        ";
                        ?>
                    </figcaption>
                </figure> <!-- card // -->
            </div> <!-- col.// -->

            
            
            <?php
            //close while loop
                    }
                    mysqli_close($conn);
            ?>


</div><!-- row.// -->
</section>
<?php include_once 'includes/footer.inc.php' ?>