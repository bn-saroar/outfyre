<?php include 'includes/header.php'; 
require 'db.php';

$product = mysqli_query($dbcon, "SELECT * FROM `products` WHERE 1");
?>

<style>
/* Card hover button effect */
.card-hover-button {
  position: absolute;
  bottom: 16px;
  left: 50%;
  transform: translateX(-50%);
  opacity: 0;
  transition: all 0.3s ease;
  z-index: 10;
}
.card:hover .card-hover-button {
  opacity: 1;
}

/* Image wrapper */
.card-img-wrapper {
  position: relative;
  height: 280px;
  overflow: hidden;
  border-radius: 12px 12px 0 0;
}

/* Card clickable link */
.card-link {
  text-decoration: none;
  color: inherit;
}

/* Wishlist button */
.wishlist-btn {
  width: 34px;
  height: 34px;
  background: white;
  border: 1px solid #ccc;
  border-radius: 50%;
  z-index: 10;
}
</style>

<!-- Category Filter Buttons -->
<div class="container py-4">
  <div class="d-flex flex-wrap gap-2 justify-content-center">
    <?php
    $categories = ['Outerwear', 'Dresses', 'Skirts', 'Pants & Leggings', 'Stretch', 'Lounge'];
    foreach ($categories as $cat) {
      echo "<button class='btn btn-outline-secondary btn-sm px-3 py-1 rounded-pill'>$cat</button>";
    }
    ?>
  </div>
</div>

<!-- Sort & Filter Section -->
<div class="container d-flex justify-content-between align-items-center py-3 border-top border-bottom">
  <h5 class="mb-0 fw-semibold">Shop All</h5>
  <div class="d-flex gap-3 align-items-center text-muted">
    <span class="cursor-pointer">Sort ▼</span>
    <span class="cursor-pointer">Filter</span>
  </div>
</div>

<!-- Product Cards Section -->
<section class="container my-5">
  <div class="row g-4">
    <?php while ($result = mysqli_fetch_assoc($product)) { ?>
      <div class="col-lg-3 col-md-4 col-sm-6">
  <a href="productdetails.php?id=<?= $result['id']; ?>" class="text-decoration-none text-dark">
    <div class="card border-0 shadow-sm rounded-4 text-center p-3 h-100">

      <!-- Image -->
      <div class="bg-light rounded-3 overflow-hidden mb-3" style="height: 300px;">
        <img src="cstoreimg/<?= $result['image']; ?>" alt="Product" class="img-fluid h-100 w-100" style="object-fit: cover;">
      </div>

      <!-- Product Info -->
      <h6 class="fw-bold mb-1"><?= $result['name']; ?></h6>
      <p class="text-muted">$<?= $result['price']; ?></p>

    </div>
  </a>
</div>

    <?php } ?>
  </div>
</section>

<!-- Product Table for Admin View -->
<?php
$product = mysqli_query($dbcon, "SELECT * FROM `products` WHERE 1");
?>

<div class="container my-5">
  <h3 class="mb-4 fw-bold">Product Management</h3>
  <div class="table-responsive rounded shadow-sm">
    <table class="table table-striped align-middle mb-0">
      <thead class="table-dark">
        <tr>
          <th scope="col">Image</th>
          <th scope="col">Name</th>
          <th scope="col">Price</th>
          <th scope="col">Category</th>
          <th scope="col" class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($result = mysqli_fetch_assoc($product)) { ?>
          <tr>
            <td>
              <img src="cstoreimg/<?= $result['image']; ?>" width="60" height="60" class="rounded" style="object-fit: cover;" alt="Product">
            </td>
            <td><?= $result['name']; ?></td>
            <td>$<?= $result['price']; ?></td>
            <td><?= $result['category']; ?></td>
            <td class="text-center">
              <a href="edit.php?id=<?= $result['id']; ?>" class="btn btn-sm btn-outline-primary me-1">Edit</a>
              <a href="delete.php?id=<?= $result['id']; ?>" onclick="return confirm('Are you sure?');" class="btn btn-sm btn-outline-danger">Delete</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>

<?php include 'includes/footer.php'; ?>
