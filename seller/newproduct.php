<?php require_once("processes/dbconnect.php"); ?>
<?php include_once 'includes/header.inc.php' ?>
<?php session_start(); ?>

<div class="container">
  <form action="processes/newproductprocess.php" method='post'>
    <H3>Create New Product</H3>
    <div class="col-6">
      <label for="ProductName" class="form-label">Product Name</label>
      <input type="text" class="form-control" name="ProductName" id="ProductName" placeholder="Product Name...">
    </div>
    <div class="col-6">
      <label for="ProductDescription" class="form-label">Description</label>
      <input type="text" class="form-control" name="ProductDescription" id="itemDescription" cols="30" rows="10" placeholder="Product description...">
    </div>
    <div class="col-6">
      <label for="ProductManufacturer" class="form-label">Manufacturer</label>
      <input type="text" class="form-control" name="ProductManufacturer" id="ProductManufacturer" placeholder="Manufacturer">
    </div>
    <div class="col-6">
      <label for="ProductQuantity" class="form-label">Quantity</label>
      <input type="number" class="form-control" name="ProductQuantity" id="ProductQuantity" placeholder="0">
    </div>
    <div class="col-6">
      <label for="ProductPrice" class="form-label">Unit Price</label>
      <input type="number" class="form-control" name="ProductPrice" id="ProductPrice" placeholder="0.00">
    </div>
    <!--not yet functional -->
    <div class="col-md-6">
      <label for="ProductCategory" class="form-label">Category</label>
      <select class="form-select" id="ProductCategory">
      <option selected>Choose...</option>
      <option value="1">One</option>
      <option value="2">Two</option>
      <option value="3">Three</option>
    </select>
    </div>
    <div class="col-6">
      <button type="submit" name="add" class="btn btn-primary">Add Item</button>
    </div>
  </form>
</div>
    <?php include_once 'includes/footer.inc.php' ?>