<?php
require_once("processes/dbconnect.php"); 
if(isset($_POST['search']))

{

  $valueToSearch = $_POST['valueToSearch'];

   // search data in all table columns

  $query = "SELECT * FROM `users`

WHERE CONCAT(`id`, `fname`, `lname`, `age`) LIKE

'%".$valueToSearch."%'";

  $search_result = filterTable($query);
}

 else {

  $query = "SELECT * FROM `users`";

  $search_result = filterTable($query);

}
?>
// function to connect with Mysql database and execute







<!DOCTYPE html>

<html>

  <head>

    <title> HTML Table to search data</title>

    <style> // this will apply a border to table and table cells 

      table,tr,th,td

      {

        border: 1px solid black;

      }

    </style>

  </head>

  <body>
<form

action="testproductfilter.php" method="post">

      <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>

      <input type="submit" name="search" value="Filter"><br><br>

       

      <table>

        <tr>

          <th>Id</th>

          <th>First Name</th>

          <th>Last Name</th>

          <th>Age</th>

        </tr>

// fetch the data from the MySQL database by using the mysqli_fetch_array() function



<?php while($row = mysqli_fetch_array($search_result)):?>

<tr>

    <td><?php echo $row['ProductID'];?></td>

    <td><?php echo $row['ProductName'];?></td>

</tr>

<?php endwhile;?>

</table>

</form>

 </body>

</html>