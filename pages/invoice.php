<?php
session_start(); // Resume session to access form data
require_once '../logic/functions.php';

// Redirect back to form if data is missing
if (!isset($_SESSION['name']) || !isset($_SESSION['email']) || !isset($_SESSION['product']) || !isset($_SESSION['quantity'])) {
    header("Location: ../pages/order_form.php");
    exit();
}

// Extract the session data
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$product = $_SESSION['product'];
$quantity = $_SESSION['quantity'];

// Product prices
$prices = [
    'Gadget A' => 50,
    'Gadget B' => 75,
    'Gadget C' => 100
];

// Calculate total
$total = $prices[$product] * $quantity;

generateHeader("Invoice", ["../css/globalstyle.css"]);
generateNavagation();
?>

<div class="container mt-5">
    <div class="card">
        <!-- Invoice Header -->
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h1>Invoice</h1>
                </div>
                <div class="col-md-6 text-end company-details">
                    <p><strong><?php echo $name; ?></strong></p>
                    <p><?php echo $email; ?></p>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="row mt-3">
                <div class="col-md-6">
                    <h4>BILL TO:</h4>
                    <p><strong><?php echo $name; ?></strong></p>
                    <p>Email: <?php echo $email; ?></p>
                </div>
            </div>

            <h5 class="card-title">Order Details:</h5>
            <div class="row">
                <div class="col-md-12">
                    <p><strong>Date:</strong> <?php echo date("m/d/Y"); ?></p>
                </div>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">DESCRIPTION</th>
                        <th scope="col">QUANTITY</th>
                        <th scope="col">PRICE</th>
                        <th scope="col">TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $product; ?></td>
                        <td><?php echo $quantity; ?></td>
                        <td><?php echo "$" . number_format($prices[$product], 2); ?></td>
                        <td><?php echo "$" . number_format($total, 2); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="row">
            <div class="col-md-12 text-end">
                <div class="total-box">
                    <p><strong>Total: $<?php echo number_format($total, 2); ?></strong></p>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer>
            Powered by Kyle Stranick. All Rights Reserved.
        </footer>
    </div>
</div>

<?php
generateFooter();
?>
