<?php require_once("processes/dbconnect.php"); ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!--style sheets-->
    <link rel="stylesheet" href="../styles/client/main.css">
    
</head>
<body>
<ul class="nav justify-content-end">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="index.php">My Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="order.php">Manage Orders</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="product.php">Manage Products</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="../processes/logout.php" tabindex="-1" aria-disabled="true">Log Out</a>
  </li>
</ul>
<hr></hr>