<?php require 'db.php'; 
$product = mysqli_query($dbcon, "SELECT * FROM `products`");
$newproduct = mysqli_query($dbcon, "SELECT * FROM `newproducts` WHERE 1");?>
<!-- Featured Products -->
      <section class="py-16">
        <div class="container mx-auto px-4">
          <div class="flex flex-wrap items-center justify-between mb-10">
            <h2 class="text-2xl font-bold">Featured Products</h2>
            <div
              class="flex space-x-1 px-1 py-1 bg-gray-100 rounded-full mt-4 sm:mt-0"
            >
              <button
                id="filter-all-btn"
                class="px-4 py-1.5 bg-primary text-white rounded-full text-sm font-medium whitespace-nowrap"
              >
                All
              </button>
              <button
                id="filter-women-btn"
                class="px-4 py-1.5 text-gray-700 rounded-full text-sm font-medium hover:bg-gray-200 whitespace-nowrap"
              >
                Women
              </button>
              <button
                id="filter-men-btn"
                class="px-4 py-1.5 text-gray-700 rounded-full text-sm font-medium hover:bg-gray-200 whitespace-nowrap"
              >
                Men
              </button>
              <button
                id="filter-kids-btn"
                class="px-4 py-1.5 text-gray-700 rounded-full text-sm font-medium hover:bg-gray-200 whitespace-nowrap"
              >
                Kids
              </button>
            </div>
          </div>
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Product 1 -->
            <?php while($row = mysqli_fetch_array($newproduct)){ ?>
            <div class="product-card group relative bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
              <div class="relative h-80 bg-gray-100 overflow-hidden">
      <?php echo "Image path: /cstoreimg/" . $row['image_url']; ?>
            <img
              src="/cstoreimg/<?= $row['image_url']; ?>"
              alt="Floral Summer Dress"
              class="w-full h-full object-cover object-top"
            />

                <span
                  class="absolute top-3 left-3 bg-primary text-white text-xs font-medium px-2 py-1 rounded"
                >New</span>
                <button
                  class="absolute top-3 right-3 w-8 h-8 flex items-center justify-center bg-white rounded-full shadow-md hover:bg-gray-100 transition-colors"
                >
                  <i class="ri-heart-line"></i>
                </button>
                <div class="absolute inset-x-0 bottom-0 p-4">
                  <button
                    class="quick-view w-full py-2 bg-white font-medium rounded-button shadow-md hover:bg-gray-50 transition-all whitespace-nowrap"
                  >
                    Quick View
                  </button>
                </div>
              </div>
              <div class="p-4">
                <h3 class="font-medium mb-1"><?php echo $row['name']; ?></h3>
                <p class="text-gray-500 text-sm mb-2"><?php echo $row['category']; ?></p>
                <div class="flex items-center justify-between">
                  <div>
                    <span class="font-semibold"><?php echo $row['price']; ?></span>
                  </div>
                  <div class="flex items-center">
                    <div class="flex">
                      <i class="ri-star-fill text-yellow-400"></i>
                      <i class="ri-star-fill text-yellow-400"></i>
                      <i class="ri-star-fill text-yellow-400"></i>
                      <i class="ri-star-fill text-yellow-400"></i>
                      <i class="ri-star-half-fill text-yellow-400"></i>
                    </div>
                    <span class="text-xs text-gray-500 ml-1">(42)</span>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
 
          
          <div class="mt-10 text-center">
            <a
              href="#"
              class="inline-block px-8 py-3 border border-gray-300 font-medium rounded-button hover:bg-gray-50 transition-colors whitespace-nowrap"
            >
              View All Products
            </a>
          </div>
        </div>
      </section>

<section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
          <h2 class="text-2xl font-bold mb-10">New Arrivals</h2>
          <div class="flex flex-col lg:flex-row gap-8">
            <!-- Filters Sidebar -->
            <div class="lg:w-1/4">
              <div class="bg-white rounded-lg shadow-sm p-6 sticky top-24">
                <div class="mb-6">
                  <h3 class="font-semibold mb-4">Categories</h3>
                  <ul class="space-y-2">
                    <li>
                      <label class="custom-checkbox flex items-center">
                        <input type="checkbox" id="filter-all" checked />
                        <span class="checkmark"></span>
                        <span class="ml-7">All Products</span>
                      </label>
                    </li>
                    <li>
                      <label class="custom-checkbox flex items-center">
                        <input type="checkbox" id="filter-womens" />
                        <span class="checkmark"></span>
                        <span class="ml-7">Women's Clothing</span>
                      </label>
                    </li>
                    <li>
                      <label class="custom-checkbox flex items-center">
                        <input type="checkbox" id="filter-mens" />
                        <span class="checkmark"></span>
                        <span class="ml-7">Men's Clothing</span>
                      </label>
                    </li>
                    <li>
                      <label class="custom-checkbox flex items-center">
                        <input type="checkbox" />
                        <span class="checkmark"></span>
                        <span class="ml-7">Accessories</span>
                      </label>
                    </li>
                    <li>
                      <label class="custom-checkbox flex items-center">
                        <input type="checkbox" />
                        <span class="checkmark"></span>
                        <span class="ml-7">Footwear</span>
                      </label>
                    </li>
                  </ul>
                </div>
                <div class="mb-6 border-t border-gray-100 pt-6">
                  <h3 class="font-semibold mb-4">Price Range</h3>
                  <div class="px-2">
                    <input
                      type="range"
                      min="0"
                      max="500"
                      value="250"
                      class="custom-range"
                      id="price-range"
                    />
                    <div class="flex items-center justify-between mt-2">
                      <span class="text-sm text-gray-600">$0</span>
                      <span class="text-sm font-medium"
                        >$<span id="price-value">250</span></span
                      >
                      <span class="text-sm text-gray-600">$500</span>
                    </div>
                  </div>
                </div>
                <div class="mb-6 border-t border-gray-100 pt-6">
                  <h3 class="font-semibold mb-4">Colors</h3>
                  <div class="flex flex-wrap gap-2">
                    <label class="color-option">
                      <input type="radio" name="color" checked />
                      <div
                        class="color-circle w-8 h-8 rounded-full bg-black"
                      ></div>
                    </label>
                    <label class="color-option">
                      <input type="radio" name="color" />
                      <div
                        class="color-circle w-8 h-8 rounded-full bg-white border border-gray-200"
                      ></div>
                    </label>
                    <label class="color-option">
                      <input type="radio" name="color" />
                      <div
                        class="color-circle w-8 h-8 rounded-full bg-red-500"
                      ></div>
                    </label>
                    <label class="color-option">
                      <input type="radio" name="color" />
                      <div
                        class="color-circle w-8 h-8 rounded-full bg-blue-500"
                      ></div>
                    </label>
                    <label class="color-option">
                      <input type="radio" name="color" />
                      <div
                        class="color-circle w-8 h-8 rounded-full bg-green-500"
                      ></div>
                    </label>
                    <label class="color-option">
                      <input type="radio" name="color" />
                      <div
                        class="color-circle w-8 h-8 rounded-full bg-yellow-500"
                      ></div>
                    </label>
                    <label class="color-option">
                      <input type="radio" name="color" />
                      <div
                        class="color-circle w-8 h-8 rounded-full bg-purple-500"
                      ></div>
                    </label>
                    <label class="color-option">
                      <input type="radio" name="color" />
                      <div
                        class="color-circle w-8 h-8 rounded-full bg-pink-500"
                      ></div>
                    </label>
                  </div>
                </div>
                <div class="mb-6 border-t border-gray-100 pt-6">
                  <h3 class="font-semibold mb-4">Sizes</h3>
                  <div class="flex flex-wrap gap-2">
                    <label class="size-option">
                      <input type="radio" name="size" />
                      <div
                        class="size-box w-10 h-10 rounded flex items-center justify-center border border-gray-300 text-sm"
                      >
                        XS
                      </div>
                    </label>
                    <label class="size-option">
                      <input type="radio" name="size" />
                      <div
                        class="size-box w-10 h-10 rounded flex items-center justify-center border border-gray-300 text-sm"
                      >
                        S
                      </div>
                    </label>
                    <label class="size-option">
                      <input type="radio" name="size" checked />
                      <div
                        class="size-box w-10 h-10 rounded flex items-center justify-center border border-gray-300 text-sm"
                      >
                        M
                      </div>
                    </label>
                    <label class="size-option">
                      <input type="radio" name="size" />
                      <div
                        class="size-box w-10 h-10 rounded flex items-center justify-center border border-gray-300 text-sm"
                      >
                        L
                      </div>
                    </label>
                    <label class="size-option">
                      <input type="radio" name="size" />
                      <div
                        class="size-box w-10 h-10 rounded flex items-center justify-center border border-gray-300 text-sm"
                      >
                        XL
                      </div>
                    </label>
                  </div>
                </div>
                <div class="border-t border-gray-100 pt-6">
                  <h3 class="font-semibold mb-4">Customer Ratings</h3>
                  <ul class="space-y-2">
                    <li>
                      <label class="custom-radio flex items-center">
                        <input type="radio" name="rating" checked />
                        <span class="radio-mark"></span>
                        <span class="ml-7 flex items-center">
                          <div class="flex">
                            <i class="ri-star-fill text-yellow-400"></i>
                            <i class="ri-star-fill text-yellow-400"></i>
                            <i class="ri-star-fill text-yellow-400"></i>
                            <i class="ri-star-fill text-yellow-400"></i>
                            <i class="ri-star-fill text-yellow-400"></i>
                          </div>
                          <span class="text-xs text-gray-500 ml-1">& Up</span>
                        </span>
                      </label>
                    </li>
                    <li>
                      <label class="custom-radio flex items-center">
                        <input type="radio" name="rating" />
                        <span class="radio-mark"></span>
                        <span class="ml-7 flex items-center">
                          <div class="flex">
                            <i class="ri-star-fill text-yellow-400"></i>
                            <i class="ri-star-fill text-yellow-400"></i>
                            <i class="ri-star-fill text-yellow-400"></i>
                            <i class="ri-star-fill text-yellow-400"></i>
                            <i class="ri-star-line text-yellow-400"></i>
                          </div>
                          <span class="text-xs text-gray-500 ml-1">& Up</span>
                        </span>
                      </label>
                    </li>
                    <li>
                      <label class="custom-radio flex items-center">
                        <input type="radio" name="rating" />
                        <span class="radio-mark"></span>
                        <span class="ml-7 flex items-center">
                          <div class="flex">
                            <i class="ri-star-fill text-yellow-400"></i>
                            <i class="ri-star-fill text-yellow-400"></i>
                            <i class="ri-star-fill text-yellow-400"></i>
                            <i class="ri-star-line text-yellow-400"></i>
                            <i class="ri-star-line text-yellow-400"></i>
                          </div>
                          <span class="text-xs text-gray-500 ml-1">& Up</span>
                        </span>
                      </label>
                    </li>
                  </ul>
                </div>
                <div class="mt-8">
                  <button
                    id="apply-filters-btn"
                    class="w-full py-3 bg-primary text-white font-medium rounded-button hover:bg-primary/90 transition-colors whitespace-nowrap"
                  >
                    Apply Filters
                  </button>
                  <button
                    class="w-full py-3 mt-2 text-gray-600 font-medium hover:text-primary transition-colors whitespace-nowrap"
                  >
                    Clear All
                  </button>
                </div>
              </div>
            </div>
            <!-- Products Grid -->
            <div class="lg:w-3/4">
              <div
                id="loading-indicator"
                class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center"
              >
                <div
                  class="bg-white rounded-lg p-6 flex items-center space-x-4"
                >
                  <div
                    class="w-8 h-8 border-4 border-primary border-t-transparent rounded-full animate-spin"
                  ></div>
                  <span class="text-lg">Filtering products...</span>
                </div>
              </div>
              <div
                id="no-results"
                class="hidden bg-white rounded-lg p-8 text-center"
              >
                <div
                  class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4"
                >
                  <i class="ri-search-line text-gray-400 text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">No products found</h3>
                <p class="text-gray-600 mb-6">
                  Try adjusting your filters or browse our suggestions below
                </p>
                <button
                  id="clear-filters-btn"
                  class="px-6 py-2 border border-gray-300 rounded-button hover:bg-gray-50 transition-colors"
                >
                  Clear all filters
                </button>
              </div>
              <div
                class="bg-white rounded-lg shadow-sm p-4 mb-6 flex flex-wrap items-center justify-between"
              >
                <div class="flex items-center space-x-2 mb-2 sm:mb-0">
                  <span class="text-sm text-gray-600">Sort by:</span>
                  <div class="relative">
                    <button
                      class="flex items-center space-x-1 bg-gray-100 rounded-lg px-3 py-2 text-sm"
                      id="sort-button"
                    >
                      <span>Featured</span>
                      <div class="w-4 h-4 flex items-center justify-center">
                        <i class="ri-arrow-down-s-line"></i>
                      </div>
                    </button>
                    <div
                      class="hidden absolute top-full left-0 mt-1 bg-white shadow-lg rounded-lg overflow-hidden z-10 w-40"
                      id="sort-dropdown"
                    >
                      <button
                        class="block w-full px-4 py-2 text-left text-sm hover:bg-gray-100 text-primary font-medium"
                      >
                        Featured
                      </button>
                      <button
                        class="block w-full px-4 py-2 text-left text-sm hover:bg-gray-100"
                      >
                        Price: Low to High
                      </button>
                      <button
                        class="block w-full px-4 py-2 text-left text-sm hover:bg-gray-100"
                      >
                        Price: High to Low
                      </button>
                      <button
                        class="block w-full px-4 py-2 text-left text-sm hover:bg-gray-100"
                      >
                        Newest
                      </button>
                      <button
                        class="block w-full px-4 py-2 text-left text-sm hover:bg-gray-100"
                      >
                        Best Selling
                      </button>
                    </div>
                  </div>
                </div>
                <div class="flex items-center space-x-4">
                  <span class="text-sm text-gray-600">View:</span>
                  <div class="flex space-x-2">
                    <button
                      class="w-8 h-8 flex items-center justify-center bg-primary text-white rounded"
                    >
                      <i class="ri-layout-grid-line"></i>
                    </button>
                    <button
                      class="w-8 h-8 flex items-center justify-center bg-gray-100 text-gray-600 rounded hover:bg-gray-200"
                    >
                      <i class="ri-list-check"></i>
                    </button>
                  </div>
                </div>
              </div>
       
              <!-- এখানে শুরু হবে প্রোডাক্ট-গ্রিড -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
          <?php while ($result = mysqli_fetch_assoc($product)) { ?>
            <div class="product-card group relative bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
              <div class="relative h-80 bg-gray-100 overflow-hidden">
                <img
                  src="cstoreimg/<?php echo $result['image']; ?>"
                  alt="<?php echo htmlspecialchars($result['name'], ENT_QUOTES); ?>"
                  class="w-full h-full object-cover"
                />
                <span
                  class="absolute top-3 left-3 bg-primary text-white text-xs font-medium px-2 py-1 rounded"
                >New</span>
                <button
                  class="absolute top-3 right-3 w-8 h-8 flex items-center justify-center bg-white rounded-full shadow-md hover:bg-gray-100 transition-colors"
                >
                  <i class="ri-heart-line"></i>
                </button>
                <div class="absolute inset-x-0 bottom-0 p-4">
                  <a href="productdetails.php?id=<?php echo $result['id']; ?>"
                    class="quick-view w-full py-2 bg-white font-medium rounded-button shadow-md hover:bg-gray-50 transition-all whitespace-nowrap"
                    style="padding: 0 108px;">
                    Quick View
                  </a>
                </div>
              </div>
              <div class="p-4">
                <h3 class="font-medium mb-1"><?php echo htmlspecialchars($result['name'], ENT_QUOTES); ?></h3>
                <p class="text-gray-500 text-sm mb-2">Women's Fashion</p>
                <div class="flex items-center justify-between">
                  <div>
                    <span class="font-semibold">$<?php echo number_format($result['price'], 2); ?></span>
                  </div>
                  <div class="flex items-center">
                    <div class="flex">
                      <i class="ri-star-fill text-yellow-400"></i>
                      <i class="ri-star-fill text-yellow-400"></i>
                      <i class="ri-star-fill text-yellow-400"></i>
                      <i class="ri-star-fill text-yellow-400"></i>
                      <i class="ri-star-fill text-yellow-400"></i>
                    </div>
                    <span class="text-xs text-gray-500 ml-1">(<?php echo intval($result['rating'] ?? 0); ?>)</span>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>

     

      </div>
    </div>
  </div>
</section>