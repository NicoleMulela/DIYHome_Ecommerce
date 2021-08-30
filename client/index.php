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

<section class="vh-100 pt-4">
  
</section>
<?php include_once 'includes/footer.inc.php' ?>