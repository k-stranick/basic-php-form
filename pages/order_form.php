<!--
Name: Kyle Stranick
Date: 10/25/2024
Assignment: Project 2
ITN 264-201
-->

<!DOCTYPE html>
<html lang="en">

<?php
require_once '../logic/functions.php';
generateHeader("Home", ["../css/globalstyle.css", "../css/order_form.css"]);
?>

<body>
    <div class="site-wrapper"> <!-- Start wrapper for custom border -->

        <!-- Pizza Ordering Form -->
        <div class="container mt-5">
            <!-- Title and Logo -->
            <div class="row mb-3 d-flex justify-content-between align-items-center">
                <div class="col-md-4 text-center">
                    <img src="../media/logo.png" alt="Pizza Logo" class="img-fluid mb-3">
                </div>
                <div class="col-md-4 text-center">
                    <h4 class="display-5">Online Ordering Form</h4>
                </div>
                <div class="col-md-4 text-center">
                    <img src="../media/delivery.png" alt="Pizza Bytes" class="img-fluid mb-3">
                </div>
            </div>
            <hr class="thick-line">
            <div>
                <h6 class="text-left">Items marked with (*) are required.</h6>
            </div>

            <!-- Form Section -->
            <form action="../logic/process_order.php" method="POST">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="bordered-section">
                            <!-- Customer Details Section -->
                            <h6>Customer Details:</h6>
                            <!-- First Name -->
                            <div class="mb-3 row">
                                <label for="firstName" class="col-sm-3 col-form-label">First Name*</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="firstName" name="firstName" required>
                                </div>
                            </div>
                            <!-- Middle Initial -->
                            <div class="mb-3 row">
                                <label for="middleInitial" class="col-sm-3 col-form-label">M.I.</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="middleInitial" name="middleInitial">
                                </div>
                            </div>
                            <!-- Last Name -->
                            <div class="mb-3 row">
                                <label for="lastName" class="col-sm-3 col-form-label">Last Name*</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="lastName" name="lastName" required>
                                </div>
                            </div>
                            <!-- Address Section -->
                            <div class="mt-4">
                                <h6>Address:</h6>
                            </div>
                            <div class="mb-3 row">
                                <label for="street" class="col-sm-3 col-form-label">Street*</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="street" name="street" required>
                                </div>
                            </div>
                            <!-- Apartment #-->
                            <div class="mb-3 row">
                                <label for="apt" class="col-sm-3 col-form-label">Apt</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="apt" name="apt">
                                </div>
                            </div>
                            <!-- City -->
                            <div class="mb-3 row">
                                <label for="city" class="col-sm-3 col-form-label">City*</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="city" name="city" required>
                                </div>
                            </div>
                            <!-- State -->
                            <div class="mb-3 row">
                                <label for="state" class="col-sm-3 col-form-label">State*</label>
                                <div class="col-sm-9">
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
                                </div>
                            </div>
                            <!-- Zip Code -->
                            <div class="mb-3 row">
                                <label for="zip" class="col-sm-3 col-form-label">Zip Code*</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="zip" autocomplete="on" name="zip" required>
                                </div>
                            </div>
                            <!-- Phone Number -->
                            <div class="mb-3 row">
                                <label for="phone" class="col-sm-3 col-form-label">Phone*</label>
                                <div class="col-sm-9">
                                    <input type="tel" class="form-control" id="phone" autocomplete="on" name="phone" required>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Pizza Customization Section -->
                    <div class="col-md-6 mb-4">
                        <div class="bordered-section">
                            <!-- Pizza Size Selection -->
                            <div class="container">
                                <h4 class="w-auto">Customize Your Pizza</h4>
                                <div class="text-center mb-2">Select your Pizza size (10, 12, or 14 inch)</div>
                                <div class="d-flex justify-content-around align-items-center">
                                    <label class="size-label" for="size10">
                                        <input type="radio" name="pizzaSize" id="size10" value="10" class="size-radio">
                                        <span class="size-circle">10</span>
                                    </label>
                                    <label class="size-label" for="size12">
                                        <input type="radio" name="pizzaSize" id="size12" value="12" class="size-radio">
                                        <span class="size-circle">12</span>
                                    </label>
                                    <label class="size-label" for="size14">
                                        <input type="radio" name="pizzaSize" id="size14" value="14" class="size-radio">
                                        <span class="size-circle">14</span>
                                    </label>
                                </div>
                            </div>
                            <!-- Crust Type -->
                            <div class="mb-3">
                                <label for="crustType" class="form-label">Choose your Crust</label>
                                <select class="form-select" id="crustType" name="crustType">
                                    <option value="thin">Thin</option>
                                    <option value="thick">Thick</option>
                                    <option value="cheeseStuffed">Cheese Stuffed</option>
                                </select>
                            </div>

                            <!-- Quantity -->
                            <div class="mb-3">
                                <label for="quantity" class="form-label">Quantity (Call for quantities larger than 10)</label>
                                <input type="number" class="form-control" id="quantity" name="quantity" value="1" min="1" max="10" required>
                            </div>

                            <!-- Special Instructions -->
                            <div class="mb-3">
                                <label for="specialInstructions" class="form-label">Special Instructions</label>
                                <textarea class="form-control" id="specialInstructions" rows="2"></textarea>
                            </div>

                            <!-- Toppings (Checkboxes) -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="bordered-section">
                                        <h5>Meat Toppings:</h5>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="pepperoni" value="Pepperoni" name="toppings[]">
                                            <label class="form-check-label" for="pepperoni">Pepperoni</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="ham" value="Ham" name="toppings[]">
                                            <label class="form-check-label" for="ham">Ham</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="sausage" value="Sausage" name="toppings[]">
                                            <label class="form-check-label" for="sausage">Sausage</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="pork" value="Pork" name="toppings[]">
                                            <label class="form-check-label" for="pork">Pork</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="chicken" value="Chicken" name="toppings[]">
                                            <label class="form-check-label" for="chicken">Chicken</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="bordered-section">
                                        <h5>Vegetable Toppings:</h5>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="mushrooms" value="Mushrooms" name="toppings[]">
                                            <label class="form-check-label" for="mushrooms">Mushrooms</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="onions" value=" Onions" name="toppings[]">
                                            <label class="form-check-label" for="onions">Onions</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="greenPeppers" value="Green Peppers" name="toppings[]">
                                            <label class="form-check-label" for="greenPeppers">Green Peppers</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="jalapenos" value="Jalapenos" name="toppings[]">
                                            <label class="form-check-label" for="jalapenos">Jalapenos</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="tomatoes" value="Tomatoes" name="toppings[]">
                                            <label class="form-check-label" for="tomatoes">Tomatoes</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="extraSauce" value="Extra Sauce" name="toppings[]">
                                <label class="form-check-label" for="extraSauce">Extra Sauce</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="extraCheese" value="Extra Cheese" name="toppings[]">
                                <label class="form-check-label" for="extraCheese">Extra Cheese</label>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Submit Button -->
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary">Submit Order</button>
                </div>
            </form>
            <div>
                <p class="text-justify mt-3">Thanks you for using our <span><em>online ordering</em></span> form for quick and easy orders, delivered free, fast, and hot to your door. If you need to talk to us directly, call Pizza Byte at <strong>(302)555-7599</strong></p>
            </div>
            <hr class="thick-line">
            <p class="text-center">Pizza Byte &bull; 123 Market Street &bull; Milltown, DE 19900 &bull; (302) 555-7599</p>
        </div>
        <?php
        generateFooter()
        ?>
    </div> <!-- End wrapper -->
</body>

</html>