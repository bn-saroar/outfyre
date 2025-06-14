<?php 
include 'includes/header.php';
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($dbcon, $_POST['name']);
    $category = mysqli_real_escape_string($dbcon, $_POST['category']);
    $price = floatval($_POST['price']);
    $is_new = isset($_POST['is_new']) ? 1 : 0;
    $rating = floatval($_POST['rating']);
    $total_reviews = intval($_POST['total_reviews']);

    $image_path = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $target_dir = "uploads/";
        if (!is_dir($target_dir)) mkdir($target_dir, 0777, true);
        $filename = basename($_FILES["image"]["name"]);
        $target_file = $target_dir . time() . "_" . $filename;
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image_path = $target_file;
        } else {
            echo "<p>Error uploading image.</p>";
        }
    }

    $query = "INSERT INTO newproducts (name, category, price, image_url, is_new, rating, total_reviews) 
              VALUES ('$name', '$category', $price, '$image_path', $is_new, $rating, $total_reviews)";
    
    if (mysqli_query($dbcon, $query)) {
        echo "<div class='alert alert-success text-center'>✅ Product added successfully!</div>";
    } else {
        echo "<div class='alert alert-danger text-center'>❌ Error: " . mysqli_error($dbcon) . "</div>";
    }
}
?>


  <style>
  body {
    background: linear-gradient(to right, #ffe8ec, #e0f7fa);
    font-family: 'Segoe UI', sans-serif;
    min-height: 100vh;
    padding-top: 120px;
  }

  .form-container {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(6px);
    padding: 30px;
    border-radius: 20px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    width: 100%;
  }

  .btn-submit {
    background: linear-gradient(to right, #ff6a6a, #fbc02d);
    color: white;
    font-weight: bold;
    padding: 10px 25px;
    border: none;
    border-radius: 30px;
    transition: 0.3s ease-in-out;
  }

  .btn-submit:hover {
    background: linear-gradient(to right, #ff5252, #fdd835);
    box-shadow: 0 5px 15px rgba(255, 106, 106, 0.4);
  }
</style>

<main class="px-6 md:px-16 lg:px-28">
  <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-start">

    <!-- Left Side Welcome Message -->
    <aside class="bg-gradient-to-br from-pink-100 to-yellow-100 p-6 rounded-2xl shadow-md">
      <h2 class="text-2xl font-semibold text-pink-700 mb-3">Welcome to Outfyre!</h2>
      <p class="text-sm text-gray-700">Add the hottest products and manage your catalog directly from here.</p>
      <div class="mt-4">
        <a href="productlist.php" class="inline-block mt-3 px-4 py-2 bg-pink-600 text-white rounded-full hover:bg-pink-700 transition">
          View Products →
        </a>
      </div>
    </aside>

    <!-- Right Side Form Section -->
    <section class="md:col-span-2">
      <div class="form-container">
        <h2 class="text-center text-2xl font-bold text-gray-800 mb-6">Add New Product</h2>
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <label class="form-label">Product Name</label>
            <input type="text" name="name" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Description</label>
            <input type="text" name="category" class="form-control">
          </div>

          <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" name="price" step="0.01" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Rating</label>
            <input type="number" name="rating" step="0.1" min="0" max="5" class="form-control">
          </div>

          <div class="mb-3">
            <label class="form-label">Total Reviews</label>
            <input type="number" name="total_reviews" class="form-control">
          </div>

          <div class="form-check mb-3">
            <input type="checkbox" name="is_new" class="form-check-input" id="newCheck">
            <label class="form-check-label" for="newCheck">Is New Product</label>
          </div>

          <div class="mb-3">
            <label class="form-label">Product Image</label>
            <input type="file" name="image" class="form-control" required>
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-submit">➕ Add Product</button>
          </div>
        </form>
      </div>
    </section>
  </div>
</main>

