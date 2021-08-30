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
                    
                </div>
            </div>
        </div>
        
    </div>
</section>
<?php include_once 'includes/footer.inc.php' ?>