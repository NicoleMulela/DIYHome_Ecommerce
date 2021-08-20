<?php require_once("processes/dbconnect.php"); ?>
<?php include_once 'includes/header.inc.php' ?>
<?php session_start(); ?>
<h2>Employee Details</h2>

<section>
      <?php
      //Fetch product table data
      $id=$_SESSION['UserID'];
        $sql = "SELECT * FROM product WHERE UserID= '$id'";
        $result = mysqli_query($conn, $sql);
        
      ?>
        <h1>Your Products</h1>
        <!-- Search Filter Input-->
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
        <!-- TABLE CONSTRUCTION-->
        <table>
            
            <!-- PHP CODE TO FETCH DATA FROM ROWS-->
            <?php   // LOOP TILL END OF DATA 
            if (mysqli_num_rows($result) > 0) {//show table only if there are any products
            ?>
            <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Description</th>
                <th>Manufacturer</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
            <?php    
                while($rows = mysqli_fetch_assoc($result))
                {
             ?>
             
            <tr>
                <!--FETCHING DATA FROM EACH ROW OF EVERY COLUMN-->
                <td><?php echo $rows['ProductID'];?></td>
                <td><?php echo $rows['ProductName'];?></td>
                <td><?php echo $rows['ProductID'];?></td>
                <td><?php echo $rows['ProductDescription'];?></td>
                <td><?php echo $rows['ProductManufacturer'];?></td>
                <td><?php echo $rows['ProductQuantity'];?></td>
                <td><?php echo $rows['ProductPrice'];?></td>
            </tr>
         </table>
         <?php
                }
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
</script>
<?php include_once 'includes/footer.inc.php' ?>