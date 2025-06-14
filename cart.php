<?php 
ob_start();
session_start();
require 'db.php';
include 'includes/header.php';

// Add to cart
if (isset($_GET['id'])) {
  $id = intval($_GET['id']);
  $productQuery = mysqli_query($dbcon, "SELECT * FROM products WHERE id = $id");
  $product = mysqli_fetch_assoc($productQuery);

  if ($product) {
    if (!isset($_SESSION['cart'])) {
      $_SESSION['cart'] = [];
    }

    if (isset($_SESSION['cart'][$id])) {
      $_SESSION['cart'][$id]['quantity'] += 1;
    } else {
      $_SESSION['cart'][$id] = [
        'id' => $product['id'],
        'name' => $product['name'],
        'price' => $product['price'],
        'image' => $product['image'],
        'quantity' => 1
      ];
    }
  }
}

// Remove
if (isset($_GET['remove'])) {
  unset($_SESSION['cart'][$_GET['remove']]);
  header("Location: cart.php");
  exit;
}

// Increase
if (isset($_GET['increase'])) {
  $_SESSION['cart'][$_GET['increase']]['quantity'] += 1;
  header("Location: cart.php");
  exit;
}

// Decrease
if (isset($_GET['decrease'])) {
  if ($_SESSION['cart'][$_GET['decrease']]['quantity'] > 1) {
    $_SESSION['cart'][$_GET['decrease']]['quantity'] -= 1;
  }
  header("Location: cart.php");
  exit;
}

// Subtotal calculation
$subtotal = 0;
if (!empty($_SESSION['cart'])) {
  foreach ($_SESSION['cart'] as $item) {
    $subtotal += $item['price'] * $item['quantity'];
  }
}
?>

<!-- Tailwind-based Styled Cart Page -->
<div class="min-h-screen bg-gradient-to-r from-purple-200 via-pink-100 to-yellow-100 py-12" style="margin-top: 3%;">
  <div class="max-w-7xl mx-auto px-4">
    <h2 class="text-4xl font-extrabold text-gray-900 mb-12 text-center drop-shadow-lg">🛒 Your Shopping Bag</h2>

    <div class="flex flex-col lg:flex-row gap-10">
      
      <!-- Cart Items -->
      <div class="flex-1">
        <?php if (!empty($_SESSION['cart'])): ?>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <?php foreach ($_SESSION['cart'] as $item): ?>
              <div class="bg-white rounded-3xl shadow-md p-5 flex flex-col hover:shadow-xl transition duration-300">
                <div class="flex justify-between items-start mb-4">
                  <h3 class="text-lg font-semibold text-gray-800"><?php echo htmlspecialchars($item['name']); ?></h3>
                  <a href="cart.php?remove=<?php echo $item['id']; ?>" class="text-gray-400 hover:text-red-500 text-2xl transition" title="Remove item">
                    &times;
                  </a>
                </div>
                <img src="cstoreimg/<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>" class="w-full h-48 object-cover rounded-lg mb-4 border" />
                <div class="flex items-center justify-center space-x-4 mb-4">
                  <a href="cart.php?decrease=<?php echo $item['id']; ?>" class="px-3 py-1 border border-gray-300 rounded-md hover:bg-gray-200 transition text-lg font-bold">−</a>
                  <span class="text-lg font-bold text-gray-800"><?php echo $item['quantity']; ?></span>
                  <a href="cart.php?increase=<?php echo $item['id']; ?>" class="px-3 py-1 border border-gray-300 rounded-md hover:bg-gray-200 transition text-lg font-bold">+</a>
                </div>
                <div class="text-center text-xl font-semibold text-green-600">
                  $<?php echo number_format($item['price'] * $item['quantity'], 2); ?>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php else: ?>
          <div class="text-center py-20 bg-white rounded-xl shadow-md">
            <p class="text-gray-600 mb-4 text-lg">Your cart is currently empty.</p>
            <a href="productlist.php" class="inline-block px-6 py-2 border border-blue-600 text-blue-600 font-semibold rounded-md hover:bg-blue-600 hover:text-white transition">
              Continue Shopping
            </a>
          </div>
        <?php endif; ?>
      </div>

      <!-- Order Summary -->
      <div class="w-full max-w-md bg-white rounded-3xl shadow-md p-8 h-fit hover:shadow-xl transition">
        <h3 class="text-2xl font-semibold mb-6 border-b pb-3">Order Summary</h3>
        <div class="flex justify-between mb-4">
          <span class="text-gray-700">Subtotal</span>
          <span class="font-semibold text-gray-900">$<?php echo number_format($subtotal, 2); ?></span>
        </div>
        <div class="flex justify-between mb-6 border-b pb-4">
          <span class="text-gray-700">Bag Total</span>
          <span class="font-semibold text-gray-900">$<?php echo number_format($subtotal, 2); ?></span>
        </div>
        
        <label for="gift-message" class="block text-gray-700 mb-2 font-medium">Gift Message</label>
        <textarea id="gift-message" rows="3" placeholder="Write a message..." class="w-full rounded-lg border border-gray-300 p-3 mb-6 resize-none focus:outline-none focus:ring-2 focus:ring-pink-400"></textarea>

        <p class="text-sm text-gray-500 mb-4">Shipping & taxes calculated at checkout.</p>
        <a href="order.php" class="block w-full bg-black hover:bg-gray-900 text-white text-center py-3 rounded-full font-semibold shadow-md transition">
          Proceed to Checkout
        </a>
      </div>
    </div>
  </div>
</div>

<?php 
include 'includes/footer.php'; 
ob_end_flush();
?>
