<?php
session_start(); // Start session to hold form data

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $firstName = htmlspecialchars(trim($_POST['first-name']));
    $lastName = htmlspecialchars(trim($_POST['last-name']));
    $street = htmlspecialchars(trim($_POST['street']));
    $city = htmlspecialchars(trim($_POST['city']));
    $state = htmlspecialchars(trim($_POST['state']));
    $zip = htmlspecialchars(trim($_POST['zip']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $quantity = htmlspecialchars(trim($_POST['quantity']));

    // Error checking
    $errors = [];

    // Check if name is empty
    if (empty($firstName) || empty($lastName)) {
        $errors[] = "First and Last name is required.";
    }

    // Check if street is empty
    if (empty($street)) {
        $errors[] = "Street address is required.";
    }

    if (empty($city)) {
        $errors[] = "City is required.";
    }

    if (empty($state)) {
        $errors[] = "State is required.";
    }

    if (empty($zip)) {
        $errors[] = "Zip code is required.";
    } elseif (!is_numeric($zip) || strlen($zip) != 5) {
        $errors[] = "Zip code must be a 5-digit number.";
    }


    // Check if quantity is valid
    if (empty($quantity) || $quantity <= 0) {
        $errors[] = "Please enter a valid quantity.";
    }

    // If there are errors, display them
    if (!empty($errors)) {
        echo "<h2>Please correct the following errors:</h2>";
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    } else {
        // If no errors, store the data in the session and redirect to invoice.php
        $_SESSION['name'] = $firstName . " " . $lastName;
        $_SESSION['street'] = $street;
        $_SESSION['city'] = $city;
        $_SESSION['state'] = $state;
        $_SESSION['zip'] = $zip;
        $_SESSION['phone'] = $phone;
        $_SESSION['product'] = $product;
        $_SESSION['quantity'] = $quantity;

        header("Location: ../pages/invoice.php"); // Redirect to invoice page
        exit();
    }
}
?>
