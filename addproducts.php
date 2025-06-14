<?php ob_start();
include 'includes/header.php'; 
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['product_name'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $color = $_POST['color'];
    $sizes = $_POST['size'];
    $size = implode(',', $sizes);
    $image = $_FILES['image']['name'];

    $addproduct = mysqli_query($dbcon, "INSERT INTO `products` (`name`, `category`, `color`, `size`, `price`, `description`, `image`) 
    VALUES ('$name', '$category', '$color', '$size', '$price', '$description', '$image')");
}

$psubmit = mysqli_query($dbcon, "SELECT * FROM `products` WHERE 1");

if($_SERVER['REQUEST_METHOD']== 'POST'){

    $myfile = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    
    $myfolder = './upload/';
    $folder = $myfolder.$myfile;
    
    move_uploaded_file($tmp,$folder);
    
    header("location:" . $_SERVER['PHP_SELF']);
    }


?>
<div class="container my-5">
  <div class="card shadow-lg" style="margin-top: 7%;">
    <div class="card-header bg-dark text-white">
      <h3 class="mb-0">Add New Product</h3>
    </div>
    <div class="card-body">
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="row g-3">

          <div class="col-md-6">
            <label for="productName" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="productName" name="product_name" required>
          </div>

          <div class="col-md-6">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" id="category" name="category" required>
              <option selected disabled>Choose...</option>
              <option>Men</option>
              <option>Women</option>
              <option>Kids</option>
              <option>Accessories</option>
            </select>
          </div>

          <div class="col-md-4">
            <label for="price" class="form-label">Price ($)</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" required>
          </div>

          <div class="col-md-4">
            <label for="size" class="form-label">Size</label>
            <select class="form-select" id="size" name="size[]" multiple required>
              <option value="XS">XS</option>
              <option value="S">S</option>
              <option value="M">M</option>
              <option value="L">L</option>
              <option value="XL">XL</option>
            </select>
            <small class="text-muted">Hold Ctrl (Cmd on Mac) to select multiple sizes</small>
          </div>


          <div class="col-md-4">
            <label for="color" class="form-label">Color</label>
            <input type="text" class="form-control" id="color" name="color" required>
          </div>

          <div class="col-12">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
          </div>

          <div class="col-12">
            <label for="image" class="form-label">Upload Image</label>
            <input class="form-control" type="file" id="image" name="image" required>
          </div>

          <div class="col-12 text-end">
            <button type="submit" class="btn btn-primary">Add Product</button>
          </div>

        </div>
      </form>
    </div>
  </div>
</div>
<?php include 'includes/footer.php'; ?>