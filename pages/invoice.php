<!--
Namne: Kyle Stranick
Date: 10/25/2024
Assignment: Project 2
ITN 264-201
-->
<!DOCTYPE html>
<html lang="en">

<?php
session_start(); // Resume session to access form data
require_once '../logic/functions.php';

// Check if session data exists, if not redirect
if (!isset($_SESSION['name']) || !isset($_SESSION['pizzaSize']) || !isset($_SESSION['crustType']) || !isset($_SESSION['quantity'])) {
    header("Location: ../pages/order_form.php");
    exit();
}

// Extract session data
$name = $_SESSION['name'];
$pizzaSize = $_SESSION['pizzaSize'];
$crustType = $_SESSION['crustType'];
$quantity = $_SESSION['quantity'];
$toppings = isset($_SESSION['toppings']) ? $_SESSION['toppings'] : [];
$specialInstructions = isset($_SESSION['specialInstructions']) ? $_SESSION['specialInstructions'] : '';
$apt = isset($_SESSION['apt']) ? $_SESSION['apt'] : '';

// Prices
$basePrices = [
    '10' => 8.99,
    '12' => 10.99,
    '14' => 12.99
];

// Calculate topping cost
$toppingPrice = 1.50;
$toppingTotal = count($toppings) * $toppingPrice;

// Total price calculation
$basePrice = $basePrices[$pizzaSize];
$total = ($basePrice + $toppingTotal) * $quantity;

generateHeader("Invoice", ["../css/globalstyle.css", "../css/invoice_style.css"]);
?>

<body>
    <div class="container mt-5">
        <div class="card">
            <!-- Invoice Header -->
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h1>Pizza Byte Receipt</h1>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <!-- Bill To -->
                <div class="row">
                    <div class="col-md-6">
                        <h4>BILL TO:</h4>
                        <p><strong><?php echo $name; ?></strong></p>
                        <p><?php echo $_SESSION['street'] . ', Apt: ' . $apt ?></p>
                        <p><?php echo $_SESSION['city'] . ', ' . $_SESSION['state'] . ' ' . $_SESSION['zip']; ?></p>
                    </div>
                </div>

                <!-- Order Details -->
                <h5 class="card-title">Order Details:</h5>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">DESCRIPTION</th>
                                <th scope="col">SIZE</th>
                                <th scope="col">CRUST</th>
                                <th scope="col">TOPPINGS</th>
                                <th scope="col">QUANTITY</th>
                                <th scope="col">SPECIAL INSTRUCTIONS</th>
                                <th scope="col">PRICE</th>
                                <th scope="col">TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Custom Pizza</td>
                                <td><?php echo $pizzaSize . ' inch'; ?></td>
                                <td><?php echo ucfirst($crustType); ?></td>
                                <td><?php echo !empty($toppings) ? implode(', ', $toppings) : 'None'; ?></td>
                                <td><?php echo $quantity; ?></td>
                                <td><?php echo $specialInstructions; ?></td>
                                <td><?php echo "$" . number_format($basePrice, 2); ?></td>
                                <td><?php echo "$" . number_format($total, 2); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12 text-end">
                    <p class="total-box"><strong>Total: $<?php echo number_format($total, 2); ?></strong></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php
generateFooter();
?>