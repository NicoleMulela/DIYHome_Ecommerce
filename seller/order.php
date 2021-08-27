<?php require_once("processes/dbconnect.php"); ?>
<?php include_once 'includes/header.inc.php' ?>
<div class="container">
<?php session_start(); ?>
<section>
<?php
  /*all orders
        $sql = "SELECT * FROM order_details ";*/
      //Fetch order table data for particular user
    $id=$_SESSION['UserID'];
    $sql= "SELECT * FROM order_details INNER JOIN product ON order_details.ProductID = product.ProductID WHERE UserID='$id' ";
    $result = mysqli_query($conn, $sql);
  ?>
<h1>Recieved Orders</h1>
  <table class="table table-hover table-sm">
    <!-- PHP CODE TO FETCH DATA FROM ROWS-->
    <?php   // LOOP TILL END OF DATA 
            if (mysqli_num_rows($result) > 0) {//show table only if there are any products
            ?>
    <thead>
    
      <tr>
        <th scope="col">Order Number</th>
        <th scope="col">Order ID</th>
        <th scope="col">Product ID</th>
        <th scope="col">Quantity</th>
        <th scope="col">Status</th>
        <th scope="col">Payment</th>
        <th scope="col" colspan="2" >Actions</th><!-- change status-->
        <!--<th scope="col">Cancelled Date</th>
        <th scope="col">Delivered Date</th>
-->
      </tr>
    </thead>
    <tbody>
    <?php   
            $count=1; 
                while($rows = mysqli_fetch_assoc($result))
                {
             ?>
      <tr>
         <!--FETCHING DATA FROM EACH ROW OF EVERY COLUMN-->
         <td><?php echo $count; ?></td>
                    <td><?php echo $rows['OrderDetailsID'];?></td>
                    <td><?php echo $rows['ProductID'];?></td>
                    <td><?php echo $rows['OrderQuantity'];?></td>
                    <td><?php echo $rows['OrderStatus'];?></td>
                    <td><?php echo $rows['OrderPayment'];?></td>
                    <?php
                    echo "
                    <td>
                        <a href='orderdetails.php?id=$rows[OrderDetailsID]'>Details</a>
                    </td>
                    ";
                    ?>
                    <td><select class="form-select" aria-label="Default select example">
                      <option selected disabled>Status</option>
                      <option value="1">Delivered</option>
                      <option value="2">Cancelled</option>
                    </select>
                </td>
      </tr>
      <?php $count++;  ?>
            
            <?php
                    }
            ?>
    </tbody>
  </table>
</div>
<?php
              } else {
                echo "You don\'t have any orders yet";
              }
                mysqli_close($conn); //close connection
             ?>
</section>
<script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
//sessions time out
setTimeout(function() {
        let alert = document.querySelector(".alert");
            alert.remove();
    }, 3000);
</script>
<?php include_once 'includes/footer.inc.php' ?>