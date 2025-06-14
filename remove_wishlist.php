<?php
session_start();

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id'];

    if (isset($_SESSION['wishlist'])) {
        $_SESSION['wishlist'] = array_diff($_SESSION['wishlist'], [$id]);
        $_SESSION['wishlist'] = array_values($_SESSION['wishlist']); // Re-index array
    }
}

header("Location: shop.php");
exit;
?>