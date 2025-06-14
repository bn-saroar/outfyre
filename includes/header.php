<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
}?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Outfyre - Clothing Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="custom.css">
    <link rel="stylesheet" href="style.css">
    <!-- AOS CSS -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<!-- AOS Animation -->
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="https://cdn.tailwindcss.com/3.4.16"></script>
    
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css"
    />
</script>
<!-- Page transition CSS -->
<link rel="stylesheet" href="nav.css">
<script src="script.js"></script>
</head>

<body class="bg-white">
    <!-- Header -->
    <header class="fixed top-0 left-0 right-0 bg-white shadow-sm z-50">
    <div class="container mx-auto px-4 py-4 flex items-center justify-between">
        <!-- Logo -->
        <a href="index.php" class="font-['Pacifico'] text-2xl text-primary">Outfyre</a>
        
        <!-- Navigation -->
        <nav class="hidden lg:flex items-center space-x-6">
            <div class="nav-item relative">
                <a href="shop.php" class="font-medium hover:text-primary transition-colors flex items-center">
                    Shop
                    <!-- <div class="w-5 h-5 flex items-center justify-center ml-1">
                        <i class="ri-arrow-down-s-line"></i>
                    </div> -->
                </a>
                <!-- <div class="mega-menu absolute top-full left-0 bg-white shadow-lg rounded p-6 w-[600px] grid grid-cols-3 gap-6 mt-2"> -->
                    <!-- Mega menu items (unchanged) -->
                <!-- </div> -->
            </div>

            <a href="blog.php" class="font-medium hover:text-primary transition-colors">Blog</a>
            <a href="Contact.php" class="font-medium hover:text-primary transition-colors">Contact Us</a>
            <a href="shop.php" class="font-medium hover:text-primary transition-colors">New Arrivals</a>

            <?php if (isset($_SESSION['email']) && $_SESSION['email'] == 'naim81@gmail.com') : ?>
            <div class="nav-item relative">
                <button class="font-medium hover:text-primary transition-colors flex items-center">
                    Admin Page
                    <div class="w-5 h-5 flex items-center justify-center ml-1">
                        <i class="ri-arrow-down-s-line"></i>
                    </div>
                </button>
                <div class="mega-menu absolute top-full left-0 bg-white shadow-lg rounded p-6 w-[600px] grid grid-cols-3 gap-6 mt-2">
                    <ul class="space-y-2">
                        <li><a href="addproducts.php" class="text-sm hover:text-primary transition-colors">Add Product</a></li>
                        <li><a href="productdetails.php" class="text-sm hover:text-primary transition-colors">Product Details</a></li>
                        <li><a href="cart.php" class="text-sm hover:text-primary transition-colors">Cart</a></li>
                        <li><a href="productlist.php" class="text-sm hover:text-primary transition-colors">Product List</a></li>
                        <li><a href="addtranding-p.php" class="text-sm hover:text-primary transition-colors">tranding Product</a></li>
                    </ul>
                </div>
            </div>
            <?php endif; ?>
        </nav>

        <!-- Search Bar -->
        <div class="hidden lg:flex items-center relative w-1/3">
            <div class="absolute left-3 w-5 h-5 flex items-center justify-center text-gray-400">
                <i class="ri-search-line"></i>
            </div>
            <input type="text" placeholder="Search for products..." class="w-full pl-10 pr-4 py-2 rounded-full bg-gray-100 border-none focus:outline-none focus:ring-2 focus:ring-primary/20 text-sm">
        </div>

        <!-- User Actions -->
        <div class="flex items-center space-x-4">
            <button class="w-10 h-10 flex items-center justify-center hover:bg-gray-100 rounded-full relative lg:hidden" id="mobile-search-btn">
                <i class="ri-search-line text-lg"></i>
            </button>

            <!-- Login/Profile -->
            <?php if (isset($_SESSION['email'])): ?>
                <!-- If logged in, show profile icon -->
                <a href="userprofile.php" class="w-10 h-10 flex items-center justify-center hover:bg-gray-100 rounded-full relative">
                    <i class="ri-user-line text-lg"></i>
                </a>
            <?php else: ?>
                <!-- If not logged in, show Login button -->
                <a href="login.php" class="px-4 py-2 bg-primary text-white text-sm rounded-full hover:bg-primary/90 transition">
                    Login
                </a>
            <?php endif; ?>

            <!-- Wishlist -->
            <a href="wishlist.php" class="w-10 h-10 flex items-center justify-center hover:bg-gray-100 rounded-full relative">
                <i class="ri-heart-line text-lg"></i>
                <span class="absolute -top-1 -right-1 bg-primary text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">3</span>
            </a>

            <!-- Cart -->
            <a href="cart.php" class="w-10 h-10 flex items-center justify-center hover:bg-gray-100 rounded-full relative" id="cart-toggle">
                <i class="ri-shopping-bag-line text-lg"></i>
                <span class="absolute -top-1 -right-1 bg-primary text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">2</span>
            </a>

            <!-- Mobile Menu Button -->
            <button class="w-10 h-10 flex items-center justify-center hover:bg-gray-100 rounded-full lg:hidden" id="mobile-menu-btn">
                <i class="ri-menu-line text-lg"></i>
            </button>
        </div>
    </div>
</header>

