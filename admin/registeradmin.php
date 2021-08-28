<?php include_once 'includes/header.inc.php' ?>
<div class="container">
<?php
    $id=$_SESSION['UserID'];
?>

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
    <form action="../processes/adminprocesses.php" method='post' enctype="multipart/form-data">
                <H3>New Admin</H3>
                <!--Not yet functional. Transfer of the image into the database -->
                <div class="col-6">
                <label for="UserImage" class="form-label">Profile Picture</label>
                <input type="file" class="form-control" name="UserImage" id="UserImage" >
                </div>
                <input type="hidden" name="UserID">
                <div class="col-6">
                <label for="UserName" class="form-label">User Name</label>
                <input type="text" class="form-control" name="UserName" id="UserName" placeholder="User Name...">
                </div>
                <div class="col-6">
                <label for="UserEmail" class="form-label">Email</label>
                <input type="email" class="form-control" name="UserEmail" id="UserEmail" placeholder="example@gmail.com...">
                </div>
                <div class="col-6">
                <label for="UserPhone" class="form-label">Contact </label>
                <input type="text" class="form-control" name="UserPhone" id="UserPhone" placeholder="07.....">
                </div>
                <div class="col-6">
                <label for="UserPassword" class="form-label">Default Password</label>
                <input type="password" class="form-control disabled" name="UserPassword" id="UserPassword" placeholder="00000 *recommended default password">
                </div>
                
                    
                <div class="col-6 mt-4 ">
                <button type="submit" name="new_admin" class="btn btn-primary">Create Admin</button>
                </div>
                
            </form>
  </div>

</main>

<!--Main layout-->
<?php include_once 'includes/footer.inc.php' ?>