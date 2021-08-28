<?php include_once 'includes/header.inc.php' ?>
<?php
    //$id = $_GET['id'];
    //$edit_product= mysqli_query($conn, "SELECT * from product WHERE PRODUCTID= '$id'");
    //$fetch_product=mysqli_fetch_array($edit_product);
    $id=$_SESSION['UserID'];
    $sql = "SELECT * FROM users WHERE UserID= '$id'";
    $result = mysqli_query($conn, $sql);
    $rows=mysqli_fetch_array($result);
?>

<main style="margin-top: 25px;">
  <div class="container pt-4">
  <div class="profile-container">
    <div class="row row-space-20">
        <div class="col-md-8 hidden-xs hidden-sm">
            <form action="../processes/adminprocesses.php" method='post' enctype="multipart/form-data">
                <H3>Edit Profile</H3>
                <!--Not yet functional. Transfer of the image into the database -->
                <div class="col-6">
                <label for="ProductImage" class="form-label">Profile Picture</label>
                <input type="file" class="form-control" name="UserImage" id="UserImage" >
                <img src="../images/product_images/<?php echo $rows['UserImage']; ?>" width="200" height="auto">
                </div>

                <input type="hidden" name="ProductID" value="<?php echo $rows['ProductID']?>">
                <div class="col-6">
                <label for="UserName" class="form-label">User Name</label>
                <input type="text" class="form-control" name="UserName" value="<?php echo $rows['UserName']?>"id="ProductName" placeholder="User Name...">
                </div>
                <div class="col-6">
                <label for="UserEmail" class="form-label">Email</label>
                <input type="email" class="form-control" name="UserEmail" value="<?php echo $rows['UserEmail']?>"id="UserEmail" placeholder="example@gmail.com...">
                </div>
                <div class="col-6">
                <label for="UserPhone" class="form-label">Contact </label>
                <input type="text" class="form-control" name="UserPhone" value="<?php echo $rows['UserPhone']?>"id="UserPhone" placeholder="07.....">
                </div>
                
                    
                <div class="col-6 mt-4 ">
                <a class="btn btn-secondary " href="index.php" role="button">Cancel</a>
                <button type="submit" name="edit_profile" class="btn btn-primary">Edit Profile</button>
                </div>
                
            </form>
        </div>
    </div>  
  </div>
</main>
    <?php include_once 'includes/footer.inc.php' ?>