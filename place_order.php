<?php
session_start();
require 'db.php';
include 'includes/header.php';

if (!isset($_SESSION['cart']) || count($_SESSION['cart']) === 0) {
    echo "<div class='container text-center my-5'><h4>Your cart is empty.</h4></div>";
    include 'includes/footer.php';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate required fields
    if (!isset($_POST['fullname'], $_POST['email'], $_POST['address'], $_POST['payment_method'])) {
        echo "<div class='container text-center my-5'><h4 class='text-danger'>Missing required form fields.</h4></div>";
        include 'includes/footer.php';
        exit;
    }

    $fullname = mysqli_real_escape_string($dbcon, $_POST['fullname']);
    $email = mysqli_real_escape_string($dbcon, $_POST['email']);
    $address = mysqli_real_escape_string($dbcon, $_POST['address']);
    $payment_method = mysqli_real_escape_string($dbcon, $_POST['payment_method']);
    $gift_message = isset($_POST['gift_message']) ? mysqli_real_escape_string($dbcon, $_POST['gift_message']) : '';

    // Insert order into orders table
    $insertOrder = mysqli_query($dbcon, "INSERT INTO orders (fullname, email, address, gift_message, payment_method) 
        VALUES ('$fullname', '$email', '$address', '$gift_message', '$payment_method')");

    if ($insertOrder) {
        $order_id = mysqli_insert_id($dbcon);

        // Insert each cart item into order_items
        foreach ($_SESSION['cart'] as $item) {
            $product_id = (int)$item['id'];
            $name = mysqli_real_escape_string($dbcon, $item['name']);
            $quantity = (int)$item['quantity'];
            $price = (float)$item['price'];

            mysqli_query($dbcon, "INSERT INTO order_items (order_id, product_id, product_name, quantity, price)
                VALUES ($order_id, $product_id, '$name', $quantity, $price)");
        }

        // Clear cart
        unset($_SESSION['cart']);
        ?>

        <!-- ✅ Stylish Success Message -->
        <section class="py-5 bg-light" style="font-family: 'Segoe UI', sans-serif;">
          <div class="container d-flex justify-content-center align-items-center">
            <div class="card shadow-lg p-5 text-center border-0 rounded-4" style="max-width: 520px; margin-top: 5%;">
              <div class="mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="#198754" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.97 11.03a.75.75 0 0 0 1.08-.02l3.992-4.99a.75.75 0 0 0-1.152-.96L7.5 9.477 5.854 7.854a.75.75 0 1 0-1.06 1.06l2 2a.75.75 0 0 0 .176.116z"/>
                </svg>
              </div>
              <h3 class="fw-semibold mb-3">Thank You for Your Order!</h3>
              <p class="text-muted mb-4">Your order has been placed successfully. A confirmation has been sent to your email.</p>
              <a href="index.php" class="btn btn-primary rounded-pill px-4 py-2">Continue Shopping</a>
            </div>
          </div>
        </section>

        <?php
        include 'includes/footer.php';
        exit;
    } else {
        echo "<div class='container text-center my-5'><h4 class='text-danger'>Something went wrong while placing your order.</h4></div>";
    }
} else {
    echo "<div class='container text-center my-5'><h4 class='text-warning'>Invalid request method.</h4></div>";
}

include 'includes/footer.php';
?>
