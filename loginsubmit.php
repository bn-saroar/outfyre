<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['pass'] ?? '';

    $query = mysqli_query($dbcon, "SELECT * FROM `user_details` WHERE `email` = '$email'");
    $result = mysqli_fetch_assoc($query);

    if ($result) {
        // If password is stored in plain text
        if ($password == $result['password']) {
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $result['name'];
            $_SESSION['user_loged_in'] = true;
            header("Location: index.php");
            exit();
        } else {
            // Password mismatch
            header("Location: login.php?user=valid");
            session_destroy();
        }
    } else {
        // No user with that email
        header("Location: login.php?user=invalid");
        session_destroy();
    }
}
