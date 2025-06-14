<?php
session_start();
require 'db.php';
include 'includes/header.php';

if (!isset($_SESSION['cart']) || count($_SESSION['cart']) === 0) {
    echo "<div class='container text-center my-20'><h4 class='text-2xl font-semibold'>Your cart is empty.</h4></div>";
    include 'includes/footer.php';
    exit;
}

$total = 0;
foreach ($_SESSION['cart'] as $item) {
    $total += $item['price'] * $item['quantity'];
}
?>

<section class="min-h-screen bg-gradient-to-r from-purple-200 via-pink-100 to-yellow-100 py-12 font-sans">
  <div class="container mx-auto px-6 lg:px-20 mt-5">
    <h3 class="text-4xl font-extrabold text-gray-900 mb-12 text-center drop-shadow-lg">Checkout</h3>

    <!-- ✅ Whole form starts here -->
    <form action="place_order.php" method="post" class="flex flex-col lg:flex-row gap-12">

      <!-- Left: Billing Details -->
      <div class="flex-1 bg-white rounded-3xl p-10 shadow-lg hover:shadow-2xl transition-shadow duration-500">
        <h5 class="text-2xl font-semibold mb-8 border-b pb-3 border-gray-200">Billing Information</h5>

        <div>
          <label for="fullname" class="block mb-2 text-gray-600 font-medium">Full Name</label>
          <input type="text" name="fullname" id="fullname" required
                class="w-full rounded-xl border border-gray-300 p-3 focus:outline-none focus:ring-2 focus:ring-pink-400 transition" />
        </div>
        <div>
          <label for="email" class="block mb-2 text-gray-600 font-medium">Email Address</label>
          <input type="email" name="email" id="email" required
                class="w-full rounded-xl border border-gray-300 p-3 focus:outline-none focus:ring-2 focus:ring-pink-400 transition" />
        </div>
        <div>
          <label for="address" class="block mb-2 text-gray-600 font-medium">Shipping Address</label>
          <textarea name="address" id="address" rows="3" required
                    class="w-full rounded-xl border border-gray-300 p-3 resize-none focus:outline-none focus:ring-2 focus:ring-pink-400 transition"></textarea>
        </div>
        <div>
          <label for="gift_message" class="block mb-2 text-gray-600 font-medium">Gift Message (Optional)</label>
          <textarea name="gift_message" id="gift_message" rows="2"
                    class="w-full rounded-xl border border-gray-300 p-3 resize-none focus:outline-none focus:ring-2 focus:ring-pink-400 transition"></textarea>
        </div>
      </div>

      <!-- Right: Payment + Summary -->
      <div class="w-full max-w-md flex flex-col bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-shadow duration-500">

        <!-- Payment Method -->
        <div class="mb-10">
          <h5 class="text-2xl font-semibold mb-6 border-b pb-3 border-gray-200">Select Payment Method</h5>

          <label class="flex items-center space-x-3 cursor-pointer group">
            <input type="radio" name="payment_method" value="Cash on Delivery" checked
                  class="form-radio text-pink-500 group-hover:ring-2 group-hover:ring-pink-400 transition" />
            <span class="text-gray-700 group-hover:text-pink-600 transition font-medium">Cash on Delivery</span>
          </label>
          <label class="flex items-center space-x-3 cursor-pointer group">
            <input type="radio" name="payment_method" value="Card Payment"
                  class="form-radio text-pink-500 group-hover:ring-2 group-hover:ring-pink-400 transition" />
            <span class="text-gray-700 group-hover:text-pink-600 transition font-medium">Card Payment</span>
          </label>

          <!-- Submit Button -->
          <button type="submit"
                  class="mt-8 w-full bg-pink-500 hover:bg-pink-600 text-white py-3 rounded-3xl font-bold text-lg shadow-lg hover:shadow-2xl transition duration-300">
            Place Order
          </button>
        </div>

        <!-- Order Summary -->
        <div>
          <h5 class="text-2xl font-semibold mb-6 border-b pb-3 border-gray-200">Order Summary</h5>
          <ul class="divide-y divide-gray-200 mb-6 max-h-60 overflow-y-auto">
            <?php foreach ($_SESSION['cart'] as $item): ?>
              <li class="flex justify-between py-3">
                <span class="text-gray-700">
                  <?php echo htmlspecialchars($item['name']); ?>
                  <small class="text-gray-400">×<?php echo $item['quantity']; ?></small>
                </span>
                <span class="font-semibold text-gray-900">$<?php echo number_format($item['price'] * $item['quantity'], 2); ?></span>
              </li>
            <?php endforeach; ?>
          </ul>
          <div class="flex justify-between text-xl font-extrabold text-green-600">
            <span>Total</span>
            <span>$<?php echo number_format($total, 2); ?></span>
          </div>
        </div>

      </div>
    </form>
    <!-- ✅ form ends here -->

  </div>
</section>

<?php include 'includes/footer.php'; ?>
