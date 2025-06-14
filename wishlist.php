<?php
session_start();
include 'includes/header.php';
require 'db.php';

// Initialize wishlist if not already set
if (!isset($_SESSION['wishlist'])) {
    $_SESSION['wishlist'] = [];
}

// Add product to wishlist if ID is passed via URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id'];
    if (!in_array($id, $_SESSION['wishlist'])) {
        $_SESSION['wishlist'][] = $id;
    }
}

// Load wishlist items from database
$wishlistItems = [];
if (!empty($_SESSION['wishlist'])) {
    $ids = implode(",", $_SESSION['wishlist']);
    $wishlist = mysqli_query($dbcon, "SELECT * FROM products WHERE id IN ($ids)");
    while ($row = mysqli_fetch_assoc($wishlist)) {
        $wishlistItems[] = $row;
    }
}
?>

<!-- Wishlist Header -->
<section class="py-12 bg-gradient-to-r from-pink-100 via-purple-100 to-yellow-100 text-center">
  <div class="max-w-4xl mx-auto mt-5">
    <h2 class="text-3xl font-bold text-gray-800 mb-2">💖 My Wishlist</h2>
    <p class="text-gray-600">Save your favorite items for later</p>
  </div>

  <section class="mt-10">
    <div class="max-w-7xl mx-auto px-4">
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php if (!empty($wishlistItems)) { ?>
          <?php foreach ($wishlistItems as $result) { ?>
            <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition p-4">
              <img src="cstoreimg/<?php echo $result['image']; ?>" alt="Product" class="w-full h-72 object-cover rounded-xl mb-4">
              <div class="text-center">
                <h3 class="text-lg font-semibold text-gray-800 mb-1"><?php echo htmlspecialchars($result['name']); ?></h3>
                <p class="text-sm text-gray-500 mb-1"><?php echo htmlspecialchars($result['description']); ?></p>
                <p class="text-xl font-bold text-gray-900 mb-4">$<?php echo number_format($result['price'], 2); ?></p>
                <div class="flex justify-center gap-3">
                  <a href="cart.php?id=<?php echo $result['id']; ?>" class="px-4 py-2 bg-black text-white rounded-full hover:bg-gray-800 transition">Add to Bag</a>
                  <a href="remove_wishlist.php?id=<?php echo $result['id']; ?>" class="px-4 py-2 border border-gray-400 text-gray-700 rounded-full hover:bg-gray-100 transition">Remove</a>
                </div>
              </div>
            </div>
          <?php } ?>
        <?php } else { ?>
          <div class="text-center col-span-full text-gray-600 text-lg font-medium">Your wishlist is empty.</div>
        <?php } ?>
      </div>
    </div>
  </section>
</section>

<?php include 'includes/footer.php'; ?>
