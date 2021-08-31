<?php require_once("processes/dbconnect.php"); ?>
<?php include_once 'includes/header.inc.php' ?>


<div class="container">
  <form action="processes/newproductprocess.php" method='post' enctype="multipart/form-data">
    <H3>Create New Product</H3>
    <div class="col-6">
      <label for="ProductName" class="form-label">Product Name</label>
      <input type="text" class="form-control" name="ProductName" id="ProductName" placeholder="Product Name...">
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
        echo "<option value='$cat_id' >$cat_title</option>";
      }
      ?>
    </select>
    </div>
    <!--Not yet functional. Transfer of the image into the database -->
    <div class="col-6">
      <label for="ProductImage" class="form-label">Product Image</label>
      <input type="file" class="form-control" name="ProductImage" id="ProductImage" >
    </div>
    
    <div class="col-6">
      <label for="ProductPrice" class="form-label">Unit Price</label>
      <input type="number" class="form-control" name="ProductPrice" id="ProductPrice" placeholder="0.00">
    </div>
    <div class="col-6">
      <label for="ProductQuantity" class="form-label">Product Quantity</label>
      <input type="number" class="form-control" name="ProductQuantity" id="ProductQuantity" placeholder="0">
    </div>
    <div class="col-6">
      <label for="ProductManufacturer" class="form-label">Product Manufacturer</label>
      <input type="text" class="form-control" name="ProductManufacturer" id="ProductManufacturer" placeholder="Manufacturer">
    </div>
    <div class="col-6">
      <label for="ProductDescription" class="form-label">Product Description</label>
      <textarea type="text" class="form-control" name="ProductDescription" id="itemDescription" cols="20" rows="10" placeholder="Product description..."></textarea>
    </div>
    
    <div class="col-6 m-4">
      <a class="btn btn-secondary " href="product.php" role="button">Cancel</a>
      <button type="submit" name="add_product" class="btn btn-primary">Add Item</button>
    </div>
  </form>
</div>
    <?php include_once 'includes/footer.inc.php' ?>