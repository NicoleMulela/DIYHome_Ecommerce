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
            <?php
                if (mysqli_num_rows($result)==0){
            ?>
            <form action="../processes/newshipping.php" method='post' enctype="multipart/form-data">
                <input type="hidden" name="UserID" value="<?php echo $id ?>">
                <div class="col-8">
                <label for="FullName" class="form-label">Full Name*</label>
                <input type="text" class="form-control" name="FullName" placeholder="Jane Doe">
                </div>
                <div class="col-8">
                <label for="phone" class="form-label">Phone Number* </label>
                <input type="text" class="form-control" name="phone" id="UserPhone" placeholder="07.....">
                </div>
                <div class="col-8">
                <label for="address" class="form-label">Delivery Address*</label>
                <textarea type="text" class="form-control" name="address" id="itemDescription" cols="20" rows="5" placeholder="Street name/ Building/ Appartment number/Floor..."></textarea>
                </div>
                <div class="col-8">
                <label for="city" class="form-label">City*</label>
                <input type="tet" class="form-control" name="city" placeholder="Old Town Mombasa">
                </div>
                <div class="col-6 mt-4 ">
                    <a href="delivery.php" class="btn  btn-outline-secondary"> <span class="text">Back</span></a>
                    <button type="submit" name="new_address" class="btn btn-primary">Save</button>
                </div>
                    
            </form>
            <?php 
                }else{
                    while($rows = mysqli_fetch_assoc($result))
                                {
            ?>
            <form action="../processes/editshipping.php" method='post' enctype="multipart/form-data">
                <input type="hidden" name="AID" value="<?php echo $rows['ShippingID'] ?>">
                <div class="col-8">
                <label for="FullName" class="form-label">Full Name*</label>
                <input type="text" class="form-control" name="Fullname" value="<?php echo $rows['FullName']?>" placeholder="Jane Doe">
                </div>
                <div class="col-8">
                <label for="phone" class="form-label">Phone Number* </label>
                <input type="text" class="form-control" name="Phone" id="UserPhone" value="<?php echo $rows['Contact']?>" placeholder="07.....">
                </div>
                <div class="col-8">
                <label for="address" class="form-label">Delivery Address*</label>
                <textarea type="text" class="form-control" name="Address" id="itemDescription" cols="20" rows="5" placeholder="Street name/ Building/ Appartment number/Floor..."> <?php echo $rows['AddressDesc']?> </textarea>
                </div>
                <div class="col-8">
                <label for="city" class="form-label">City*</label>
                <input type="tet" class="form-control" name="City" value="<?php echo $rows['City']?>" placeholder="Old Town Mombasa">
                </div>
                <div class="col-6 mt-4 ">
                    <a href="delivery.php" class="btn  btn-outline-secondary"> <span class="text">Back</span></a>
                    <button type="submit" name="edit_address" class="btn btn-primary">Save</button>
                </div>
                    
            </form>
            <?php
                                } 
                }
            ?>
        </div>
        
        
    </div>
</section>
<?php include_once 'includes/footer.inc.php' ?>