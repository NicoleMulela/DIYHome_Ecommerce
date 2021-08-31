<?php require_once("processes/dbconnect.php"); ?>
<?php include_once 'includes/header.inc.php' ?>
<?php
    $id = $_GET['id'];
    $edit_product= mysqli_query($conn, "SELECT * from product WHERE PRODUCTID= '$id'");
    $fetch_product=mysqli_fetch_array($edit_product);
?>

<div class="container p-4 ">
  <form action="processes/editproductprocess.php" method='post' enctype="multipart/form-data">
    <H3>Edit Product</H3>
    <input type="hidden" name="ProductID" value="<?php echo $fetch_product['ProductID']?>">
    <div class="col-6">
      <label for="ProductName" class="form-label">Product Name</label>
      <input type="text" class="form-control" name="ProductName" value="<?php echo $fetch_product['ProductName']?>"id="ProductName" placeholder="Product Name...">
    </div>
    <div class="col-md-6">
      <label for="ProductCategory" class="form-label">Product Category</label>
      <select class="form-select" name='ProductCategory' id="ProductCategory">
      <option selected>Select a Category</option>
      <?php
      //get categories
      $get_cats="SELECT * from product_category";
      $run_cats= mysqli_query($conn, $get_cats);

      while($row_cats=mysqli_fetch_array($run_cats)){
        $cat_id= $row_cats['CategoryID'];
        $cat_title=$row_cats['CategoryName'];

        if($fetch_product['CategoryID']== $cat_id){
            $cat_id=$fetch_product[CategoryID];
            echo "<option value='$cat_id' selected>$cat_title</option>";
        }
        else{
            echo "<option value='$cat_id' >$cat_title</option>";
        }
        
      }
      ?>
    </select>
    </div>
    <!--Not yet functional. Transfer of the image into the database -->
    <div class="col-6">
      <label for="ProductImage" class="form-label">Product Image</label>
      <input type="file" class="form-control" name="ProductImage" id="ProductImage"onchange="loadFile(event)" >
      <?php if(!empty($fetch_product['ProductImage'])){
      ?>
        <p>current Image:
            <img src="images/product_images/<?php echo $fetch_product['ProductImage']; ?>" width="150" height="auto">
        </p>
      <?php
      }
      ?>      
        <p>New Image: 
            <img id="output" width="150" />
        </p>

      <script>
      var loadFile = function(event) {
          var image = document.getElementById('output');
          image.src = URL.createObjectURL(event.target.files[0]);
      };
      </script> 
    </div>
    
    <div class="col-6">
      <label for="ProductPrice" class="form-label">Unit Price</label>
      <input type="number" class="form-control" name="ProductPrice" value="<?php echo $fetch_product['ProductPrice']?>" id="ProductPrice" placeholder="0.00">
    </div>
    <div class="col-6">
      <label for="ProductQuantity" class="form-label">Product Quantity</label>
      <input type="number" class="form-control" name="ProductQuantity" value="<?php echo $fetch_product['ProductQuantity']?>" id="ProductQuantity" placeholder="0">
    </div>
    <div class="col-6">
      <label for="ProductManufacturer" class="form-label">Product Manufacturer</label>
      <input type="text" class="form-control" name="ProductManufacturer" id="ProductManufacturer" value="<?php echo $fetch_product['ProductManufacturer']?>" placeholder="Manufacturer">
    </div>
    <div class="col-6">
      <label for="ProductDescription" class="form-label">Product Description</label>
      <textarea type="text" class="form-control" name="ProductDescription" id="itemDescription" cols="20" rows="10"  placeholder="Product description..."><?php echo $fetch_product['ProductDescription']?></textarea>
    </div>
    
    <div class="col-6 m-4">
      <a class="btn btn-secondary " href="product.php" role="button">Cancel</a>
      <button type="submit" name="edit_product" class="btn btn-primary">Edit Item</button>
    </div>
  </form>
</div>
    <?php include_once 'includes/footer.inc.php' ?>