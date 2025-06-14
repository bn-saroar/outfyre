<?php 
ob_start();
include 'includes/header.php'; 
require 'db.php';

if (!isset($_GET['id'])) {
    echo "No product ID specified.";
    exit;
}

$product_id = $_GET['id'];

// Fetch existing product data
$result = mysqli_query($dbcon, "SELECT * FROM products WHERE id = $product_id");
$product = mysqli_fetch_assoc($result);

if (!$product) {
    echo "Product not found.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['product_name'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $color = $_POST['color'];
    $size = $_POST['size'];

    // Handle image
    $image = $product['image']; // Default to old image
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        $folder = './upload/' . $image;
        move_uploaded_file($tmp, $folder);
    }

    $update = mysqli_query($dbcon, 
        "UPDATE products SET 
            name='$name', 
            category='$category', 
            color='$color', 
            size='$size', 
            price='$price', 
            description='$description', 
            image='$image' 
        WHERE id=$product_id");

    if ($update) {
        header("Location: productlist.php");
        exit;
    } else {
        echo "Update failed: " . mysqli_error($dbcon);
    }
}
?>

<div class="container my-5">
  <div class="card shadow-lg" style="margin-top: 7%;">
    <div class="card-header bg-warning text-white">
      <h3 class="mb-0">Edit Product</h3>
    </div>
    <div class="card-body">
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="row g-3">

          <div class="col-md-6">
            <label for="productName" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="productName" name="product_name" value="<?= htmlspecialchars($product['name']) ?>" required>
          </div>

          <div class="col-md-6">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" id="category" name="category" required>
              <option disabled>Choose...</option>
              <?php
                $categories = ['Men', 'Women', 'Kids', 'Accessories'];
                foreach ($categories as $cat) {
                    $selected = ($cat == $product['category']) ? 'selected' : '';
                    echo "<option $selected>$cat</option>";
                }
              ?>
            </select>
          </div>

          <div class="col-md-4">
            <label for="price" class="form-label">Price ($)</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" value="<?= $product['price'] ?>" required>
          </div>

          <div class="col-md-4">
            <label for="size" class="form-label">Size</label>
            <select class="form-select" id="size" name="size" required>
              <option disabled>Select size</option>
              <?php
                $sizes = ['XS', 'S', 'M', 'L', 'XL'];
                foreach ($sizes as $s) {
                    $selected = ($s == $product['size']) ? 'selected' : '';
                    echo "<option $selected>$s</option>";
                }
              ?>
            </select>
          </div>

          <div class="col-md-4">
            <label for="color" class="form-label">Color</label>
            <input type="text" class="form-control" id="color" name="color" value="<?= htmlspecialchars($product['color']) ?>" required>
          </div>

          <div class="col-12">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required><?= htmlspecialchars($product['description']) ?></textarea>
          </div>

          <div class="col-12">
            <label for="image" class="form-label">Upload Image (leave blank to keep current)</label>
            <input class="form-control" type="file" id="image" name="image">
            <p class="mt-2">Current Image: <img src="upload/<?= $product['image'] ?>" width="100"></p>
          </div>

          <div class="col-12 text-end">
            <button type="submit" class="btn btn-success">Update Product</button>
          </div>

        </div>
      </form>
    </div>
  </div>
</div>

<?php include 'includes/footer.php'; ?>
