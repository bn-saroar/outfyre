<?php include 'includes/header.php'; ?>
<?php require 'db.php'; ?>
<main class="mt-5">
  <style>
    .bannerbtn:hover {
      background-color: #4CAF50;
      color: #fff;
    }
  </style>
      <!-- Hero Section -->
      <section
        class="relative w-full h-[600px] overflow-hidden"
        style="background-image: url('pimage/banner.jpg'); background-size: cover; background-position: center;"
      >
        <div
          class="absolute inset-0 bg-gradient-to-r from-white/90 to-white/20"
        ></div>
        <div class="container mx-auto px-4 h-full flex items-center relative">
          <div class="max-w-lg">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">
              Summer Collection 2025
            </h1>
            <p class="text-lg mb-8">
              Discover the latest trends and elevate your style with our
              exclusive summer collection. Fresh designs for the modern fashion
              enthusiast.
            </p>
            <div class="flex flex-wrap gap-4">
              <a
                href="shop.php"
                class="px-8 py-3 bg-black text-white font-medium rounded-button hover:bg-primary/90 transition-colors whitespace-nowrap bannerbtn"
              style="border-radius: 50px; padding: 0 40px;">
                Shop Now
              </a>
              
            </div>
          </div>
        </div>
      </section>
      
      <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
          <h2 class="text-2xl font-bold text-center mb-10">Shop by Category</h2>
          <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <a
              href="#"
              class="group relative rounded-lg overflow-hidden h-80 bg-white shadow-sm hover:shadow-md transition-shadow"
            >
              <div class="absolute inset-0 bg-gray-100 overflow-hidden">
                <img
                  src="https://readdy.ai/api/search-image?query=modern%20stylish%20clothing%20collection%20with%20various%20womens%20fashion%20items%20including%20dresses%2C%20tops%2C%20pants%2C%20and%20skirts%20arranged%20aesthetically%20on%20a%20clean%20white%20background%2C%20high-end%20fashion%20photography%2C%20professional%20product%20arrangement%2C%20soft%20shadows%2C%20high%20resolution&width=600&height=800&seq=4&orientation=portrait"
                  alt="Clothing"
                  class="w-full h-full object-cover object-top transition-transform duration-500 group-hover:scale-105"
                />
              </div>
              <div
                class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex flex-col justify-end p-6"
              >
                <h3 class="text-white text-xl font-semibold mb-2">Clothing</h3>
                <p class="text-white/80 text-sm mb-4">
                  Dresses, tops, bottoms and more
                </p>
                <span
                  class="inline-flex items-center text-white text-sm font-medium"
                >
                  Shop Now
                  <div class="w-5 h-5 flex items-center justify-center ml-1">
                    <i class="ri-arrow-right-line"></i>
                  </div>
                </span>
              </div>
            </a>
            <a
              href="#"
              class="group relative rounded-lg overflow-hidden h-80 bg-white shadow-sm hover:shadow-md transition-shadow"
            >
              <div class="absolute inset-0 bg-gray-100 overflow-hidden">
                <img
                  src="https://readdy.ai/api/search-image?query=modern%20stylish%20accessories%20collection%20with%20various%20fashion%20items%20including%20jewelry%2C%20bags%2C%20watches%2C%20sunglasses%2C%20and%20scarves%20arranged%20aesthetically%20on%20a%20clean%20white%20background%2C%20high-end%20fashion%20photography%2C%20professional%20product%20arrangement%2C%20soft%20shadows%2C%20high%20resolution&width=600&height=800&seq=5&orientation=portrait"
                  alt="Accessories"
                  class="w-full h-full object-cover object-top transition-transform duration-500 group-hover:scale-105"
                />
              </div>
              <div
                class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex flex-col justify-end p-6"
              >
                <h3 class="text-white text-xl font-semibold mb-2">
                  Accessories
                </h3>
                <p class="text-white/80 text-sm mb-4">
                  Jewelry, bags, hats and more
                </p>
                <span
                  class="inline-flex items-center text-white text-sm font-medium"
                >
                  Shop Now
                  <div class="w-5 h-5 flex items-center justify-center ml-1">
                    <i class="ri-arrow-right-line"></i>
                  </div>
                </span>
              </div>
            </a>
            <a
              href="#"
              class="group relative rounded-lg overflow-hidden h-80 bg-white shadow-sm hover:shadow-md transition-shadow"
            >
              <div class="absolute inset-0 bg-gray-100 overflow-hidden">
                <img
                  src="https://readdy.ai/api/search-image?query=modern%20stylish%20footwear%20collection%20with%20various%20shoes%20including%20sneakers%2C%20boots%2C%20heels%2C%20and%20sandals%20arranged%20aesthetically%20on%20a%20clean%20white%20background%2C%20high-end%20fashion%20photography%2C%20professional%20product%20arrangement%2C%20soft%20shadows%2C%20high%20resolution&width=600&height=800&seq=6&orientation=portrait"
                  alt="Footwear"
                  class="w-full h-full object-cover object-top transition-transform duration-500 group-hover:scale-105"
                />
              </div>
              <div
                class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex flex-col justify-end p-6"
              >
                <h3 class="text-white text-xl font-semibold mb-2">Footwear</h3>
                <p class="text-white/80 text-sm mb-4">
                  Sneakers, boots, heels and more
                </p>
                <span
                  class="inline-flex items-center text-white text-sm font-medium"
                >
                  Shop Now
                  <div class="w-5 h-5 flex items-center justify-center ml-1">
                    <i class="ri-arrow-right-line"></i>
                  </div>
                </span>
              </div>
            </a>
          </div>
        </div>
      </section>

      <?php require 'newproduct.php'; ?>

      <!-- Discount Banner -->
<section class="discount-banner mx-auto w-75 text-center py-3 bg-warning rounded shadow" data-aos="fade-up">
  <strong>🎉 Get 10% off your first order! 🎉</strong>
</section>

      <section class="py-16">
        <div class="container mx-auto px-4">
          <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="text-center">
              <div
                class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4"
              >
                <i class="ri-truck-line text-primary text-2xl"></i>
              </div>
              <h3 class="font-semibold mb-2">Free Shipping</h3>
              <p class="text-gray-600 text-sm">
                Free shipping on all orders over $50
              </p>
            </div>
            <div class="text-center">
              <div
                class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4"
              >
                <i class="ri-refresh-line text-primary text-2xl"></i>
              </div>
              <h3 class="font-semibold mb-2">Easy Returns</h3>
              <p class="text-gray-600 text-sm">
                30-day return policy for all items
              </p>
            </div>
            <div class="text-center">
              <div
                class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4"
              >
                <i class="ri-secure-payment-line text-primary text-2xl"></i>
              </div>
              <h3 class="font-semibold mb-2">Secure Payment</h3>
              <p class="text-gray-600 text-sm">
                Multiple secure payment options
              </p>
            </div>
            <div class="text-center">
              <div
                class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4"
              >
                <i class="ri-customer-service-2-line text-primary text-2xl"></i>
              </div>
              <h3 class="font-semibold mb-2">24/7 Support</h3>
              <p class="text-gray-600 text-sm">
                Dedicated customer support team
              </p>
            </div>
          </div>
        </div>
      </section>
</main>




<?php include 'includes/footer.php'; ?>
