<?php 
include 'includes/header.php'; 
require 'db.php';

$product = mysqli_query($dbcon, "SELECT * FROM `products`");
?>

<style>
  .card-hover-button {
    position: absolute;
    top: 86%;
    left: 50%;
    transform: translate(-50%, -50%);
    opacity: 0;
    transition: opacity 0.3s ease;
    z-index: 10;
  }

  .product-card:hover .card-hover-button {
    opacity: 1;
  }

  .card-img-wrapper {
    position: relative;
    height: 300px;
    overflow: hidden;
    border-radius: 0.75rem;
  }

  .card-img-wrapper img {
    transition: transform 0.4s ease;
  }

  .product-card:hover .card-img-wrapper img {
    transform: scale(1.08);
  }

  .wishlist-btn {
    transition: transform 0.2s ease;
  }

  .wishlist-btn:hover {
    transform: scale(1.15);
    color: red;
  }

  @media (max-width: 768px) {
    .card-img-wrapper {
      height: 250px;
    }
  }
</style>

<section class="py-16 bg-gray-100 min-h-screen">
  <div class="container mx-auto px-4 mt-5">
    <div class="flex flex-col lg:flex-row gap-8">

      <!-- Sidebar Filters -->
      <aside class="lg:w-1/4 w-full bg-white rounded-xl shadow p-6" style="height: 330px;">
        <h5 class="text-xl font-semibold mb-4">Filters</h5>
        <form>
          <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Category</label>
            <select class="w-full border rounded-md px-3 py-2">
              <option selected>All</option>
              <option>Men</option>
              <option>Women</option>
              <option>Accessories</option>
            </select>
          </div>
          <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Price Range</label>
            <input type="range" class="w-full" min="10" max="100" step="10">
          </div>
          <button type="submit" class="w-full bg-black text-white py-2 rounded-md hover:bg-gray-800 transition">Apply Filters</button>
        </form>
      </aside>

      <!-- Product Grid -->
      <div class="flex-1 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php while ($result = mysqli_fetch_assoc($product)) { ?>
          <div class="product-card bg-white rounded-xl shadow hover:shadow-md transition">
            <div class="card-img-wrapper">
              <img
                src="cstoreimg/<?php echo $result['image']; ?>"
                alt="<?php echo htmlspecialchars($result['name'], ENT_QUOTES); ?>"
                class="w-full h-full object-cover"
              />
              <span class="absolute top-2 left-2 bg-blue-600 text-white text-xs px-2 py-1 rounded">New</span>
              <a href="wishlist.php?id=<?= $result['id']; ?>" class="absolute top-2 right-2 bg-white p-1 rounded-full wishlist-btn">
               <i class="ri-heart-line text-lg"></i>
              </a>
              <a href="productdetails.php?id=<?= $result['id']; ?>" class="card-hover-button px-4 py-2 bg-white text-sm font-semibold rounded-full shadow hover:bg-gray-100">Quick View</a>
            </div>
            <div class="p-4">
              <h5 class="text-lg font-semibold mb-1"><?php echo htmlspecialchars($result['name'], ENT_QUOTES); ?></h5>
              <p class="text-sm text-gray-500 mb-2">Women's Fashion</p>
              <div class="flex justify-between items-center">
                <span class="text-base font-bold">$<?php echo number_format($result['price'], 2); ?></span>
                <div class="flex items-center text-yellow-500 text-sm">
                  <?php for ($i = 0; $i < 5; $i++) echo '<i class="ri-star-fill"></i>'; ?>
                  <span class="text-gray-500 text-xs ml-1">(<?= intval($result['rating'] ?? 0); ?>)</span>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>

    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
