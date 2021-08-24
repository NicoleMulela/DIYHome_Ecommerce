<?php require_once("processes/dbconnect.php"); ?>
<?php include_once 'includes/header.inc.php' ?>
<?php session_start(); ?>


<section>
      <?php
      //Fetch product table data
      $id=$_SESSION['UserID'];
        $sql = "SELECT * FROM product WHERE UserID= '$id'";
        $result = mysqli_query($conn, $sql);
      ?>
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
        <h1>Your Products</h1>
        <!-- Link to add new products-->
        <div>
            <a href="newproduct.php">Create New Product</a>

        </div>
        <!-- Search Filter Input-->
        
        
        <!-- TABLE CONSTRUCTION-->
        <div class="container">
        <table class="table table-striped table-responsive-sm	"> 
          <!-- Search bar-->
          <div class="input-group">
            <div class="form-outline">
              <input id="search-input" type="search" id="form1" class="form-control " placeholder="Search..." />
              <label class="form-label" for="form1">Search</label>
            </div>
          </div>
            <!-- PHP CODE TO FETCH DATA FROM ROWS-->
            <?php   // LOOP TILL END OF DATA 
            if (mysqli_num_rows($result) > 0) {//show table only if there are any products
            ?>
            <thead>
                <tr>
                    <th>Item Number</th>
                    <th>Product ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Manufacturer</th>
                    <th>Image</th>
                    <th>Quantity</th>
                    <th>Price</th>
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
                    <td><?php echo $rows['ProductID'];?></td>
                    <td><?php echo $rows['ProductName'];?></td>
                    <td><?php echo $rows['ProductID'];?></td>
                    <td><?php echo $rows['ProductDescription'];?></td>
                    <td><?php echo $rows['ProductManufacturer'];?></td>
                    <td><img src="images/product_images/<?php echo $rows['ProductImage']; ?>" width="100" height="70"></td>
                    <td><?php echo $rows['ProductQuantity'];?></td>
                    <td><?php echo $rows['ProductPrice'];?></td>
                    <?php
                    echo "
                    <td>
                        <a href='editproduct.php?id=$rows[ProductID]'>Edit</a>
                    </td>
                    ";
                    ?>
                    <?php
                    echo "
                    <td>
                        <a href='processes/deleteproduct.php?id=$rows[ProductID]'>Delete</a>
                    </td>
                    ";
                    ?>
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
                echo "You don\'t have any products yet";
              }
                mysqli_close($conn); //close connection
             ?>
    </section>
<!-- Search Filter javaScript-->
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