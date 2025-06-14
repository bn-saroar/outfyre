<?php
include 'includes/header.php';
require 'db.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int) $_GET['id'];
    $query = mysqli_query($dbcon, "SELECT * FROM products WHERE id = $id");

    if (mysqli_num_rows($query) == 1) {
        $product = mysqli_fetch_assoc($query);
    } else {
        echo "<div class='text-center py-10 text-red-500'>Product not found.</div>";
        include 'includes/footer.php';
        exit();
    }
} else {
    echo "<div class='text-center py-10 text-yellow-500'>Invalid product ID.</div>";
    include 'includes/footer.php';
    exit();
}
?>

<section class="min-h-screen pt-28 pb-20 px-6 bg-gradient-to-r from-purple-100 via-pink-50 to-yellow-100">
  <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-12 bg-white rounded-3xl shadow-2xl p-8 lg:p-16">

    <!-- Left: Product Image -->
    <div class="flex justify-center items-center">
      <img src="upload/<?= htmlspecialchars($product['image']) ?>" 
           alt="<?= htmlspecialchars($product['name']) ?>" 
           class="w-full max-w-lg rounded-2xl shadow-lg border border-gray-200 hover:scale-105 transition-transform duration-300 ease-in-out" />
    </div>

    <!-- Right: Product Details -->
    <div class="flex flex-col justify-center space-y-8">
      <div>
        <p class="text-sm text-purple-600 font-semibold tracking-wide uppercase mb-1">
          Shop / <?= htmlspecialchars($product['category']) ?>
        </p>
        <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight">
          <?= htmlspecialchars($product['name']) ?>
        </h1>
      </div>

      <p class="text-3xl font-extrabold text-pink-600">$<?= htmlspecialchars($product['price']) ?></p>

      <p class="text-gray-700 leading-relaxed whitespace-pre-line"><?= nl2br(htmlspecialchars($product['description'])) ?></p>

      <!-- Colors -->
      <div>
        <h4 class="text-md font-semibold text-gray-800 mb-3">Available Colors</h4>
        <div class="flex gap-4">
          <!-- Use dynamic color dots if you want, else static -->
          <span class="w-8 h-8 rounded-full border-2 border-purple-300 bg-purple-600 shadow-md cursor-pointer hover:ring-2 hover:ring-purple-400 transition"></span>
          <span class="w-8 h-8 rounded-full border-2 border-pink-300 bg-pink-500 shadow-md cursor-pointer hover:ring-2 hover:ring-pink-400 transition"></span>
          <span class="w-8 h-8 rounded-full border-2 border-yellow-300 bg-yellow-400 shadow-md cursor-pointer hover:ring-2 hover:ring-yellow-300 transition"></span>
        </div>
      </div>

      <!-- Sizes -->
      <div>
        <div class="flex items-center justify-between mb-3">
          <h4 class="text-md font-semibold text-gray-800">Sizes</h4>
          <a href="#" class="text-sm text-pink-600 underline hover:text-pink-800 transition">Size Chart</a>
        </div>
        <div class="flex gap-3 flex-wrap">
          <?php
          $sizes = ['XS', 'S', 'M', 'L', 'XL'];
          foreach ($sizes as $size) {
              $selected = ($size == $product['size']) 
                ? 'bg-pink-600 text-white font-semibold shadow-lg' 
                : 'border border-gray-300 text-gray-700 hover:border-pink-500 hover:text-pink-600 cursor-pointer';
              echo "<button class='px-4 py-2 rounded-xl text-sm transition $selected'>$size</button>";
          }
          ?>
        </div>
      </div>

      <!-- Add to Cart Button -->
      <a href="cart.php?id=<?= $product['id'] ?>" 
         onclick="event.stopPropagation();"
         class="block w-full bg-pink-600 text-white font-bold text-center py-4 rounded-3xl shadow-lg hover:bg-pink-700 transition">
         🛒 Add to Cart
      </a>

      <!-- Accordion Info -->
      <div class="mt-8 border-t border-gray-200 divide-y divide-gray-200 text-gray-700">
        <details class="group py-4 cursor-pointer" open>
          <summary class="flex justify-between items-center text-lg font-semibold">
            <span>Fit Details</span>
            <svg class="w-6 h-6 transition-transform duration-300 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </summary>
          <p class="mt-3 text-gray-600 text-sm">Standard fit, true to size.</p>
        </details>

        <details class="group py-4 cursor-pointer">
          <summary class="flex justify-between items-center text-lg font-semibold">
            <span>Fabrication & Care</span>
            <svg class="w-6 h-6 transition-transform duration-300 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </summary>
          <p class="mt-3 text-gray-600 text-sm">Dry clean only. Fabric info not provided.</p>
        </details>

        <details class="group py-4 cursor-pointer">
          <summary class="flex justify-between items-center text-lg font-semibold">
            <span>Shipping & Returns</span>
            <svg class="w-6 h-6 transition-transform duration-300 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </summary>
          <p class="mt-3 text-gray-600 text-sm">Free shipping over $100. Returns within 30 days.</p>
        </details>
      </div>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
