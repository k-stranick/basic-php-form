<!--
Name: Kyle Stranick
Date: 10/25/2024
Assignment: Project 2
ITN 264-201
-->

<?php
session_start(); // Start session to hold form data

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $firstName = htmlspecialchars(trim($_POST['firstName'] ?? ''));
    $lastName = htmlspecialchars(trim($_POST['lastName'] ?? ''));
    $street = htmlspecialchars(trim($_POST['street'] ?? ''));
    $apt = htmlspecialchars(trim($_POST['apt'] ?? ''));
    $city = htmlspecialchars(trim($_POST['city'] ?? ''));
    $state = htmlspecialchars(trim($_POST['state'] ?? ''));
    $zip = htmlspecialchars(trim($_POST['zip'] ?? ''));
    $phone = htmlspecialchars(trim($_POST['phone'] ?? ''));
    $quantity = htmlspecialchars(trim($_POST['quantity'] ?? ''));
    $pizzaSize = htmlspecialchars(trim($_POST['pizzaSize'] ?? ''));
    $crustType = htmlspecialchars(trim($_POST['crustType'] ?? ''));
    $toppings = []; // Initialize an empty array for toppings

    // Handle toppings (as an array)
    $toppings = isset($_POST['toppings']) ? $_POST['toppings'] : [];

    // Error checking
    $errors = [];

    // Check if required fields are filled
    if (empty($firstName) || empty($lastName)) {
        $errors[] = "First and Last name are required.";
    }
    if (empty($street)) {
        $errors[] = "Street address is required.";
    }
    if (empty($city)) {
        $errors[] = "City is required.";
    }
    if (empty($state)) {
        $errors[] = "State is required.";
    }
    if (empty($zip) || !is_numeric($zip) || strlen($zip) != 5) {
        $errors[] = "Zip code must be a 5-digit number.";
    }
    if (empty($quantity) || $quantity <= 0) {
        $errors[] = "Please enter a valid quantity.";
    }
    if (empty($pizzaSize)) {
        $errors[] = "Please select a pizza size.";
    }
    if (empty($crustType)) {
        $errors[] = "Please select a crust type.";
    }

    // If there are errors, display them
    if (!empty($errors)) {
        echo "<div class='alert alert-danger'><h4>Please correct the following errors:</h4><ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul></div>";
    } else {
        // If no errors, store the data in the session and redirect to invoice.php
        $_SESSION['name'] = $firstName . " " . $lastName;
        $_SESSION['street'] = $street;
        $_SESSION['city'] = $city;
        $_SESSION['state'] = $state;
        $_SESSION['apt'] = $apt;
        $_SESSION['zip'] = $zip;
        $_SESSION['phone'] = $phone;
        $_SESSION['quantity'] = $quantity;
        $_SESSION['pizzaSize'] = $pizzaSize;
        $_SESSION['crustType'] = $crustType;
        $_SESSION['toppings'] = $toppings;

        header("Location: ../pages/invoice.php"); // Redirect to invoice page
        exit();
    }
}
