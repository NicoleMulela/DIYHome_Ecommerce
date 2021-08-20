<?php require_once("processes/dbconnect.php"); ?>
<?php include_once 'includes/header.inc.php' ?>
<?php session_start(); ?>
<p>Login Page</p>

<div class="content" "row" align="center">
        <div class="column left" align="center" >
          <p class="pagetitle">Login</p>
          <form class="" action="processes/loginprocess.php" method="post">
            <input type="text" class="formInput" name="userEmail" placeholder="example@gmail.com" required><br>
            <input type="password" class="formInput" name="userPass" placeholder="password" required><br>
            <p class="index">Don't have an account? Click <a class="link" href="registration.php"  >here</a></p>
          
            <button class="submit" type="submit" name="login"> Login</button>
          </form>

        </div>

    </div>
<?php include_once 'includes/footer.inc.php' ?>