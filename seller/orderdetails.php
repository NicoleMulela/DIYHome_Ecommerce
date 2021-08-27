<?php require_once("processes/dbconnect.php"); ?>
<?php include_once 'includes/header.inc.php' ?>
<?php
    $id = $_GET['id'];
    
    $sql = "SELECT * FROM order_details WHERE OrderDetailsID= '$id'";
    $result = mysqli_query($conn, $sql);
?>
<?php session_start(); ?>

<div class="container">
    <h1>Order Details</h1>
<div class="row">
  <div class="col-md-6">

  <?php   
    $count=1; 
        while($rows = mysqli_fetch_assoc($result))
        {
        ?>
            <h2>Order Item</h2>
            <span>OrderDetailsID:</span> <?php echo $rows['OrderDetailsID']; ?><br>
            <span>Product ID:</span> <?php echo $rows['ProductID']; ?><br>
            <span>Product Name:</span> <br>
            <span>Quantity:</span><br>
            <span>Order Status:</span><br>
            <span>OrderDate:</span>

        <?php
        }
        ?>
  </div>
  <div class="col-md-6">
      <h2>Shipping Details </h2>
      <span>Name:</span><br>
      <span>Contact:</span><br>
      <span>Email:</span><br>
      <span>Shipping Address:</span><br>
      <hr>

  </div>
</div>
</div>
    <?php include_once 'includes/footer.inc.php' ?>