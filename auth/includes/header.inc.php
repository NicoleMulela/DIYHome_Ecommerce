<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auth Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
</head>
<body>

<nav class="navbar navbar-default ">
  <div class="container-fluid">
   
    <img src="../images/diyhome_logo.png" width="70" height="auto" alt="">
  
    <ul class="nav justify-content-end">
  <li class="nav-item px-2">
    <a class=" btn btn-primary"  href="../auth/sellerregistration.php" >Become a Seller</a>
  </li>
  <li class="nav-item px-2">
    <a class="btn btn-primary"  href="../auth/buyerregistration.php" >Become a Buyer</a>
  </li>
  <li class="nav-item px-2">
    <a class="nav-link active " href="../auth/login.php" >Log In</a>
  </li>
</ul>
  </div>
</nav>
<hr class="px-0 m-0 p-0"> 