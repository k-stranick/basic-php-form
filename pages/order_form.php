<?php
require_once '../logic/functions.php';
generateHeader("Home", ["../css/globalstyle.css"]);
generateNavagation();
?>

<!-- Pizza Ordering Form -->
<div class="container mt-5">
    <!-- Title and Logo -->
    <div class="text-center mb-4">
        <img src="https://example.com/pizza-logo.png" alt="Pizza Logo" class="mb-3">
        <h2 class="display-5">Online Ordering Form</h2>
    </div>

    <div class="row">
        <h1 class="text-center mb-4">Customer Information</h1>
        <h6 class="text-left">Items marked with (*) are required.</h6>
        <div class="col-md-6">
            <h6>Customer Details:</h6>
            <!-- Order Form -->
            <form action="../logic/process_order.php" method="POST" class="needs-validation">
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name*</label>
                    <input type="text" class="form-control" placeholder="John" id="first-name" name="first-name" required>
                </div>
                <div class="mb-3">
                    <label for="middle-initial" class="form-label">M.I.</label>
                    <input type="text" class="form-control" id="middle-initial" name="middle-initial">
                    <div class="mb-3">
                        <label for="name" class="form-label">Last Name*</label>
                        <input type="text" class="form-control" placeholder="Smith" id="last-name" name="last-name" required>
                    </div>
                    <div class="mt-4">
                        <h6>Address:</h6>
                        <label for="street-address" class="form-label">Street*</label>
                        <input type="street-address" class="form-control" id="street" name="street" required>
                    </div>
                    <div class="mb-3">
                        <Label for="city" class="form-label">City*</Label>
                        <input type="text" class="form-control" id="city" name="city" required>
                    </div>
                    <div class="mb-3">
                        <!-- Sorry I do not want to run all 50 states -->
                        <label for="state" class="form-label">State*</label>
                        <select class="form-select" id="state" name="state" required>
                            <option value="">Choose a state...</option>
                            <option value="AL">Alabama</option>
                            <option value="AK">Alaska</option>
                            <option value="AZ">Arizona</option>
                            <option value="AR">Arkansas</option>
                            <option value="CA">California</option>
                            <option value="CO">Colorado</option>
                            <option value="CT">Connecticut</option>
                            <option value="DE">Delaware</option>
                        </select>
                        <div class="mb-3">
                            <label for="zip" class="form-label">Zip Code*</label>
                            <input type="text" class="form-control" id="zip" name="zip" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone*</label>
                            <input type="phone" class="form-control" id="phone" name="phone" required>
                        </div>

                    </div>

                    <!-- Pizza Customization Section -->
                    <div class="col-md-6">
                        <h4>Customize Your Pizza</h4>
                        <!-- Pizza Size -->
                        <div class="mb-3">
                            <label for="pizzaSize" class="form-label">Select your Pizza Size (10, 12, or 14 inch)</label>
                            <div>
                                <input type="radio" class="btn-check" name="pizzaSize" id="size10" value="10">
                                <label class="btn btn-outline-primary" for="size10">10</label>

                                <input type="radio" class="btn-check" name="pizzaSize" id="size12" value="12">
                                <label class="btn btn-outline-primary" for="size12">12</label>

                                <input type="radio" class="btn-check" name="pizzaSize" id="size14" value="14">
                                <label class="btn btn-outline-primary" for="size14">14</label>
                            </div>
                        </div>

                        <!-- Crust Type -->
                        <div class="mb-3">
                            <label for="crustType" class="form-label">Choose your Crust</label>
                            <select class="form-select" id="crustType">
                                <option value="thin">Thin</option>
                                <option value="thick">Thick</option>
                                <option value="cheeseStuffed">Cheese Stuffed</option>
                            </select>
                        </div>

                        <!-- Quantity -->
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity (Call for quantities larger than 10)</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" value="1" min="1" required>
                        </div>

                        <!-- Special Instructions -->
                        <div class="mb-3">
                            <label for="specialInstructions" class="form-label">Special Instructions</label>
                            <textarea class="form-control" id="specialInstructions" rows="2"></textarea>
                        </div>

                        <!-- Toppings (Checkboxes) -->
                        <div class="mb-3">
                            <h5>Meat Toppings</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="pepperoni">
                                <label class="form-check-label" for="pepperoni">Pepperoni</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="ham">
                                <label class="form-check-label" for="ham">Ham</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="sausage">
                                <label class="form-check-label" for="sausage">Sausage</label>
                            </div>
                            <!-- Add more toppings as needed -->
                        </div>

                        <div class="mb-3">
                            <h5>Vegetable Toppings</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="mushrooms">
                                <label class="form-check-label" for="mushrooms">Mushrooms</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="onions">
                                <label class="form-check-label" for="onions">Onions</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="greenPeppers">
                                <label class="form-check-label" for="greenPeppers">Green Peppers</label>
                            </div>
                        </div>

                        <!--
                    <h6>Order Details:</h6>
                    <div class="mb-3">
                        <label for="product" class="form-label">Select Product</label>
                        <select class="form-select" id="product" name="product" required>
                        <option value="">Choose a product...</option>
                        <option value="Gadget A">Gadget A</option>
                        <option value="Gadget B">Gadget B</option>
                        <option value="Gadget C">Gadget C</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" min="1" required>
                    </div>
                -->

                        <button type="submit" class="btn btn-primary">Submit Order</button>
            </form>
        </div>
    </div>


    <?php
    generateFooter()
    ?>