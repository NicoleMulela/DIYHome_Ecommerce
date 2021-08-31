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
  <div class="container-fluid h-custom pt-4">
    <h3 class="mx-auto" style="width: 200px;">Login Page</h3>
    <div class="row d-flex justify-content-center align-items-center h-100 pt-4">
      
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-login-form/draw2.png" class="img-fluid"
          alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form action="../processes/loginprocess.php" method="post">
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" id="form3Example3" class="form-control form-control-lg"
            name="userEmail" placeholder="Enter a valid email address" required/>
            <label class="form-label" for="form3Example3">Email address</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" id="form3Example4" class="form-control form-control-lg"
            name="userPass" placeholder="Enter password" />
            <label class="form-label" for="form3Example4">Password</label>
          </div>

          <!-- <div class="d-flex justify-content-between align-items-center">
            Checkbox 
            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
              <label class="form-check-label" for="form2Example3">
                Remember me
              </label>
            </div>
           <a href="#!" class="text-body">Forgot password?</a>
          </div>-->

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg" name="login"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? </p>
            <a href="sellerregistration.php" class="link-info px-2">Register as seller</a>
            <a href="buyerregistration.php" class="link-info p-2">Register as buyer</a>
          </div>

        </form>
      </div>
    </div>
  </div>
</section>
<?php include_once 'includes/footer.inc.php' ?>